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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/kleding', 'KledingController@index');
Route::get('/covid', 'CovidController@index');
Route::get('/covid-registratie', 'CovidController@registrationForm');
Route::post('/covid-registratie', 'CovidController@store');
Route::post('/kleding', 'KledingController@store');

Route::get('/take-away-stoofpotjes', 'BestellingController@index');
Route::post('/take-away-stoofpotjes', 'BestellingController@store');
