<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;


Route::post("register", [ AuthController::class, "register" ]);
Route::post("login", [ AuthController::class, "login" ]);

Route::group([

    'middleware' => 'jwt.routes',
    'prefix' => 'v1'

], function ($router) {

    Route::resource( "users", UserController::class );
    Route::post('logout', [ AuthController::class, "logout" ]);
    // Route::post('refresh', [ AuthController::class, "refresh" ]);
    // Route::post('me', [ AuthController::class, "me" ]);

});