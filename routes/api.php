<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::get('auth-user', 'AuthUserController@show');

    Route::group(['namespace' => 'Link'], function () {
        Route::apiResources([
            '/links' => 'LinkController',
        ]);
    });
});
