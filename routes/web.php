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
Route::view('/','welcome');
Route::get('/','ConductorController@index');
Route::post('/conductor','ConductorController@store')->name('Gconductor');
Route::post('/vehiculo','VehiculoController@store')->name('Gvehiculo');

Route::get('/editC/{id}','ConductorController@edit')->name('editC');
Route::get('/editV/{id}','VehiculoController@edit')->name('editV');

Route::put('/conductorA/{id}','ConductorController@update')->name('Econductor');
Route::put('/vehiculoA/{id}','VehiculoController@update')->name('Evehiculo');

Route::delete('/conductorD/{conductor}','ConductorController@destroy')->name('Dconductor');
Route::delete('/vehiculoD/{vehiculo}','VehiculoController@destroy')->name('Dvehiculo');




//Route::resource('conductor', 'ConductorController');