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
    return view('admin.authentication.login');
})->name('main');

/*
 * Admin routes
 */
Route::group(['prefix' => '/admin'], function () {
    /*
     * Admin required Auth routes
     */
	Route::group(['middleware' => 'admin.auth'], function(){
		//Poner en un controller
		Route::get('/', function () {
		    return view('admin.main.main');
		})->name('admin.index');
		Route::get('/coches/acciones', 'Admin\AdminController@carAdmin')->name('admin.coches.index');
		Route::get('/loginTest', 'Admin\Auth\LoginAdminController@addTestUser');
        /*
         *  Model binding for specific routes
         */
        Route::model('marca', 'App\Patent');
        Route::resource('marca', 'Admin\Entity\Patent\PatentController');
        Route::resource('coches', 'Admin\Entity\Car\CarController');
        Route::resource('combustible', 'Admin\Entity\Combustible\CombustibleController');
        /*
         *  Model binding for specific routes
         */
        Route::model('cambio-de-marcha', 'App\Gearshift');
        Route::resource('cambio-de-marcha', 'Admin\Entity\Gearshift\GearshiftController');
        /*
         *  Model binding for specific routes
         */
        Route::model('normativa-de-emision', 'App\EmissionRegulation');
        Route::resource('normativa-de-emision', 'Admin\Entity\EmissionRegulation\EmissionRegulationController');
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