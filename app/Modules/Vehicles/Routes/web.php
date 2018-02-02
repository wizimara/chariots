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

Route::group(['prefix' => 'admin/vehicles'], function () {
    Route::get('/', function () {
        dd('This is the Vehicles module index page. Build something great!'); });
	Route::resource('/categories', 'CategoryController');	
	Route::resource('/makes', 'MakeController');
	Route::resource('/models', 'ModelController');
	Route::resource('/vehicles', 'VehiclesController');
	Route::resource('/carimages', 'CarimageController');
	Route::get('/carimages/{id}/published', 'CarimageController@published');
	
});
