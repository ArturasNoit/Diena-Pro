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


Auth::routes();

Route::get('/', 'HomeController@index')->middleware("auth")->name('home');

Route::resource('/dishes', 'DishController');

Route::resource('/cart', 'CartController',
	['only' => ['index', 'store', 'destroy']]);

Route::resource('/orders', 'OrderController',
	['only' => ['index', 'store', 'destroy']]);