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
    return view('index');
});
/*
Route::get('/{slug?}', function () {
    return view('index');
});*/
Route::resource('almacen/categoria','CategoriaController');
Route::resource('almacen/articulo','ArticuloController');

Route::resource('compras/proveedor','ProveedorController');
Route::resource('compras/ingreso','IngresoController');

Route::resource('ventas/venta','VentaController');
Route::resource('ventas/cliente','ClienteController');

Route::resource('recibos/pago','ReciboPagoController');
//Route::resource('ventas/cliente','ClienteController');
//Route::get('/home', 'HomeController@index');
//Route::get('/{slug?}', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::auth();Route::get('/', function () {    return view('auth/login');});

