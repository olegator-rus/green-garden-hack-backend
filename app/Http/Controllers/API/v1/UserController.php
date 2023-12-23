<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Owner;
use App\Models\Machinist;
use App\Http\Requests\User\IdRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\User\User;
use App\Services\UserService;
use App\Traits\JsonResponds;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;

class UserController extends Controller
{

    // Подключаем трейт ответов
    use JsonResponds;

    /**
     * Получить список всех пользователей.
     *
     * @param \App\Services\UserService $userService
     * @return \Illuminate\Http\Response
     */
    public function all(UserService $userService) : Response
    {
        try
        {
            $users = $userService->all();

            return $this->success(
                Lang::get('user.all'),
                $users
            );
        }
        catch(\Exception $e)
        {
            return $this->failure($e->getMessage());
        }
    }

    /**
     * Получить данные организации.
     *
     * @return \Illuminate\Http\Response
     */
    public function legend() : Response
    {
        try
        {
            return $this->success(
                Lang::get('owners.all'),
                Owner::all()
            );
        }
        catch(\Exception $e)
        {
            return $this->failure($e->getMessage());
        }
    }

    /**
     * Получить данные организации.
     *
     * @return \Illuminate\Http\Response
     */
    public function machinists() : Response
    {
        try
        {
            return $this->success(
                Lang::get('owners.all'),
                Machinist::all()
            );
        }
        catch(\Exception $e)
        {
            return $this->failure($e->getMessage());
        }
    }

    /**
     * Найти определенного пользователя по ID.
     *
     * @param \App\Http\Requests\User\IdRequest $request
     * @param \App\Services\UserService $userService
     * @return \Illuminate\Http\Response
     */
    public function get(IdRequest $request,
                        UserService $userService) : Response
    {
        try
        {
            // Получаем идентификатор пользователя
            $userId = (int) $request->id;
            $user = $userService->getUser($userId);

            return $this->success(
                Lang::get('user.get'),
                $user
            );
        }
        catch(\Exception $e)
        {
            return $this->failure($e->getMessage());
        }
    }

    /**
     * Обновить данные пользователя.
     *
     * @param \App\Http\Requests\User\UpdateRequest $request
     * @param \App\Services\UserService $userService
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,
                           UserService $userService) : Response
    {
        DB::beginTransaction();
        try
        {

            // Определяем ID пользователя для обновления
            $userId = (int) $request->id;
            // Обновляем данные
            $user = $userService->updateUser($userId, $request);
            // Завершаем транзакцию
            DB::commit();
            // Возвращаем статус и данные
            return $this->success(
                Lang::get('user.update'),
                $user
            );

        }
        catch(\Exception $e)
        {
            return $this->failure($e->getMessage());
        }
    }

    /**
     * Получить информацию о пользователе.
     *
     * @param \App\Services\UserService $userService
     * @return \Illuminate\Http\Response
     */
    public function me(UserService $userService) : Response
    {
        try
        {
            $user = $userService->getMe();

            return $this->success(
                Lang::get('user.me'),
                $user
            );
        }
        catch(\Exception $e)
        {
            return $this->failure($e->getMessage());
        }
    }


}
