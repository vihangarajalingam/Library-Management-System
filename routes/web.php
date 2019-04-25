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

Route::get('/', 'HomeController@index')->name('home'); //Default home page
Route::get('/home', 'HomeController@index'); //Rerouted home page

Route::get('/register', 'HomeController@register')->name('registerUser'); //Registration page
Route::post('/register', 'HomeController@registerForm')->name('registerForm'); //Form submit for registration

Route::get('/password-reset', 'HomeController@changePassword')->name('changePassword'); //Change password page
Route::post('/password-reset', 'HomeController@changePassword')->name('password.change'); //Form submit for change password

Route::post('/book-details', 'BookDetailsController@index')->name('bookDetails'); //Book details page
Route::post('/change-status', 'BookDetailsController@changeStatus')->name('changeStatus'); //Change book status
