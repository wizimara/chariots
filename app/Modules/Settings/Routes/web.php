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

Route::group(['prefix' => 'admin/settings'], function () {
    Route::get('/', function () {
        dd('This is the Settings module index page. Build something great!');
    });
//Route::resource('/settings', 'SettingController');
Route::get('settings', 'SettingController@index')->name('settings.index');
Route::post('settings', 'SettingController@store')->name('settings.store');
Route::any('settings/{id}/update', 'SettingController@update')->name('settings.update');
Route::any('settings/{id}/delete', 'SettingController@delete')->name('settings.delete');


});
