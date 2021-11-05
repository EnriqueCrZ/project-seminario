<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('home');
})->middleware('auth');*/

Auth::routes(['register' => false]);

/*
 * Usuarios
 */
Route::get('/admin/users','Usuarios\UsuarioController@index')->name('usuarios');
Route::get('/admin/users/create','Usuarios\UsuarioController@create')->name('usuarios.crear');
Route::post('/admin/users/store','Usuarios\UsuarioController@store')->name('usuarios.guardar');
Route::get('/admin/users/edit/{usuario}','Usuarios\UsuarioController@edit')->name('usuarios.editar');
Route::post('/admin/users/update/{usuario}','Usuarios\UsuarioController@update')->name('usuarios.actualizar');
Route::post('/admin/users/status','Usuarios\UsuarioController@changeStatus')->name('usuarios.estatus');

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
Route::get('/mantenimiento', 'Mantenimientos\MantenimientoController@index')->name('mantenimiento');
Route::get('/mantenimiento/insumos','Mantenimientos\MantenimientoController@insumos')->name('mantenimiento.insumo');
Route::get('/mantenimiento/proximos','Mantenimientos\MantenimientoController@proximos')->name('mantenimiento.proximos');
Route::get('/mantenimiento/estatus','Mantenimientos\MantenimientoController@estatus')->name('mantenimiento.estatus');

/* Mantenimiento */



// Vehiculos
Route::get('/vehiculos', 'Vehiculos\Vehiculoscontroller@index')->name('vehiculo');
Route::get('/vehiculos/create', 'Vehiculos\Vehiculoscontroller@create') ->name('vehiculo.crear');
Route::post('/vehiculos/store', 'Vehiculos\Vehiculoscontroller@store') ->name('vehiculo.guardar');
Route::get('/vehiculos/edit/{vehiculo}', 'Vehiculos\Vehiculoscontroller@edit') ->name('vehiculo.edit');
Route::post('/vehiculos/update/{vehiculo}', 'Vehiculos\Vehiculoscontroller@update')->name('vehiculo.update');
Route::post('/vehiculos/delete/', 'Vehiculos\Vehiculoscontroller@destroy')->name('vehiculo.delete');

//Registro de Actividades


Route::get('/registroactividad', 'registroactividad\RegistroActividadcontroller@index')->name('registroactividad');

Route::get('/about', function () {
    return view('about');
})->name('about');

/*
 * Reportes
 */
Route::get('/admin/reportes/','Reportes\ReporteController@index')->name('reporte.index');
Route::get('/admin/reportes/generate','Reportes\ReporteController@export')->name('reporte.export');
