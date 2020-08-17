<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('auth-user', 'AuthUserController@show');

    Route::group(['namespace' => 'Api\Link'], function () {
        Route::apiResources([
            '/links' => 'LinkController',
        ]);
//        Route::post('/link/check', 'LinkController@check')->name('links.check');
    });
});
