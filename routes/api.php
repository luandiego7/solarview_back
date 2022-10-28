<?php

use Illuminate\Http\Request;
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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/ping', function () {
    return ['pong' => true];
});

Route::get('/401', 'Auth\AuthController@unauthorized')->name('login');
Route::post('/auth/login', 'Auth\AuthController@login');
Route::post('/auth/register', 'Auth\AuthController@register');
Route::post('/auth/send-email-reset-password', 'Auth\ResetPasswordController@sendEmailResetPassword');
Route::get('/auth/reset-password', 'Auth\ResetPasswordController@getResetPassword');
Route::post('/auth/reset-password', 'Auth\ResetPasswordController@resetPassword');

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/auth/logout', 'Auth\AuthController@logout');
    Route::post('/auth/refresh', 'Auth\AuthController@refresh');

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'Management\UserController@getUsers');
        Route::post('/', 'Management\UserController@create');
        Route::put('/{id}', 'Management\UserController@update');
        Route::get('/{id}', 'Management\UserController@getUser');
        Route::post('/check-param', 'Management\UserController@checkParam');
        Route::delete('/{id}', 'Management\UserController@delete');
    });

    Route::group(['prefix' => 'logs'], function () {
        Route::get('/dashboard', 'LogsController@dashboard');
        Route::get('/', 'LogsController@getLogs');
        Route::post('/', 'LogsController@create');
        Route::put('/', 'LogsController@update');
        Route::get('/{id}', 'LogsController@getLog');
        Route::delete('/{id}', 'LogsController@delete');
    });

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', 'ProfileController@profile');
        Route::post('/support', 'ProfileController@support');
        Route::post('/check-param', 'ProfileController@checkParam');
        Route::post('/check-password', 'ProfileController@checkPassword');
        Route::put('/change-password', 'ProfileController@changePassword');
        Route::put('/update', 'ProfileController@update');
        Route::post('/photo', 'ProfileController@updatePhoto');
    });
});
