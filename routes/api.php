<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/youth-inscriptions', 'YouthInscriptionController@index');
Route::post('/youth-inscriptions', 'YouthInscriptionController@store');
Route::post('/paastornooi-inscriptions', 'PaastornooiInscriptionController@store');
Route::post('/contact', 'ContactSubmissionController@store');
