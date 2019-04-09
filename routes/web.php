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

Auth::routes(); //Authentication

Auth::routes(['register' => false]); //Remove registration from login page

Route::get('/', 'HomeController@index')->name('home'); //Default home page
Route::get('/home', 'HomeController@index')->name('home'); //Default home page
