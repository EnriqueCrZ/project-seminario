<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('home');
})->middleware('auth');*/

Auth::routes(['register' => false]);

/*
 * Usuarios
 */
Route::get('/admin/users','Usuarios\UsuarioController@index')->name('usuarios')->middleware('admin');
Route::get('/admin/users/create','Usuarios\UsuarioController@create')->name('usuarios.crear')->middleware('admin');
Route::post('/admin/users/store','Usuarios\UsuarioController@store')->name('usuarios.guardar')->middleware('admin');
Route::get('/admin/users/edit/{usuario}','Usuarios\UsuarioController@edit')->name('usuarios.editar')->middleware('admin');
Route::post('/admin/users/update/{usuario}','Usuarios\UsuarioController@update')->name('usuarios.actualizar')->middleware('admin');
Route::post('/admin/users/status','Usuarios\UsuarioController@changeStatus')->name('usuarios.estatus')->middleware('admin');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');
/* Proveedor */
Route::get('/proveedores', 'Proveedores\ProveedorController@index')->name('proveedor')->middleware('control');
Route::get('/proveedores/create', 'Proveedores\ProveedorController@create')->name('proveedor.crear')->middleware('control');
Route::post('/proveedores/store', 'Proveedores\ProveedorController@save')->name('proveedor.store')->middleware('control');

Route::get('/proveedores/edit/{proveedor}', 'Proveedores\ProveedorController@edit')->name('proveedor.edit')->middleware('control');
Route::post('/proveedores/update/{proveedor}', 'Proveedores\ProveedorController@update')->name('proveedor.update')->middleware('control');
Route::post('/proveedores/delete/', 'Proveedores\ProveedorController@destroy')->name('proveedor.delete')->middleware('control');
/* Proveedor */

/* Inventario */
Route::get('/inventario', 'Inventario\InventarioController@index')->name('inventario')->middleware('inventory');
Route::get('/inventario/create', 'Inventario\InventarioController@create')->name('inventario.crear')->middleware('inventory');
Route::post('/inventario/store', 'Inventario\InventarioController@save')->name('inventario.store')->middleware('inventory');

Route::get('/inventario/edit/{inventory}', 'Inventario\InventarioController@edit')->name('inventario.edit')->middleware('inventory');
Route::post('/inventario/update/{inventory}', 'Inventario\InventarioController@update')->name('inventario.update')->middleware('inventory');
Route::post('/inventario/delete/', 'Inventario\InventarioController@destroy')->name('inventario.delete')->middleware('inventory');
/* Inventario */

/* Piloto */
Route::get('/piloto', 'Pilotos\PilotoController@index')->name('piloto')->middleware('control');
Route::get('/piloto/create', 'Pilotos\PilotoController@create')->name('piloto.crear')->middleware('control');
Route::post('/piloto/store', 'Pilotos\PilotoController@save')->name('piloto.store')->middleware('control');

Route::get('/piloto/edit/{pilot}', 'Pilotos\PilotoController@edit')->name('piloto.edit')->middleware('control');
Route::post('/piloto/update/{pilot}', 'Pilotos\PilotoController@update')->name('piloto.update')->middleware('control');
Route::post('/piloto/delete/', 'Pilotos\PilotoControllers@destroy')->name('piloto.delete')->middleware('control');
/* Piloto */

/* Ubicacion */
Route::get('/ubicacion', 'Ubicacion\UbicacionController@index')->name('ubicacion')->middleware('control');
Route::get('/ubicacion/create', 'Ubicacion\UbicacionController@create')->name('ubicacion.crear')->middleware('control');
Route::post('/ubicacion/store', 'Ubicacion\UbicacionController@save')->name('ubicacion.store')->middleware('control');

