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
    return view('web.main.main');
})->name('home');

Route::get('/contacto', function () {
    return view('web.contact.contactPage');
})->name('contactMain');

Route::get('/sobre-nosotros', function () {
    return view('web.about.aboutMainPage');
})->name('aboutMain');

Route::get('/vehiculos', function () {
    return view('web.store.storeMainPage');
})->name('storeMain');

Route::get('/vehiculos/{id}/{short_name}', function () {
    return view('web.store.productDetailsPage');
})->name('productDetails');

/*
 * Admin routes
 */
Route::group(['prefix' => '/admin'], function () {
    /*
     * Admin required Auth routes
     */
	Route::group(['middleware' => 'admin.auth'], function(){
		//Poner en un controller
        Route::get('/', 'Admin\AdminController@admin')->name('admin.index');
		Route::get('/coches/acciones', 'Admin\AdminController@adminVehicle')->name('admin.coches.index');
		Route::get('/loginTest', 'Admin\Auth\LoginAdminController@addTestUser');
        /* Model binding for specific routes */
        Route::model('vehiculo', 'App\Vehicle');
        /* Vehicle Ajax Calls */
        Route::post('vehiculo/updateActive', 'Admin\Entity\Vehicle\VehicleController@ajaxUpdateActive')->name('vehiculo.ajaxUpdateActive');
        Route::post('vehiculo/updateHighlight', 'Admin\Entity\Vehicle\VehicleController@ajaxUpdateHighlight')->name('vehiculo.ajaxUpdateHighlight');

        /* End vehicle ajax Calls */
        Route::get('vehiculo/visible', 'Admin\Entity\Vehicle\VehicleController@active')->name('vehiculo.active');
        Route::get('vehiculo/no-visible', 'Admin\Entity\Vehicle\VehicleController@disabled')->name('vehiculo.disabled');
        Route::resource('vehiculo', 'Admin\Entity\Vehicle\VehicleController');

        /* Model binding for specific routes */
        Route::model('marca', 'App\Patent');
        Route::resource('marca', 'Admin\Entity\Patent\PatentController');

        //* Model binding for specific routes */
        Route::model('modelo', 'App\Pattern');
        Route::resource('modelo', 'Admin\Entity\Pattern\PatternController');

        Route::resource('combustible', 'Admin\Entity\Combustible\CombustibleController');

        /* Model binding for specific routes */
        Route::model('cambio-de-marcha', 'App\Gearshift');
        Route::resource('cambio-de-marcha', 'Admin\Entity\Gearshift\GearshiftController');

        /* Model binding for specific routes */
        Route::model('normativa-de-emision', 'App\EmissionRegulation');
        Route::resource('normativa-de-emision', 'Admin\Entity\EmissionRegulation\EmissionRegulationController');

        /* Model binding for specific routes */
        Route::model('tipo-de-vehiculo', 'App\VehicleType');
        Route::resource('tipo-de-vehiculo', 'Admin\Entity\VehicleType\VehicleTypeController');

        /* Model binding for specific routes */
        Route::model('traccion', 'App\Traction');
        Route::resource('traccion', 'Admin\Entity\Traction\TractionController');


        Route::resource('color', 'Admin\Entity\Color\ColorController');
    });
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