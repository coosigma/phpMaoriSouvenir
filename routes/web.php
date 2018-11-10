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

//Route::get('/', function () {
//    return view('welcome');
//});

// Auth
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('logout', 'Auth\LoginController@logout')->middleware('auth');
//

Route::get('/', 'HomeController@index')->name('home@index');

Route::get('about', 'HomeController@about')->name('home@about');

Route::get('contact', 'HomeController@contact')->name('home@contact');

// souvenir
Route::get('souvenir', 'SouvenirController@index')->name('souvenir@index');

Route::get('souvenir/{id}/detail', 'SouvenirController@show')->name('souvenir@detail');

Route::get('souvenir/{id}/edit', 'SouvenirController@edit')->name('souvenir@edit')->middleware('is_admin');

Route::post('souvenir/{id}/update', 'SouvenirController@update')->name('souvenir@update')->middleware('is_admin');

Route::get('souvenir/{id}/delete', 'SouvenirController@destroy')->name('souvenir@delete')->middleware('is_admin');

Route::get('souvenir/create', 'SouvenirController@create')->name('souvenir@create')->middleware('is_admin');

Route::post('souvenir/store', 'SouvenirController@store')->name('souvenir@store')->middleware('is_admin');

// category
Route::resource('category', 'CategoryController')->middleware('is_admin');

Route::any('category/{id}/delete', 'CategoryController@destroy')->middleware('is_admin');

// supplier
Route::resource('supplier', 'SupplierController')->middleware('is_admin');

Route::any('supplier/{id}/delete', 'SupplierController@destroy')->middleware('is_admin');

// Ajax
Route::post('/cart/addItem', 'CartController@addItem');

Route::get('/cart/getCart', 'CartController@getCart');

Route::get('/cart/reduceItem/{id}', 'CartController@reduceItem');

Route::get('/cart/emptyCart', 'CartController@emptyCart');

// Order
Route::get('/cart/checkOut', 'CartController@checkOut');
Route::resource('order', 'OrderController')->middleware('verified');
Route::post('/order/changeOrderStatus', 'OrderController@changeStatus')->middleware('is_admin');
Route::any('/order/{id}/delete', 'OrderController@destroy')->middleware('is_admin');
Route::view('placeOrder', 'order.placeOrder')->middleware('verified');
// Member
Route::resource('member', 'MemberController')->middleware('is_admin');
Route::post('/member/changeUserEnabled', 'MemberController@changeUserEnabled')->middleware('is_admin');
Route::any('/member/{id}/delete', 'MemberController@destroy')->middleware('is_admin');

// Account
Route::get('account', 'AccountController@account')->middleware('auth');
Route::put('account/{id}', 'AccountController@update')->middleware('auth');
