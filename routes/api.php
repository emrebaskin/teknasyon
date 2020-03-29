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
    Route::post('/version-check', 'Api\VersionController@index')->name('api.versionCheck');
});

Route::group(['middleware' => ['auth:api', 'throttle:60,1']], function () {
    Route::get('/categories', 'Api\CategoryController@index')->name('api.categories');
    Route::get('/categories/{id}', 'Api\CategoryController@show')->where(['id' => '[0-9]+'])->name('api.category');

    Route::get('/sounds/{id}', 'Api\SoundController@show')->where(['id' => '[0-9]+'])->name('api.sound');

    Route::get('/favorite-sounds', 'Api\FavoriteSoundController@index')->name('api.favoriteSounds');
    Route::post('/favorite-sounds/{id}', 'Api\FavoriteSoundController@store')->where(['id' => '[0-9]+'])->name('api.favoriteSoundAdd');
    Route::delete('/favorite-sounds/{id}', 'Api\FavoriteSoundController@destroy')->where(['id' => '[0-9]+'])->name('api.favoriteSoundDelete');
});
