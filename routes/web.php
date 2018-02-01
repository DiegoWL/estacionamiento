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

Route::get('/', 'EstacionamientoController@index')->name('index');
Route::get('salidas', 'SalidaController@index')->name('salidas.registros');
Route::post('/guardar', 'EstacionamientoController@store')->name('estacionamiento.create');
//Route::post('/actualizar', 'EstacionamientoController@update')->name('estacionamiento.update');
Route::get('ingresar', 'IngresoController@index')->name('ingresar');
Route::resource('salida', 'TarifaController');
