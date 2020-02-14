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

Route::group(['middleware' => 'auth','prefix' => 'admin/users'], function () {
    Route::get('/', function () {
        dd('This is the Users module index page. Build something great!');
    });
    //Route::resource('permissions','PermissionController');
   //Route::resource('roles','RoleController');
   //Route::resource('users','UserController');
   //permissions
Route::get('users/permissions', 'UsersController@permissions')->name('users.permissions');
Route::post('users/permissions', 'UsersController@storepermissions')->name('users.permissions.store');
Route::any('users/permissions/{id}/update', 'UsersController@updatepermissions')->name('users.permissions.update');
Route::any('users/permissions/{id}/delete', 'UsersController@deletepermissions')->name('users.permissions.delete');
//roles
Route::get('users/roles', 'UsersController@roles')->name('users.roles');
Route::get('users/roles/create', 'UsersController@createroles')->name('users.roles.create');
Route::post('users/roles', 'UsersController@storeroles')->name('users.roles.store');
Route::get('users/roles/{id}/edit', 'UsersController@editroles')->name('users.roles.edit');
Route::any('users/roles/{id}/update', 'UsersController@updateroles')->name('users.roles.update');
Route::any('users/roles/{id}/delete', 'UsersController@deleteroles')->name('users.roles.delete');
//users
Route::get('users', 'UsersController@users')->name('users');
Route::get('users/create', 'UsersController@createusers')->name('users.create');
Route::post('users', 'UsersController@storeusers')->name('users.store');
Route::get('users/{id}/edit', 'UsersController@editusers')->name('users.edit');
Route::any('users/{id}/update', 'UsersController@updateusers')->name('users.update');
Route::any('users/{id}/delete', 'UsersController@deleteusers')->name('users.delete');

});
