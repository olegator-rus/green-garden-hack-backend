<?php

use App\Http\Controllers\API\v1\AuthController;
use App\Http\Controllers\API\v1\UserController;
use Illuminate\Support\Facades\Route;

// API первого поколения
Route::group(['prefix' => 'v1'], function () {

    // Роуты доступные не аутентифицрованным пользователям
    Route::group(['middleware' => ['api', 'cors']], function() {

        // Маршуруты модуля «Участники»
        Route::prefix('/user')->group(function(){
            Route::post('/login', [ AuthController::class, 'login' ]);
        });

    });

    // Общие роуты аутентифицированных пользователей
    Route::group(['middleware' => ['auth:api']], function() {

        // Маршуруты модуля «Пользователи»
        Route::prefix('/user')->group(function(){
            Route::group(['middleware' => 'role:client|manager|admin'], function () {
                Route::post('/me', [ UserController::class, 'me' ]);
                Route::post('/logout', [ AuthController::class, 'logout' ]);
                Route::get('/legend', [ UserController::class, 'legend' ]);
                Route::get('/machinists', [ UserController::class, 'machinists' ]);
            });

            Route::group(['middleware' => 'role:admin'], function () {
                Route::get('/all', [ UserController::class, 'all' ]);
                Route::get('/get', [ UserController::class, 'get' ]);
                Route::patch('/update', [ UserController::class, 'update' ]);
            });
        });

    });

});
