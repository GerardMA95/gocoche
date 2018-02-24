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
})->name('main');

Route::group(['prefix' => '/admin'], function () {
	Route::group(['middleware' => 'admin.auth'], function(){
		//Poner en un controller
		Route::get('/', function () {
		    return view('admin.main.main');
		})->name('admin.index');
		Route::get('/coches/acciones', 'Admin\AdminController@carAdmin')->name('admin.coches.index');
		Route::get('/loginTest', 'Admin\Auth\LoginAdminController@addTestUser');
        Route::resource('coches', 'Admin\Entity\Car\CarController');
        Route::resource('combustible', 'Admin\Entity\Combustible\CombustibleController');
        Route::resource('cambio', 'Admin\Entity\Gearshift\GearshiftController');
    });

	Route::get('/loginTest', 'Admin\Auth\LoginAdminController@addTestUser');
	/*
	* Admin Log In section
	*/
	Route::get('/login', 'Admin\Auth\LoginAdminController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Admin\Auth\LoginAdminController@login')->name('admin.login');
	/*
	* Admin Log Out section
	*/
	Route::get('/logout', 'Admin\Auth\LoginAdminController@logout')->name('admin.logout');
});


//Route::resource('user', 'Auth\RegisterController');