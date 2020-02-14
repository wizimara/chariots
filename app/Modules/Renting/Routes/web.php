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
    //pricings
    Route::get('pricings', 'PricingController@index')->name('pricings.index');
    Route::get('pricings/create', 'PricingController@create')->name('pricings.create');
    Route::post('pricings', 'PricingController@store')->name('pricings.store');
    Route::get('pricings/{id}/edit', 'PricingController@edit')->name('pricings.edit');
    Route::any('pricings/{id}/update', 'PricingController@update')->name('pricings.update');
    Route::any('pricings/{id}/delete', 'PricingController@delete')->name('pricings.delete');
    Route::post('schedules', 'PricingController@schedulesstore')->name('pricings.schedules.store');
    Route::post('schedules/update', 'PricingController@schedulesupdate')->name('pricings.schedules.update');
    //bookings
    Route::get('bookings', 'BookingController@index')->name('bookings.index');
    Route::get('bookings/create', 'BookingController@create')->name('bookings.create');
    Route::post('bookings', 'BookingController@store')->name('bookings.store');
    Route::get('bookings/{id}/edit', 'BookingController@edit')->name('bookings.edit');
    Route::any('bookings/{id}/update', 'BookingController@update')->name('bookings.update');
    Route::any('bookings/{id}/delete', 'BookingController@delete')->name('bookings.delete');

    //confirmedrentals
    Route::get('confirmedrentals', 'ConfirmedrentalController@index')->name('confirmedrentals.index');
    Route::get('confirmedrentals/create', 'ConfirmedrentalController@create')->name('confirmedrentals.create');
    Route::post('confirmedrentals', 'ConfirmedrentalController@store')->name('confirmedrentals.store');
    Route::get('confirmedrentals/{id}/edit', 'ConfirmedrentalController@edit')->name('confirmedrentals.edit');
    Route::any('confirmedrentals/{id}/update', 'ConfirmedrentalController@update')->name('confirmedrentals.update');
    Route::any('confirmedrentals/{id}/delete', 'ConfirmedrentalController@delete')->name('confirmedrentals.delete');
  //Route::resource('/bookings', 'BookingController');
  //Route::resource('/confirmedrentals', 'ConfirmedrentalController');
  Route::resource('/payments', 'PaymentController');
});
