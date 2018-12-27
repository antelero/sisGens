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

//Inicio
Route::get('/', function () {
    return view('index');
});

//Ruta almacen
Route::resource('almacen/categoria','CategoriaController');
Route::resource('almacen/articulo','ArticuloController');

//Ruta compras
Route::resource('compras/proveedor','ProveedorController');
Route::resource('compras/ingreso','IngresoController');

//Ruta ventas
Route::resource('ventas/venta','VentaController');
Route::resource('ventas/cliente','ClienteController');

//Ruta almacen
Route::resource('recibos/pago','ReciboPagoController');
//Route::resource('ventas/cliente','ClienteController');
//Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::auth();Route::get('/', function () {    return view('auth/login');});

//opcion de ayuda
Route::get('/ayuda', function () { return view('ayuda');});
Route::get('/pdf', function () { return view('pdf');});

//opcion por defecto
Route::get('/{slug?}', function () {
    return view('index');
});
//Route::get('/{slug?}', 'HomeController@index');