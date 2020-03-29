<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//


Route::group(['middleware' => ['throttle:60,1']], function () {
    Route::post('/register', 'Api\AuthController@register')->name('api.register');
    Route::post('/login', 'Api\AuthController@login')->name('api.login');
});

Route::group(['middleware' => ['auth:api', 'throttle:60,1']], function () {
    Route::post('/categories', 'Api\CategoryController@index')->name('api.categories');
    Route::post('/categories/{id}', 'Api\CategoryController@show')->where(['id' => '[0-9]+'])->name('api.category');
});
