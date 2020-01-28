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
Route::group(['prefix' => 'frontend'], function () {
    Route::get('/', function () {
        dd('This is the Frontend module index page. Build something great!');
    });
});

Route::get('how-it-works', function()
{
   return view('frontend::how_it_works');
});