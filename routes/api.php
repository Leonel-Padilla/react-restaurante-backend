<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Tipo Documento
Route::get('TipoDocumento', 'App\Http\Controllers\TipoDocumentoController@getTipoDocumento');
Route::get('TipoDocumento/{id}', 'App\Http\Controllers\TipoDocumentoController@show');
Route::post('addTipoDocumento', 'App\Http\Controllers\TipoDocumentoController@store');
Route::put('updateTipoDocumento/{id}', 'App\Http\Controllers\TipoDocumentoController@update');
Route::delete('deleteTipoDocumento/{id}', 'App\Http\Controllers\TipoDocumentoController@destroy');

//Empleado
Route::get('Empleado', 'App\Http\Controllers\EmpleadoController@getEmpleado');
Route::get('Empleado/{id}', 'App\Http\Controllers\EmpleadoController@show');
Route::get('EmpleadoN/{nombreEmpleado}', 'App\Http\Controllers\EmpleadoController@getByEmpleadoNombre');
Route::get('EmpleadoU/{nombreEmpleado}', 'App\Http\Controllers\EmpleadoController@getByEmpleadoUsuario');
Route::get('EmpleadoND/{nombreEmpleado}', 'App\Http\Controllers\EmpleadoController@getByNumeroDocumento');
Route::post('addEmpleado', 'App\Http\Controllers\EmpleadoController@store');
Route::put('updateEmpleado/{id}', 'App\Http\Controllers\EmpleadoController@update');
Route::delete('deleteEmpleado/{id}', 'App\Http\Controllers\EmpleadoController@destroy');

//Proveedor
Route::get('Proveedor', 'App\Http\Controllers\ProveedoreController@getProveedor');
Route::get('Proveedor/{id}', 'App\Http\Controllers\ProveedoreController@show');
Route::get('ProveedorN/{nombreProveedor}', 'App\Http\Controllers\ProveedoreController@getByProveedorNombre');
Route::post('addProveedor', 'App\Http\Controllers\ProveedoreController@store');
Route::put('updateProveedor/{id}', 'App\Http\Controllers\ProveedoreController@update');
Route::delete('deleteProveedor/{id}', 'App\Http\Controllers\ProveedoreController@destroy');

//Cargo
Route::get('Cargo', 'App\Http\Controllers\CargoController@getCargo');
Route::get('Cargo/{id}', 'App\Http\Controllers\CargoController@show');
Route::get('CargoN/{nombreCargo}', 'App\Http\Controllers\CargoController@getByCargoNombre');
Route::post('addCargo', 'App\Http\Controllers\CargoController@store');
Route::put('updateCargo/{id}', 'App\Http\Controllers\CargoController@update');
Route::delete('deleteCargo/{id}', 'App\Http\Controllers\CargoController@destroy');

//Sucursal
Route::get('Sucursal', 'App\Http\Controllers\SucursaleController@getSucursal');
Route::get('Sucursal/{id}', 'App\Http\Controllers\SucursaleController@show');
Route::get('SucursalN/{sucursalNombre}', 'App\Http\Controllers\SucursaleController@getBySucursalNombre');
Route::post('addSucursal', 'App\Http\Controllers\SucursaleController@store');
Route::put('updateSucursal/{id}', 'App\Http\Controllers\SucursaleController@update');
Route::delete('deleteSucursal/{id}', 'App\Http\Controllers\SucursaleController@destroy');

//Cliente
Route::get('Cliente', 'App\Http\Controllers\ClienteController@getCliente');
Route::get('Cliente/{id}', 'App\Http\Controllers\ClienteController@show');
Route::get('ClienteN/{nombreCliente}', 'App\Http\Controllers\ClienteController@getByClienteNombre');
Route::post('addCliente', 'App\Http\Controllers\ClienteController@store');
Route::put('updateCliente/{id}', 'App\Http\Controllers\ClienteController@update');
Route::delete('deleteCliente/{id}', 'App\Http\Controllers\ClienteController@destroy');

//Mesa
Route::get('Mesa', 'App\Http\Controllers\MesaController@getMesa');
Route::get('Mesa/{id}', 'App\Http\Controllers\MesaController@show');
Route::get('MesaN/{sucursalId}', 'App\Http\Controllers\MesaController@getBySucursalId');
Route::post('addMesa', 'App\Http\Controllers\MesaController@store');
Route::put('updateMesa/{id}', 'App\Http\Controllers\MesaController@update');
Route::delete('deleteMesa/{id}', 'App\Http\Controllers\MesaController@destroy');

//Insumo
Route::get('Insumo', 'App\Http\Controllers\InsumoController@getInsumo');
Route::get('Insumo/{id}', 'App\Http\Controllers\InsumoController@show');
Route::get('InsumoN/{nombreInsumo}', 'App\Http\Controllers\InsumoController@getByInsumoNombre');
Route::get('InsumoP/{proveedorId}', 'App\Http\Controllers\InsumoController@getByProveedorId');
Route::post('addInsumo', 'App\Http\Controllers\InsumoController@store');
Route::put('updateInsumo/{id}', 'App\Http\Controllers\InsumoController@update');
Route::delete('deleteInsumo/{id}', 'App\Http\Controllers\InsumoController@destroy');