Route::get('/ubicacion/edit/{location}', 'Ubicacion\UbicacionController@edit')->name('ubicacion.edit')->middleware('control');
Route::post('/ubicacion/update/{location}', 'Ubicacion\UbicacionController@update')->name('ubicacion.update')->middleware('control');
Route::post('/ubicacion/delete/', 'Ubicacion\UbicacionControllers@destroy')->name('ubicacion.delete')->middleware('control');
/* Ubicacion */

/* Mantenimiento */
Route::get('/mantenimiento', 'Mantenimientos\MantenimientoController@index')->name('mantenimiento')->middleware('mante');
Route::get('/mantenimiento/insumos','Mantenimientos\MantenimientoController@insumos')->name('mantenimiento.insumo')->middleware('mante');
Route::get('/mantenimiento/proximos','Mantenimientos\MantenimientoController@proximos')->name('mantenimiento.proximos')->middleware('mante');
Route::get('/mantenimiento/estatus','Mantenimientos\MantenimientoController@estatus')->name('mantenimiento.estatus')->middleware('mante');

Route::post('/mantenimiento/modal/','Mantenimientos\MantenimientoController@returnModalMantenimiento')->name('modal.mantenimiento')->middleware('mante');
Route::post('/mantenimiento/modal/programar','Mantenimientos\MantenimientoController@returnModalMantenimientoProgramar')->name('modal.mantenimientoProgramar')->middleware('mante');
Route::post('/mantenimiento/modal/producto','Mantenimientos\MantenimientoController@returnModalMantenimientoProducto')->name('modal.mantenimientoProducto')->middleware('mante');
Route::post('/mantenimiento/modal/retirar','Mantenimientos\MantenimientoController@returnModalMantenimientoRetirar')->name('modal.mantenimientoRetirar')->middleware('mante');

Route::post('/mantenimiento/modal/save','Mantenimientos\MantenimientoController@saveMantenimiento')->name('mantenimiento.guardar');
Route::post('/admin/mantenimiento/status','Mantenimientos\MantenimientoController@changeStatus')->name('mantenimiento.status.change');
/* Mantenimiento */



// Vehiculos
Route::get('/vehiculos', 'Vehiculos\Vehiculoscontroller@index')->name('vehiculo')->middleware('control');
Route::get('/vehiculos/create', 'Vehiculos\Vehiculoscontroller@create') ->name('vehiculo.crear')->middleware('control');
Route::post('/vehiculos/store', 'Vehiculos\Vehiculoscontroller@store') ->name('vehiculo.guardar')->middleware('control');
Route::get('/vehiculos/edit/{vehiculo}', 'Vehiculos\Vehiculoscontroller@edit') ->name('vehiculo.edit')->middleware('control');
Route::post('/vehiculos/update/{vehiculo}', 'Vehiculos\Vehiculoscontroller@update')->name('vehiculo.update')->middleware('control');
Route::post('/vehiculos/delete/', 'Vehiculos\Vehiculoscontroller@destroy')->name('vehiculo.delete')->middleware('control');

//Registro de Actividades



Route::get('/registroactividad', 'RegistroActividad\RegistroActividadcontroller@index')->name('registroactividad')->middleware('control');
Route::get('/registroactividad/create', 'RegistroActividad\RegistroActividadcontroller@create')->name('registroactividad.crear')->middleware('control');
Route::post('/registroactividad/store', 'RegistroActividad\RegistroActividadcontroller@store')->name('registroactividad.guardar')->middleware('control');
Route::get('/registroactividad/edit', 'RegistroActividad\RegistroActividadcontroller@edit') ->name('registroactividad.edit')->middleware('control');
Route::post('/admin/registroactividad/status','RegistroActividad\RegistroActividadcontroller@changeStatus')->name('actividad.estatus')->middleware('control');

Route::get('/about', function () {
    return view('about');
})->name('about');

/*
 * Reportes
 */
Route::get('/admin/reportes/','Reportes\ReporteController@index')->name('reporte.index')->middleware('admin');
Route::get('/admin/reportes/generate','Reportes\ReporteController@export')->name('reporte.export')->middleware('admin');
