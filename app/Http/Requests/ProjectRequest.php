<?php

namespace App\Http\Requests;

class ProjectRequest extends BaseRequest {

    /**
     * Перед валидацией добавляем идентфиикатор
     * проекта в Request для последующей проверки.
     *
     * @return void
     */
    public function prepareForValidation() : void
    {
        $this->merge([
            "projectId" => $this->headers->get("Project-Id"),
        ]);
    }

}
