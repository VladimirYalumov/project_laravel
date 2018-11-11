<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('weather', 'WeatherController@index');
Route::get('sign_in', 'WeatherController@check_registration');
Route::get('sign_up', 'WeatherController@check_input');

Route::get('/', function () {
    return view('welcome');
});

Route::get('registration', function () {
    return view('registration');
});

Route::get('input', function () {
    return view('input');
});

Route::get('user', function () {
    return view('user');
});

Route::get('admin', function () {
    return view('admin');
});