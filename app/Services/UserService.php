<?php

namespace App\Services;

use App\Exceptions\CoreException;
use App\Repositories\Connection\ConnectionRepository;
use App\Repositories\User\UserRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class UserService
{
    public function __construct(
        private UserRepository $userRepository,
    ){}

     /**
     * Получить список всех подключений
     * (пользователей проекта).
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all() : Collection
    {
        return $this->userRepository->all();
    }

    /**
     * Получить объект данных пользователя по ID.
     *
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getUser(int $userId) : Model
    {
        return $this->userRepository->findUser($userId);
    }

    /**
     * Найти пользователя по адресу электронной почты.
     *
     * @param string $email
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function getUserByEmail(string $email) : Model|null
    {
        return $this->userRepository->findUserByEmail($email);
    }

    /**
     * Найти пользователей по идентификаторам.
     *
     * @param array $ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUsersByIds(array $ids) : Collection
    {
        return $this->userRepository
            ->findUsersByIds($ids);
    }

    /**
     * Проверка состояния авторизации пользователя.
     *
     * @return bool
     */
    public function authCheck() : bool
    {
        return Auth::check();
    }

    /**
     * Получить объект данных авторизированного пользователя.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getMe() : Model
    {
        // Проверяем статус авторизации
        if(!$this->authCheck()){
            throw new CoreException(Lang::get('user.not_authorized'));
        }

        // Возвращаем информацию о пользователе
        return $this->getUser(Auth::user()->id);
    }

    /**
     * Обновить данные пользователя в системе.
     *
     * @param int $userId
     * @param array $input
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateUser(int $userId,
                               Request $request) : Model
    {
        $input = $request->only([
            'name', 'email', 'surname', 'patronymic', 'address'
        ]);
        // Обновляем данные пользователя
        $user = $this->userRepository->updateUser($userId, $input);
        // Возвращаем данные пользователя
        return $user;
    }

    /**
     * Получить идентификатор текущего пользователя
     *
     * @return int
     */
    public function getUserId() : int
    {
        // Возвращаем ID
        return $this->getMe()->id;
    }

    /**
     * Метод изменения роли пользователя.
     *
     * @param string $userId
     * @param string $role
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function changeRole(int $userId, string $role) : void
    {
        // Администратор может сменить роль любому пользователю,
        // кроме самого себя (текущего пользователя.)
        if($userId == $this->getUserId()){
            throw new CoreException(Lang::get('user.assign_error'));
        }
        // Меняем роль
        $user = $this->getUser($userId);
        $user->syncRoles([$role]);
    }

    /**
     * Изменить пароль авторизированного пользователя.
     *
     * @param string $oldPassword
     * @param string $newPassword
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function changePassword(string $oldPassword, string $newPassword) : Model
    {
        // Получаем данные аутентифицированного пользователя
        $user = $this->getMe();
        // ID авторизированного пользователя
        $userId = $user->id;
        // Проверяем статус авторизации
        if(!Hash::check($oldPassword, $user->password)){
            throw new CoreException(Lang::get('user.password_corrupted'));
        }
        // Устанавливаем Новый пароль
        $input = ['password' => Hash::make($newPassword)];
        // Обновляем даныне
        $user = $this->userRepository->updateUser($userId, $input);
        // Возвращаем обновленную модель
        return $user;
    }

    /**
     * Аутентифицировать пользователя
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function loginUser(Request $request) : array
    {
        // Производим попытку аутентификации пользователя
        $candidate = $this->userRepository->findUserByEmail($request->email);
        $auth = $candidate && Hash::check($request->password, $candidate->password);
        // Проверяем данные аутентификации
        if(!$auth){
            throw new CoreException(Lang::get('user.invalid_credential'));
        }
        // Формируем токен
        $token = $candidate->createToken('authToken')->accessToken;
        // Возвращаем данные
        return ['user' => $candidate, 'access_token' => $token];
    }

    /**
     * Зарегистрировать нового пользователя,
     * и аутентифицировать его в системе.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function registerUser(Request $request) : array
    {

        // Уведомляем пользователя если email уже занят,
        // и прерываем процесс регистрации пользователя
        if(!is_null($this->getUserByEmail($request->email))){
            throw new CoreException(Lang::get('auth.email_is_taken'));
        }

        // Если в систему передается пароль,
        // используем его, иначе генерируем заново.
        $password = isset($request->password) ?
            $request->password :
            Str::random(10);

        // Формирование массива данных
        $input = [
            'email' => $request->email,
            'name' => $request->name,
            'surname' => $request->surname,
            'patronymic' => $request->patronymic,
            'password' => $password,
            'remember_token' => Str::random(10),
        ];

        // Регистрируем нового пользователя
        $user = $this->createUser($input);

        // Аутентифицируем пользователя
        $token = $user->createToken('authToken')->accessToken;

        // Возвращаем данные
        return ['user' => $user, 'access_token' => $token];
    }

    /**
     * Зарегистрировать нового пользователя,
     * и аутентифицировать его в системе.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createUser(array $input) : Model
    {
        // Хешируем пароль пользователя
        $password = $input['password'];
        $input['password'] = Hash::make($password);
        // Регистрируем нового пользователя
        $user = $this->userRepository->createUser($input);
        $user->assignRole('client');
        return $user;
    }

    /**
     * Прекратить пользовательскую сессию
     *
     * @return void
     */
    public function logoutUser() : void
    {
        // Получаем данные пользователя
        $user = Auth::user()->token();
        // Отключаем токен
        $user->revoke();
    }

}
