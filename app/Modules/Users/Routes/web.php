<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'admin/users','middleware'=>['auth','web']], function () {
    Route::get('/',['as'=>'users.list','uses'=>'UserController@listUsers']);
	Route::get('/roles',['as'=>'roles.list','uses'=>'UserController@listRoles']);
	Route::get('/permissions',['as'=>'permissions.list','uses'=>'UserController@listPermissions']);
});
