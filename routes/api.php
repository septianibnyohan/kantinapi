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



Route::post('register', 'ApiController@register');
Route::post('login', 'ApiController@login');
Route::get('get_summary', 'DashboardController@get_summary');

Route::get('list_stand', 'StandController@list_stand');
Route::post('add_stand', 'StandController@add_stand');