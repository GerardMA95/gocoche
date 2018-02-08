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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/admin'], function () {
	//Poner en un controller
	Route::get('/', function () {
	    return view('admin.main.main');
	})->name('admin.index');

	Route::get('/coches/acciones', 'Admin\AdminController@carAdmin')->name('admin.coches.index');

	Route::resource('coches', 'Admin\Entity\Car\CarController');
});


Route::resource('user', 'Auth\RegisterController');