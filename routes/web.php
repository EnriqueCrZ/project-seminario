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

/*Route::get('/', function () {
    return view('home');
})->middleware('auth');*/

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');
/* Proveedor */
Route::get('/proveedores', 'Proveedores\ProveedorController@index')->name('proveedor');
Route::get('/proveedores/create', 'Proveedores\ProveedorController@create')->name('proveedor.crear');
Route::post('/proveedores/store', 'Proveedores\ProveedorController@save')->name('proveedor.store');
Route::get('/proveedores/edit/{proveedor}', 'Proveedores\ProveedorController@edit')->name('proveedor.edit');
Route::post('/proveedores/update/{proveedor}', 'Proveedores\ProveedorController@update')->name('proveedor.update');
Route::post('/proveedores/delete/', 'Proveedores\ProveedorController@destroy')->name('proveedor.delete');
/* Proveedor */

Route::get('/about', function () {
    return view('about');
})->name('about');
