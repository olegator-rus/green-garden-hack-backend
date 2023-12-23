<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;

class UpdateRequest extends BaseRequest {

    /**
     * Правила фильтрации данных.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'id' => 'required|int|exists:users,id',
            'email' => ['nullable', 'string:40', 'regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/'],
            'name' => 'required|string|min:2|max:20',
            'surname' => 'required|string|min:2|max:35',
            'patronymic' => 'nullable|string|min:2|max:20',
            'address' => 'nullable|string|max:90',
        ];
    }
}
