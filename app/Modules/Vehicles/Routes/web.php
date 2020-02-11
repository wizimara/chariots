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
 //Categories
  Route::get('categories', 'CategoryController@index')->name('categories.index');
  Route::post('categories', 'CategoryController@store')->name('categories.store');
  Route::any('categories/{id}/update', 'CategoryController@update')->name('categories.update');
  Route::any('categories/{id}/delete', 'CategoryController@delete')->name('categories.delete');

  //Makes
   Route::get('makes', 'MakeController@index')->name('makes.index');
   Route::post('makes', 'MakeController@store')->name('makes.store');
   Route::any('makes/{id}/update', 'MakeController@update')->name('makes.update');
   Route::any('makes/{id}/delete', 'MakeController@delete')->name('makes.delete');
   //Models
   Route::get('models', 'ModelController@index')->name('models.index');
   Route::post('models', 'ModelController@store')->name('models.store');
   Route::any('models/{id}/update', 'ModelController@update')->name('models.update');
   Route::any('models/{id}/delete', 'ModelController@delete')->name('models.delete');

   //Features
   Route::get('features', 'FeaturesController@index')->name('features.index');
   Route::post('features', 'FeaturesController@store')->name('features.store');
   Route::any('features/{id}/update', 'FeaturesController@update')->name('features.update');
   Route::any('features/{id}/delete', 'FeaturesController@delete')->name('features.delete');

   //locations
   Route::get('locations', 'LocationController@index')->name('locations.index');
   Route::post('locations', 'LocationController@store')->name('locations.store');
   Route::any('locations/{id}/update', 'LocationController@update')->name('locations.update');
   Route::any('locations/{id}/delete', 'LocationController@delete')->name('locations.delete');

   //Vehicles
   Route::get('vehicles', 'VehiclesController@index')->name('vehicles.index');
   Route::get('vehicles/create', 'VehiclesController@create')->name('vehicles.create');
   Route::post('vehicles', 'VehiclesController@store')->name('vehicles.store');
   Route::get('vehicles/{id}/edit', 'VehiclesController@edit')->name('vehicles.edit');
   Route::any('vehicles/{id}/update', 'VehiclesController@update')->name('vehicles.update');
   Route::any('vehicles/{id}/delete', 'VehiclesController@delete')->name('vehicles.delete');
  //Images
   Route::post('/carimages', 'CarimageController@store')->name('carimages.store');
   Route::get('/carimages/{id}/published', 'CarimageController@published')->name('carimages.published');
   Route::get('/carimages/{id}/delete', 'CarimageController@delete')->name('carimages.delete');

});
