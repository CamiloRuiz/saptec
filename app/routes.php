<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function()
{
	return View::make('hello');
});*/
/*Route::get('admin/users/delete/{user}', array(
    'as' => 'delete_user',
    'uses' => 'Admin_UsersController@confirmDelete'
));*/
Route::get('admin/users/delete/{user}', 'Admin_UsersController@confirmDelete');
Route::resource('admin/users', 'Admin_UsersController');

Route::get('admin/permisos/delete/{permiso}', 'Admin_PermisosController@confirmDelete');
Route::resource('admin/permisos', 'Admin_PermisosController');

Route::get('admin/roles/delete/{role}', 'Admin_RolesController@confirmDelete');
Route::get('admin/roles/permisos/{role}', 'Admin_RolesController@managePermisos');
Route::post('admin/roles/permisos/{role}', 'Admin_RolesController@updatePermisos');
Route::resource('admin/roles', 'Admin_RolesController');



/*Llamadas al controlador Auth*/
Route::get('login', 'AuthController@showLogin'); // Mostrar login
Route::post('login', 'AuthController@postLogin'); // Verificar datos
Route::get('logout', 'AuthController@logOut'); // Finalizar sesión
 
/*Rutas privadas solo para usuarios autenticados*/
Route::group(['before' => 'auth'], function()
{
    Route::get('/', 'HomeController@showWelcome'); // Vista de inicio

	Route::resource('cotizaciones', 'CotizacionesController');
});

Route::get('admin', function() {
	return View::make('admin/layout');
});