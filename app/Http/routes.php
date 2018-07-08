<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
//后台用户控制器
Route::controller('/admin/user', 'admin\UserController');













Route::controller('/admin/category','admin\CategoryController');
Route::controller('/admin/article','admin\ArticleController');








































//后台控制器
Route::controller('/admin', 'admin\AdminController');