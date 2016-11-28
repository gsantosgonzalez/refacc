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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function(){
	Route::resource('cliente', 'ClienteController');
	Route::get('cliente/{id}/destroy', [
			'uses' => 'ClienteController@destroy',
			'as'   => 'cliente.destroy'
		]);
});

Route::group(['middleware' => 'auth'], function(){
	Route::resource('proveedor', 'ProveedorController');
	Route::get('proveedor/{id}/destroy', [
			'uses' => 'ProveedorController@destroy',
			'as'   => 'proveedor.destroy'
		]);
});

Route::group(['middleware' => ['auth', 'web']], function(){
	Route::resource('articulo', 'ArticuloController');
});


Route::group(['middleware' => 'auth'], function(){
	Route::resource('modelo', 'ModeloController');
});

Route::group(['middleware' => 'auth'], function(){
	Route::resource('compra', 'CompraController');
});

Route::group(['middleware' => 'auth'], function(){
	Route::resource('venta', 'VentaController');
});