<?php

namespace App\Repositories\User;

use App\Exceptions\CoreException;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Lang;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(
        private User $user
    ){}

    /**
     * Список всех пользователей.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all() : Collection
    {
        return $this->user->get();
    }

    /**
     * Найти пользователя по идентификатору,
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findUser(int $id) : Model
    {
        $model = $this->user
            ->where('id', $id)
            ->with('roles:name')
            ->first();
        if(!$model) { throw new CoreException(Lang::get('user.not_found')); }
        // Если запись есть возвращаем ее
        return $model;
    }

    /**
     * Найти пользователя по электронной почте.
     *
     * @param string $email
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function findUserByEmail(string $email) : Model|null
    {
        return $this->user
            ->where('email', $email)
            ->with('roles:name')
            ->first();
    }

    /**
     * Найти пользователей по идентификатору.
     *
     * @param array $ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findUsersByIds(array $ids) : Collection
    {
        return $this->user
            ->whereIn('id', $ids)
            ->with('roles:name')
            ->get();
    }

    /**
     * Создать пользователя в системе.
     *
     * @param array $input
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createUser(array $input) : Model
    {
        // Каждый раз создаем новый инстанс
        // Для ситуаций, с массовым вызовом метода.
        // https://laravel.com/api/8.x/Illuminate/Database/Eloquent/Builder.html#method_newModelInstance
        $model = $this->user->newModelInstance();
        // Заполняем модель
        $model->fill($input);
        $model->save();

        $model = $model->refresh();
        return $model;
    }

    /**
     * Обновить сущность пользователя в базе данных.
     *
     * @param array $input
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateUser(int $id, array $input) : Model
    {
        $model = $this->findUser($id);
        $model->fill($input);
        $model->save();

        $model = $model->refresh();
        return $model;
    }

}
