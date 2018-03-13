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

Route::get('/','HomeController@index')->name('login');
Route::post('/','HomeController@signin');
Route::get('/register','HomeController@register');
Route::post('/register', 'HomeController@postRegister');
Route::post('/logout', 'HomeController@postLogout');

////////////////////////////  Dashboard Routes//////////////////

Route::prefix('main')->middleware('auth')->group(function(){
	Route::get('/','DashboardController@index');


});