//Cargo Historial
Route::get('CargoHistorial', 'App\Http\Controllers\CargoHistorialController@getCargoHistorial');
Route::get('CargoHistorialE/{empleadoId}', 'App\Http\Controllers\CargoHistorialController@getByEmpleadoId');
Route::get('CargoHistorial/{id}', 'App\Http\Controllers\CargoHistorialController@show');
Route::post('addCargoHistorial', 'App\Http\Controllers\CargoHistorialController@store');
Route::put('updateCargoHistorial/{id}', 'App\Http\Controllers\CargoHistorialController@update');
Route::delete('deleteCargoHistorial/{id}', 'App\Http\Controllers\CargoHistorialController@destroy');

//Sueldo Historial
Route::get('SueldoHistorial', 'App\Http\Controllers\SueldoHistorialController@getSueldoHistorial');
Route::get('SueldoHistorialE/{empleadoId}', 'App\Http\Controllers\SueldoHistorialController@getByEmpleadoId');
Route::get('SueldoHistorial/{id}', 'App\Http\Controllers\SueldoHistorialController@show');
Route::post('addSueldoHistorial', 'App\Http\Controllers\SueldoHistorialController@store');
Route::put('updateSueldoHistorial/{id}', 'App\Http\Controllers\SueldoHistorialController@update');
Route::delete('deleteSueldoHistorial/{id}', 'App\Http\Controllers\SueldoHistorialController@destroy');

//Compra Encabezado
Route::get('CompraEncabezado', 'App\Http\Controllers\CompraEncabezadoController@getCompraEncabezado');
Route::get('CompraEncabezadoP/{proveedorId}', 'App\Http\Controllers\CompraEncabezadoController@getByProveedor');
Route::get('CompraEncabezadoE/{estadoCompra}', 'App\Http\Controllers\CompraEncabezadoController@getByEstadoCompra');
Route::get('CompraEncabezado/{id}', 'App\Http\Controllers\CompraEncabezadoController@show');
Route::post('addCompraEncabezado', 'App\Http\Controllers\CompraEncabezadoController@store');
Route::put('updateCompraEncabezado/{id}', 'App\Http\Controllers\CompraEncabezadoController@update');
Route::delete('deleteCompraEncabezado/{id}', 'App\Http\Controllers\CompraEncabezadoController@destroy');

//Compra Detalle
Route::get('CompraDetalle', 'App\Http\Controllers\CompraDetalleController@getCompraDetalle');
Route::get('CompraDetalleE/{compraEncabezadoId}', 'App\Http\Controllers\CompraDetalleController@getByCompraEncabezadoId');
Route::get('CompraDetalle/{id}', 'App\Http\Controllers\CompraDetalleController@show');
Route::post('addCompraDetalle', 'App\Http\Controllers\CompraDetalleController@store');
Route::put('updateCompraDetalle/{id}', 'App\Http\Controllers\CompraDetalleController@update');
Route::delete('deleteCompraDetalle/{id}', 'App\Http\Controllers\CompraDetalleController@destroy');

//Comentario
Route::get('Comentario', 'App\Http\Controllers\ComentarioController@getComentario');
Route::get('Comentario/{id}', 'App\Http\Controllers\ComentarioController@show');
Route::get('ComentarioS/{sucursalId}', 'App\Http\Controllers\ComentarioController@getBySucursalId');
Route::post('addComentario', 'App\Http\Controllers\ComentarioController@store');
Route::put('updateComentario/{id}', 'App\Http\Controllers\ComentarioController@update');
Route::delete('deleteComentario/{id}', 'App\Http\Controllers\ComentarioController@destroy');

//Producto
Route::get('Producto', 'App\Http\Controllers\ProductoController@getProducto');
Route::get('Producto/{id}', 'App\Http\Controllers\ProductoController@show');
Route::get('ProductoN/{productoNombre}', 'App\Http\Controllers\ProductoController@getByProductoNombre');
Route::post('addProducto', 'App\Http\Controllers\ProductoController@store');
Route::put('updateProducto/{id}', 'App\Http\Controllers\ProductoController@update');
Route::delete('deleteProducto/{id}', 'App\Http\Controllers\ProductoController@destroy');

//ProductoInsumo
Route::get('ProductoInsumo', 'App\Http\Controllers\ProductoInsumoController@getProductoInsumo');
Route::get('ProductoInsumo/{id}', 'App\Http\Controllers\ProductoInsumoController@show');
Route::get('ProductoInsumoI/{insumoId}', 'App\Http\Controllers\ProductoInsumoController@getByInsumoId');
Route::get('ProductoInsumoP/{productoId}', 'App\Http\Controllers\ProductoInsumoController@getByProductoId');
Route::post('addProductoInsumo', 'App\Http\Controllers\ProductoInsumoController@store');
Route::put('updateProductoInsumo/{id}', 'App\Http\Controllers\ProductoInsumoController@update');
Route::delete('deleteProductoInsumo/{id}', 'App\Http\Controllers\ProductoInsumoController@destroy');

