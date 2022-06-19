<?php

use Illuminate\Support\Facades\Route;

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
    //return view('login');
    return redirect('login');
});
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes( ['register' => false] );
Route::resource('facturas', 'FacturasController');
Route::resource('facturaDetalles', 'FacturaDetallesController');
Route::resource('personas', 'PersonasController');
Route::resource('tipos', 'TiposController');
Route::resource('almaneces', 'AlmanecesController');
Route::resource('productos', 'ProductosController');

Route::post('/facturas', 'FacturasController@index')->name('facturas.index');