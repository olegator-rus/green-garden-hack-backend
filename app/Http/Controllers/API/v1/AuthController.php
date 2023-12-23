<?php

namespace App\Http\Controllers\API\v1;

use App\Services\UserService;
use App\Traits\JsonResponds;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Lang;

class AuthController extends Controller
{
    // Подключаем трейт ответов
    use JsonResponds;

    /**
     * Получить авторизациооный токен.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Services\UserService $userService
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request,
                          UserService $userService) : Response
    {
        try
        {
            // Формируем данные доступа
            $session = $userService->loginUser($request);

            // Производим авторизацию
            return $this->success(
                Lang::get('auth.logged_in'),
                $session
            );
        }
        catch(\Exception $e)
        {
            return $this->failure($e->getMessage());
        }
    }

    /**
     * Зарегистрировать пользователя и вернуть
     * авторизациооный токен.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Services\UserService $userService
     * @return \Illuminate\Http\Response
     */
    public function signup(Request $request,
                           UserService $userService) : Response
    {
        try
        {
            // Формируем данные доступа
            $session = $userService->registerUser($request);

            // Производим авторизацию
            return $this->success(
                Lang::get('auth.registered'),
                $session
            );
        }
        catch(\Exception $e)
        {
            return $this->failure($e->getMessage());
        }
    }

    /**
     * Прекратить пользовательскую сессию.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Services\UserService $userService
     * @return \Illuminate\Http\Response
     */
    public function logout(UserService $userService) : Response
    {
        try
        {
            // Анулируем токен
            $userService->logoutUser();
            return $this->success(
                Lang::get('auth.logged_out')
            );
        }
        catch(\Exception $e)
        {
            return $this->failure($e->getMessage());
        }
    }
}
