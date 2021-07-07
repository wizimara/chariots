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
Route::get('/', 'PublicController@showHomepage')->name('home');
Route::post('/','PublicController@search_for_vehicles')->name('vehicles.search');
Route::group(['prefix' => 'frontend'], function () {
    Route::get('/', function () {
        dd('This is the Frontend module index page. Build something great!');
    });
});

Route::get('how-it-works', function()
{
   return view('frontend::how_it_works');
});

Route::get('get-help', function()
{
   return view('frontend::get_help');
});

Route::get('vehicle-categories/{category_id}','PublicController@view_vehicles_in_category')->name('vehicles.in.category');
Route::get('vehicle/{vehicle_id}/{start?}/{end?}','PublicController@vehicle_detail')->name('vehicle.detail');
Route::post('vehicle/{vehicle_id}/{start?}/{end?}','PublicController@book_vehicle')->name('booking.save');
Route::get('result','PublicController@show_notification')->name('frontend.notification');
Route::get('cart','PublicController@cart')->name('frontend.cart');
Route::get('add-to-cart','PublicController@addToCart')->name('frontend.addToCart');
