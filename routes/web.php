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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'HomeController@index')->name('home@index');

Route::get('about', 'HomeController@about')->name('home@about');

Route::get('contact', 'HomeController@contact')->name('home@contact');

Route::get('souvenir', 'SouvenirController@index')->name('souvenir@index');