<?php

use Illuminate\Support\Facades\Route;

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


/* Mantenimiento */
Route::get('/mantenimiento', 'Mantenimiento\MantenimientoController@index')->name('mantenimiento');
Route::get('/mantenimiento/insumos','Mantenimiento\MantenimientoController@insumos')->name('mantenimiento.insumo');
Route::get('/mantenimiento/proximos','Mantenimiento\MantenimientoController@proximos')->name('mantenimiento.proximos');
Route::get('/mantenimiento/estatus','Mantenimiento\MantenimientoController@estatus')->name('mantenimiento.estatus');

/* Mantenimiento */



// Vehiculos
Route::get('/vehiculos', 'Vehiculos\Vehiculoscontroller@index')->name('vehiculo');


Route::get('/about', function () {
    return view('about');
})->name('about');
