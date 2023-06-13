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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::namespace('App\Http\Controllers')
    //->middleware(['auth:sanctum'])
    ->group(function () {

        //后台注册接口
        Route::post('/members/register', 'AdminsController@register');//后台用户注册
        Route::post('/members/login', 'AdminsController@login');//后台用户登录
        Route::middleware(['auth:sanctum'])
            ->group(function () {
                Route::get('/members/lists','AdminsController@list');//后台用户列表

                //权限-角色
                Route::resource('/roles','RolesController');

                //权限-权限
                Route::resource('/permissions','PermissionsController');
            });

        Route::get('/lists', 'AdminsController@index');
    });
