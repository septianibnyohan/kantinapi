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

Route::get('/', 'DashboardController@index');
Route::get('dashboard', 'DashboardController@index');

Route::resource('userlist', 'UserController');
Route::get('api/userlist','UserController@apiUserlist')->name('api.userlist');
Route::resource('standlist', 'StandController');
Route::get('api/standlist','StandController@apiStandlist')->name('api.standlist');


Route::get('login', 'LoginController@index');
Route::post('proses_login', 'LoginController@prosesLogin');



Route::get('logout', 'LoginController@logout');
