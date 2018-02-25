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

Route::group(['prefix' => 'admin/renting'], function () {
    Route::get('/', function () {
        dd('This is the Renting module index page. Build something great!');
    });
  Route::resource('/bookings', 'BookingController');
  Route::resource('/confirmedrentals', 'ConfirmedrentalController');
  Route::resource('/payments', 'PaymentController');
});
