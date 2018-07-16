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

Route::group(['middleware' => 'user_login'],function(){
	Route::controller('/admin/user', 'admin\UserController');
	
	Route::controller('/admin/message', 'admin\MessageController');
	Route::controller('/admin/category','admin\CategoryController');
	Route::controller('/admin/article','admin\ArticleController');
	Route::controller('/admin/collect','admin\CollectController');
	Route::controller('/admin/link','admin\LinkController');
	Route::controller('/admin/dh','admin\DhController');
	Route::controller('/admin/lb','admin\LbController');
	Route::controller('/admin/wp','admin\WzpzController');
	Route::controller('/admin/xc','admin\XcController');
	Route::controller('/admin/sjz','admin\SjzController');
	//后台控制器
	Route::controller('/admin', 'admin\AdminController');
});
Route::controller('/home/login', 'home\LoginController');    

Route::controller('/home/article', 'home\ArticleController');

Route::controller('/home/message', 'home\MessageController');
















Route::controller('/home/about','home\AboutController');



























Route::controller('/home/xc','home\XcController');
Route::controller('/home/sjz','home\SjzController');








//前台控制器
Route::controller('/', 'home\HomeController');