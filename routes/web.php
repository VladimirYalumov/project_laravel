<?php

Route::get('weather', 'WeatherController@index');


Route::get('/registration', 'RegistrationController@create');

Route::get('/sign_in', 'RegistrationController@store');


Route::get('/login', 'SessionContoller@create');

Route::get('/sign_up', 'SessionContoller@store');

Route::get('/logout', 'SessionContoller@destroy');


Route::get('/', function () {
    return view('welcome');
});

Route::get('user', function () {
    return view('user');
});

Route::get('/admin', function () {
    return view('admin');
});