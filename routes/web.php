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
	Route::get('articulo/{id}/destroy', [
			'uses' => 'ArticuloController@destroy',
			'as'   => 'articulo.destroy'
		]);
});


Route::group(['middleware' => ['auth', 'web']], function(){
	Route::get('venta/add', [
		'uses' => 'VentaController@add',
		'as' => 'venta.add'
	]);
	Route::get('venta/autocomplete', [
		'uses' => 'VentaController@autocomplete',
		'as' => 'venta.autocomplete'
	]);
	Route::get('venta/{numVenta}/cierraVenta', [
			'uses' => 'VentaController@cierraVenta',
			'as' => 'venta.cierraVenta'
		]);
	Route::get('venta/{id}/eliminar', [
			'uses' =>  'VentaController@eliminar',
			'as' => 'venta.eliminar'
		]);
	Route::get('venta/cancelaVenta', [
			'uses' =>  'VentaController@cancelaVenta',
			'as' => 'venta.cancelaVenta'
		]);
	Route::resource('venta', 'VentaController');
});

Route::group(['middleware' => 'auth'], function(){
	Route::resource('modelo', 'ModeloController');
});

Route::group(['middleware' => 'auth'], function(){
	Route::resource('compra', 'CompraController');
});
