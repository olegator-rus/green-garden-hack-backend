<?php

namespace App\Http\Requests;

use App\Traits\JsonResponds;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Lang;

class BaseRequest extends FormRequest {

    // Подключаем трейт ответов
    use JsonResponds;

    /**
     * Авторизация выполнения реквеста.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Настройка форматирования ответа сервера.
     *
     * @return void
     */
    protected function failedValidation(Validator $validator) : void
    {
        throw new HttpResponseException(
            $this->failure(Lang::get('validation.error'))
        );
    }
}
