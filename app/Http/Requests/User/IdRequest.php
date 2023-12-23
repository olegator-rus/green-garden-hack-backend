<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;

class IdRequest extends BaseRequest {

    /**
     * Правила фильтрации данных.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'id' => 'required|int|exists:users,id',
        ];
    }
}
