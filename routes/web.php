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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); 

// gallery
Route::get('/gallery', 'ImageController@index'); 
Route::post('/gallery/upload', 'ImageController@store'); 
Route::post('/gallery/delete', 'ImageController@destroy'); 




