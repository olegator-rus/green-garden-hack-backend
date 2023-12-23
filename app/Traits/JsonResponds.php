<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait JsonResponds
{

    /**
     * Трейт преобразования успешного ответа сервера,
     * со статус кодом.
     *
     * @param  $message
     * @param  $data
     * @param  $status
     * @return \Illuminate\Http\Response
     */
    protected function success($message, $data = [], $status = 200) : Response
    {
        return response([
            'success' => true,
            'data' => $data,
            'message' => $message,
        ], $status);
    }

    /**
     * Трейт преобразования ошибочного ответа сервера,
     * со статус кодом.
     *
     * @param  $message
     * @param  $data
     * @param  $status
     * @return \Illuminate\Http\Response
     */
    protected function failure($message, $status = 422) : Response
    {
        return response([
            'success' => false,
            'message' => $message,
        ], $status);
    }
}
