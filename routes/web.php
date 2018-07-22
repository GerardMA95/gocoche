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

/*
 * Web routes
 */
Route::namespace('Web')->group(function () {
    /* Main page */
    Route::get('/', 'Main\WebMainController@main')->name('home');

    /* Contact Routes */
    Route::get('/contacto', 'Contact\ContactController@contactMain')->name('contactMain');

    /* About Routes */
    Route::get('/sobre-nosotros', 'About\AboutController@aboutMain')->name('aboutMain');

    /* STORE Routes */
    Route::get('/vehiculos', 'Store\StoreController@storeMain')->name('storeMain');
    Route::post('/vehiculos', 'Store\StoreController@storeFiltered')->name('storeFiltered');
    Route::get('/vehiculos/{patentShortName}', 'Store\StoreController@storeFilterePatent')->name('storePatent');

    Route::get('/vehiculos/{idVehicle}/{patentShortName}/{vehicleShortName}', 'Store\StoreController@storeDetails')->name('productDetails');
});

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
        Route::get('vehiculo/no-visible', 'Admin\Entity\Vehicle\VehicleController@disabledVehicleList')->name('vehiculo.disabled');
        Route::resource('vehiculo', 'Admin\Entity\Vehicle\VehicleController');

        /* Model binding for specific routes */
        Route::model('marca', 'App\Patent');
        Route::resource('marca', 'Admin\Entity\Patent\PatentController');

        /* Vehicle Ajax Calls */
        Route::post('modelo/reloadPatternList', 'Admin\Entity\Pattern\PatternController@ajaxReloadPatternList')->name('modelo.reloadPatternList');
        /* End vehicle ajax Calls */
        //* Model binding for specific PATTERN routes */
        Route::model('modelo', 'App\Pattern');
        Route::resource('modelo', 'Admin\Entity\Pattern\PatternController');

        /* COMBUSTIBLE ROUTES */
        Route::resource('combustible', 'Admin\Entity\Combustible\CombustibleController');

        /* Model binding for specific GEARSHIFT routes */
        Route::model('cambio-de-marcha', 'App\Gearshift');
        Route::resource('cambio-de-marcha', 'Admin\Entity\Gearshift\GearshiftController');

        /* Model binding for specific EMISSION REGULATION routes */
        Route::model('normativa-de-emision', 'App\EmissionRegulation');
        Route::resource('normativa-de-emision', 'Admin\Entity\EmissionRegulation\EmissionRegulationController');

        /* Model binding for specific VEHICLE TYPE routes */
        Route::model('tipo-de-vehiculo', 'App\VehicleType');
        Route::resource('tipo-de-vehiculo', 'Admin\Entity\VehicleType\VehicleTypeController');

        /* Model binding for specific TRACTION routes */
        Route::model('traccion', 'App\Traction');
        Route::resource('traccion', 'Admin\Entity\Traction\TractionController');

        /* COLOR ROUTES */
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