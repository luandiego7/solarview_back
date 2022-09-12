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

Route::get('/ping', function(){
    return ['pong' => true];
});

Route::get('/401', 'Auth\AuthController@unauthorized')->name('login');
Route::post('/auth/login', 'Auth\AuthController@login');
Route::post('/auth/send-email-reset-password', 'Auth\ResetPasswordController@sendEmailResetPassword');
Route::get('/auth/reset-password', 'Auth\ResetPasswordController@getResetPassword');
Route::post('/auth/reset-password', 'Auth\ResetPasswordController@resetPassword');

Route::group(['middleware' => 'auth:api'], function(){
	Route::post('/auth/logout', 'Auth\AuthController@logout');
	Route::post('/auth/refresh', 'Auth\AuthController@refresh');

    Route::get('/address/cep/{cep}', 'AddressController@getCepAddress');

    Route::get('/states', 'StateController@getStates');
    Route::get('/states/{state_id}/cities', 'StateController@getCitiesByState');

    Route::group(['prefix' => 'companies'], function(){
        Route::get('/','Management\CompanyController@getCompanies');
        Route::post('/check-param','Management\CompanyController@checkParam');
        Route::post('/save', 'Management\CompanyController@save');
        Route::get('/{id}', 'Management\CompanyController@getCompany');
        Route::delete('/delete/{id}', 'Management\CompanyController@delete');
    });

    Route::group(['prefix' => 'users'], function(){
        Route::get('/','Management\UserController@getUsers');
        Route::get('/user', 'Management\UserController@user');
        Route::get('/{id}', 'Management\UserController@getUser');
        Route::post('/check-param','Management\UserController@checkParam');
        Route::post('/save', 'Management\UserController@save');
        Route::delete('/delete/{id}', 'Management\UserController@delete');
    });

    Route::group(['prefix' => 'permissions'], function(){
        Route::get('/user', 'Management\PermissionController@getUserPermissions');
        Route::get('/','Management\PermissionController@getPermissions');
        Route::get('/{id}','Management\PermissionController@getPermission');
        Route::post('/check-param','Management\PermissionController@checkParam');
        Route::post('/save','Management\PermissionController@save');
        Route::delete('/delete/{id}', 'Management\PermissionController@delete');
    });

    Route::group(['prefix' => 'roles'], function(){
        Route::get('/','Management\RoleController@getRoles');
        Route::get('/{id}','Management\RoleController@getRole');
        Route::post('/save','Management\RoleController@save');
        Route::delete('/delete/{id}', 'Management\RoleController@delete');
        Route::get('/{id}/permissions', 'Management\RoleController@getRolePermissions');
        Route::put('/{id}/permissions', 'Management\RoleController@updateRolePermissions');
    });

	Route::group(['prefix' => 'profile'], function(){
        Route::get('/', 'ProfileController@profile');
        Route::post('/support', 'ProfileController@support');
        Route::post('/check-param', 'ProfileController@checkParam');
        Route::post('/check-password', 'ProfileController@checkPassword');
        Route::put('/change-password', 'ProfileController@changePassword');
        Route::put('/update', 'ProfileController@update');
        Route::post('/photo', 'ProfileController@updatePhoto');
    });

    Route::group(['prefix' => 'groups'], function(){
        Route::get('/','Management\RoleGroupController@getGroups');
        Route::get('/{id}','Management\RoleGroupController@getGroup');
    });
});

