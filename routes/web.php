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
Route::post('/vehiculo','ConductorController@store')->name('Gvehiculo');
//Route::resource('conductor', 'ConductorController');