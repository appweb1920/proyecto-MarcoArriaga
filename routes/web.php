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

Route::resource('/', 'InventarioController');

Route::resource('inventario', 'InventarioController');
Route::get('/categorias/{id}', 'InventarioController@categoriaSel');
Route::get('/marcas/{id}', 'InventarioController@marcaSel');

Route::resource('categoria', 'CategoriaController');
Route::resource('marca', 'MarcaController');
Auth::routes();

Route::get('/Inicio','InventarioController@index');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
