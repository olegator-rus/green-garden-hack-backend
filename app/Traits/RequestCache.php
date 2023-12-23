<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait RequestCache
{

    /**
     * Преобразование параметров запроса в хеш md5.
     * Данный метод необходим для адекватного кеширования
     * запросов с фильтрами.
     *
     * @return string
     */
    public function requestToHash(Request $request) : string
    {
        $all = $request->all();
        return md5(json_encode($all));
    }

}
