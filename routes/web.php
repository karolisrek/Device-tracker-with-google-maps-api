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

Route::get('/', 'BasicController@welcom');

Route::post('/', 'BasicController@storeDevice');

/*Route::get('/admin', 'BasicController@adminLogin'); 

Route::post('/admin', 'BasicController@admin'); */

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');


