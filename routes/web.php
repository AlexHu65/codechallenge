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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
Route::post('/empleado', 'EmpleadosController@store')->name('empleado')->middleware('auth');
Route::post('/empleado/delete', 'EmpleadosController@delete')->name('empleado.delete')->middleware('auth');
Route::post('/empleado/activar', 'EmpleadosController@active')->name('empleado.activar')->middleware('auth');
Route::get('/empleado/detalle/{id}', 'EmpleadosController@index')->name('empleado.detalle')->middleware('auth');



