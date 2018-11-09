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

Route::get('souvenir/{id}/detail', 'SouvenirController@show')->name('souvenir@detail');

Route::get('souvenir/{id}/edit', 'SouvenirController@edit')->name('souvenir@edit');

Route::post('souvenir/{id}/update', 'SouvenirController@update')->name('souvenir@update');

Route::get('souvenir/{id}/delete', 'SouvenirController@destroy')->name('souvenir@delete');

Route::get('souvenir/create', 'SouvenirController@create')->name('souvenir@create');

Route::post('souvenir/store', 'SouvenirController@store')->name('souvenir@store');

Route::resource('category', 'CategoryController');

Route::any('category/{id}/delete', 'CategoryController@destroy');

Route::resource('supplier', 'SupplierController');

Route::any('supplier/{id}/delete', 'SupplierController@destroy');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

// Ajax
Route::post('/cart/addItem', 'CartController@addItem');

Route::get('/cart/getCart', 'CartController@getCart');

Route::get('/cart/reduceItem/{id}', 'CartController@reduceItem');

Route::get('/cart/emptyCart', 'CartController@emptyCart');

Route::get('/cart/checkOut', 'CartController@checkOut');

Route::resource('order', 'OrderController');
