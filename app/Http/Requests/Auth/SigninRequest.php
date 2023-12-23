<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;

class SigninRequest extends BaseRequest {

    /**
     * Правила фильтрации данных.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ];
    }
}
