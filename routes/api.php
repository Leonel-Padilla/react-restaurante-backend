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

//Cargo
Route::get('Cargo', 'App\Http\Controllers\CargoController@getCargo');
Route::get('Cargo/{id}', 'App\Http\Controllers\CargoController@show');
Route::get('CargoN/{nombreCargo}', 'App\Http\Controllers\CargoController@getByCargoNombre');
Route::post('addCargo', 'App\Http\Controllers\CargoController@store');
Route::put('updateCargo/{id}', 'App\Http\Controllers\CargoController@update');
Route::delete('deleteCargo/{id}', 'App\Http\Controllers\CargoController@destroy');

//Cargo Historial
Route::get('CargoHistorial', 'App\Http\Controllers\CargoHistorialController@getCargoHistorial');
Route::get('CargoHistorialE/{empleadoId}', 'App\Http\Controllers\CargoHistorialController@getByEmpleadoId');
Route::get('CargoHistorial/{id}', 'App\Http\Controllers\CargoHistorialController@show');
Route::post('addCargoHistorial', 'App\Http\Controllers\CargoHistorialController@store');
Route::put('updateCargoHistorial/{id}', 'App\Http\Controllers\CargoHistorialController@update');
Route::delete('deleteCargoHistorial/{id}', 'App\Http\Controllers\CargoHistorialController@destroy');

//Cliente
Route::get('Cliente', 'App\Http\Controllers\ClienteController@getCliente');
Route::get('Cliente/{id}', 'App\Http\Controllers\ClienteController@show');
Route::get('ClienteN/{nombreCliente}', 'App\Http\Controllers\ClienteController@getByClienteNombre');
Route::post('addCliente', 'App\Http\Controllers\ClienteController@store');
Route::put('updateCliente/{id}', 'App\Http\Controllers\ClienteController@update');
Route::delete('deleteCliente/{id}', 'App\Http\Controllers\ClienteController@destroy');

//Comentario
Route::get('Comentario', 'App\Http\Controllers\ComentarioController@getComentario');
Route::get('Comentario/{id}', 'App\Http\Controllers\ComentarioController@show');
Route::get('ComentarioS/{sucursalId}', 'App\Http\Controllers\ComentarioController@getBySucursalId');
Route::post('addComentario', 'App\Http\Controllers\ComentarioController@store');
Route::put('updateComentario/{id}', 'App\Http\Controllers\ComentarioController@update');
Route::delete('deleteComentario/{id}', 'App\Http\Controllers\ComentarioController@destroy');

//Compra Detalle
Route::get('CompraDetalle', 'App\Http\Controllers\CompraDetalleController@getCompraDetalle');
Route::get('CompraDetalleE/{compraEncabezadoId}', 'App\Http\Controllers\CompraDetalleController@getByCompraEncabezadoId');
Route::get('CompraDetalle/{id}', 'App\Http\Controllers\CompraDetalleController@show');
Route::post('addCompraDetalle', 'App\Http\Controllers\CompraDetalleController@store');
Route::put('updateCompraDetalle/{id}', 'App\Http\Controllers\CompraDetalleController@update');
Route::delete('deleteCompraDetalle/{id}', 'App\Http\Controllers\CompraDetalleController@destroy');

//Compra Encabezado
Route::get('CompraEncabezado', 'App\Http\Controllers\CompraEncabezadoController@getCompraEncabezado');
Route::get('CompraEncabezadoP/{proveedorId}', 'App\Http\Controllers\CompraEncabezadoController@getByProveedor');
Route::get('CompraEncabezadoE/{estadoCompra}', 'App\Http\Controllers\CompraEncabezadoController@getByEstadoCompra');
Route::get('CompraEncabezado/{id}', 'App\Http\Controllers\CompraEncabezadoController@show');
Route::post('addCompraEncabezado', 'App\Http\Controllers\CompraEncabezadoController@store');
Route::put('updateCompraEncabezado/{id}', 'App\Http\Controllers\CompraEncabezadoController@update');
Route::delete('deleteCompraEncabezado/{id}', 'App\Http\Controllers\CompraEncabezadoController@destroy');

//Delivery
Route::get('Delivery', 'App\Http\Controllers\DeliveryController@getDelivery');
Route::get('Delivery/{id}', 'App\Http\Controllers\DeliveryController@show');
Route::get('DeliveryC/{clienteId}', 'App\Http\Controllers\DeliveryController@getByCliente');
Route::post('addDelivery', 'App\Http\Controllers\DeliveryController@store');
Route::put('updateDelivery/{id}', 'App\Http\Controllers\DeliveryController@update');
Route::delete('deleteDelivery/{id}', 'App\Http\Controllers\DeliveryController@destroy');

//Empleado
Route::get('Empleado', 'App\Http\Controllers\EmpleadoController@getEmpleado');
Route::get('Empleado/{id}', 'App\Http\Controllers\EmpleadoController@show');
Route::get('EmpleadoN/{nombreEmpleado}', 'App\Http\Controllers\EmpleadoController@getByEmpleadoNombre');
Route::get('EmpleadoU/{nombreEmpleado}', 'App\Http\Controllers\EmpleadoController@getByEmpleadoUsuario');
Route::get('EmpleadoND/{nombreEmpleado}', 'App\Http\Controllers\EmpleadoController@getByNumeroDocumento');
Route::post('addEmpleado', 'App\Http\Controllers\EmpleadoController@store');
Route::put('updateEmpleado/{id}', 'App\Http\Controllers\EmpleadoController@update');
Route::delete('deleteEmpleado/{id}', 'App\Http\Controllers\EmpleadoController@destroy');

//Factura
Route::get('Factura', 'App\Http\Controllers\FacturaController@getFactura');
Route::get('Factura/{id}', 'App\Http\Controllers\FacturaController@show');
Route::get('FacturaE/{empleadoCajeroId}', 'App\Http\Controllers\FacturaController@getByEmpleadoCajeroId');
Route::post('addFactura', 'App\Http\Controllers\FacturaController@store');
Route::put('updateFactura/{id}', 'App\Http\Controllers\FacturaController@update');
Route::delete('deleteFactura/{id}', 'App\Http\Controllers\FacturaController@destroy');

//Forma Pago
Route::get('FormaPago', 'App\Http\Controllers\FormaPagoController@getFormaPago');
Route::get('FormaPago/{id}', 'App\Http\Controllers\FormaPagoController@show');
Route::post('addFormaPago', 'App\Http\Controllers\FormaPagoController@store');
Route::put('updateFormaPago/{id}', 'App\Http\Controllers\FormaPagoController@update');
Route::delete('deleteFormaPago/{id}', 'App\Http\Controllers\FormaPagoController@destroy');

//Impuesto
Route::get('Impuesto', 'App\Http\Controllers\ImpuestoController@getImpuesto');
Route::get('Impuesto/{id}', 'App\Http\Controllers\ImpuestoController@show');
Route::post('addImpuesto', 'App\Http\Controllers\ImpuestoController@store');
Route::put('updateImpuesto/{id}', 'App\Http\Controllers\ImpuestoController@update');
Route::delete('deleteImpuesto/{id}', 'App\Http\Controllers\ImpuestoController@destroy');

//Impuesto Historial
Route::get('ImpuestoHistorial', 'App\Http\Controllers\ImpuestoHistorialController@getImpuestoHistorial');
Route::get('ImpuestoHistorialI/{impuestoId}', 'App\Http\Controllers\ImpuestoHistorialController@getByImpuestoId');
Route::get('ImpuestoHistorial/{id}', 'App\Http\Controllers\ImpuestoHistorialController@show');
Route::post('addImpuestoHistorial', 'App\Http\Controllers\ImpuestoHistorialController@store');
Route::put('updateImpuestoHistorial/{id}', 'App\Http\Controllers\ImpuestoHistorialController@update');
Route::delete('deleteImpuestoHistorial/{id}', 'App\Http\Controllers\ImpuestoHistorialController@destroy');

//Insumo
Route::get('Insumo', 'App\Http\Controllers\InsumoController@getInsumo');
Route::get('Insumo/{id}', 'App\Http\Controllers\InsumoController@show');
Route::get('InsumoN/{nombreInsumo}', 'App\Http\Controllers\InsumoController@getByInsumoNombre');
Route::get('InsumoP/{proveedorId}', 'App\Http\Controllers\InsumoController@getByProveedorId');
Route::post('addInsumo', 'App\Http\Controllers\InsumoController@store');
Route::put('updateInsumo/{id}', 'App\Http\Controllers\InsumoController@update');
Route::delete('deleteInsumo/{id}', 'App\Http\Controllers\InsumoController@destroy');

//Mesa
Route::get('Mesa', 'App\Http\Controllers\MesaController@getMesa');
Route::get('Mesa/{id}', 'App\Http\Controllers\MesaController@show');
Route::get('MesaN/{sucursalId}', 'App\Http\Controllers\MesaController@getBySucursalId');
Route::post('addMesa', 'App\Http\Controllers\MesaController@store');
Route::put('updateMesa/{id}', 'App\Http\Controllers\MesaController@update');
Route::delete('deleteMesa/{id}', 'App\Http\Controllers\MesaController@destroy');

//Orden Encabezado
Route::get('OrdenEncabezado', 'App\Http\Controllers\OrdenEncabezadoController@getOrdenEncabezado');
Route::get('OrdenEncabezadoC/{clienteId}', 'App\Http\Controllers\OrdenEncabezadoController@getByClienteId');
Route::get('OrdenEncabezadoM/{empleadoId}', 'App\Http\Controllers\OrdenEncabezadoController@getByEmpleadoMeseroId');
Route::get('OrdenEncabezadoCO/{empleadoId}', 'App\Http\Controllers\OrdenEncabezadoController@getByEmpleadoCocinaId');
Route::get('OrdenEncabezadoE/{tipoEntregaId}', 'App\Http\Controllers\OrdenEncabezadoController@getByTipoEntregaId');
Route::get('OrdenEncabezado/{id}', 'App\Http\Controllers\OrdenEncabezadoController@show');
Route::post('addOrdenEncabezado', 'App\Http\Controllers\OrdenEncabezadoController@store');
Route::put('updateOrdenEncabezado/{id}', 'App\Http\Controllers\OrdenEncabezadoController@update');
Route::delete('deleteOrdenEncabezado/{id}', 'App\Http\Controllers\OrdenEncabezadoController@destroy');

//Orden Detalle
Route::get('OrdenDetalle', 'App\Http\Controllers\OrdenDetalleController@getOrdenDetalle');
Route::get('OrdenDetalleE/{compraEncabezadoId}', 'App\Http\Controllers\OrdenDetalleController@getByOrdenEncabezadoId');
Route::get('OrdenDetalle/{id}', 'App\Http\Controllers\OrdenDetalleController@show');
Route::post('addOrdenDetalle', 'App\Http\Controllers\OrdenDetalleController@store');
Route::put('updateOrdenDetalle/{id}', 'App\Http\Controllers\OrdenDetalleController@update');
Route::delete('deleteOrdenDetalle/{id}', 'App\Http\Controllers\OrdenDetalleController@destroy');

//Parametros Factura
Route::get('ParametrosFactura', 'App\Http\Controllers\ParametrosFacturaController@getParametrosFactura');
Route::get('ParametrosFactura/{id}', 'App\Http\Controllers\ParametrosFacturaController@show');
Route::get('ParametrosFacturaI/{sucursalId}', 'App\Http\Controllers\ParametrosFacturaController@getBySucursal');
Route::post('addParametrosFactura', 'App\Http\Controllers\ParametrosFacturaController@store');
Route::put('updateParametrosFactura/{id}', 'App\Http\Controllers\ParametrosFacturaController@update');
Route::delete('deleteParametrosFactura/{id}', 'App\Http\Controllers\ParametrosFacturaController@destroy');

//Producto
Route::get('Producto', 'App\Http\Controllers\ProductoController@getProducto');
Route::get('Producto/{id}', 'App\Http\Controllers\ProductoController@show');
Route::get('ProductoN/{productoNombre}', 'App\Http\Controllers\ProductoController@getByProductoNombre');
Route::post('addProducto', 'App\Http\Controllers\ProductoController@store');
Route::put('updateProducto/{id}', 'App\Http\Controllers\ProductoController@update');
Route::delete('deleteProducto/{id}', 'App\Http\Controllers\ProductoController@destroy');

//Producto Insumo
Route::get('ProductoInsumo', 'App\Http\Controllers\ProductoInsumoController@getProductoInsumo');
Route::get('ProductoInsumo/{id}', 'App\Http\Controllers\ProductoInsumoController@show');
Route::get('ProductoInsumoI/{insumoId}', 'App\Http\Controllers\ProductoInsumoController@getByInsumoId');
Route::get('ProductoInsumoP/{productoId}', 'App\Http\Controllers\ProductoInsumoController@getByProductoId');
Route::post('addProductoInsumo', 'App\Http\Controllers\ProductoInsumoController@store');
Route::put('updateProductoInsumo/{id}', 'App\Http\Controllers\ProductoInsumoController@update');
Route::delete('deleteProductoInsumo/{id}', 'App\Http\Controllers\ProductoInsumoController@destroy');

//Producto Historial
Route::get('ProductoHistorial', 'App\Http\Controllers\ProductoHistorialController@getProductoHistorial');
Route::get('ProductoHistorialP/{productoId}', 'App\Http\Controllers\ProductoHistorialController@getByProductoId');
Route::get('ProductoHistorial/{id}', 'App\Http\Controllers\ProductoHistorialController@show');
Route::post('addProductoHistorial', 'App\Http\Controllers\ProductoHistorialController@store');
Route::put('updateProductoHistorial/{id}', 'App\Http\Controllers\ProductoHistorialController@update');
Route::delete('deleteProductoHistorial/{id}', 'App\Http\Controllers\ProductoHistorialController@destroy');

//Proveedor
Route::get('Proveedor', 'App\Http\Controllers\ProveedoreController@getProveedor');
Route::get('Proveedor/{id}', 'App\Http\Controllers\ProveedoreController@show');
Route::get('ProveedorN/{nombreProveedor}', 'App\Http\Controllers\ProveedoreController@getByProveedorNombre');
Route::post('addProveedor', 'App\Http\Controllers\ProveedoreController@store');
Route::put('updateProveedor/{id}', 'App\Http\Controllers\ProveedoreController@update');
Route::delete('deleteProveedor/{id}', 'App\Http\Controllers\ProveedoreController@destroy');

//Reservacion
Route::get('Reservacion', 'App\Http\Controllers\ReservacioneController@getReservacion');
Route::get('Reservacion/{id}', 'App\Http\Controllers\ReservacioneController@show');
Route::get('ReservacionC/{clienteId}', 'App\Http\Controllers\ReservacioneController@getByCliente');
Route::post('addReservacion', 'App\Http\Controllers\ReservacioneController@store');
Route::put('updateReservacion/{id}', 'App\Http\Controllers\ReservacioneController@update');
Route::delete('deleteReservacion/{id}', 'App\Http\Controllers\ReservacioneController@destroy');

//Reservacion Mesa
Route::get('ReservacionMesa', 'App\Http\Controllers\ReservacionMesaController@getReservacionMesa');
Route::get('ReservacionMesa/{id}', 'App\Http\Controllers\ReservacionMesaController@show');
Route::get('ReservacionMesaR/{reservacionId}', 'App\Http\Controllers\ReservacionMesaController@getByReservacionId');
Route::get('ReservacionMesaM/{mesaId}', 'App\Http\Controllers\ReservacionMesaController@getByMesaId');
Route::post('addReservacionMesa', 'App\Http\Controllers\ReservacionMesaController@store');
Route::put('updateReservacionMesa/{id}', 'App\Http\Controllers\ReservacionMesaController@update');
Route::delete('deleteReservacionMesa/{id}', 'App\Http\Controllers\ReservacionMesaController@destroy');

//Sucursal
Route::get('Sucursal', 'App\Http\Controllers\SucursaleController@getSucursal');
Route::get('Sucursal/{id}', 'App\Http\Controllers\SucursaleController@show');
Route::get('SucursalN/{sucursalNombre}', 'App\Http\Controllers\SucursaleController@getBySucursalNombre');
Route::post('addSucursal', 'App\Http\Controllers\SucursaleController@store');
Route::put('updateSucursal/{id}', 'App\Http\Controllers\SucursaleController@update');
Route::delete('deleteSucursal/{id}', 'App\Http\Controllers\SucursaleController@destroy');

//Sueldo Historial
Route::get('SueldoHistorial', 'App\Http\Controllers\SueldoHistorialController@getSueldoHistorial');
Route::get('SueldoHistorialE/{empleadoId}', 'App\Http\Controllers\SueldoHistorialController@getByEmpleadoId');
Route::get('SueldoHistorial/{id}', 'App\Http\Controllers\SueldoHistorialController@show');
Route::post('addSueldoHistorial', 'App\Http\Controllers\SueldoHistorialController@store');
Route::put('updateSueldoHistorial/{id}', 'App\Http\Controllers\SueldoHistorialController@update');
Route::delete('deleteSueldoHistorial/{id}', 'App\Http\Controllers\SueldoHistorialController@destroy');

//Tipo Documento
Route::get('TipoDocumento', 'App\Http\Controllers\TipoDocumentoController@getTipoDocumento');
Route::get('TipoDocumento/{id}', 'App\Http\Controllers\TipoDocumentoController@show');
Route::post('addTipoDocumento', 'App\Http\Controllers\TipoDocumentoController@store');
Route::put('updateTipoDocumento/{id}', 'App\Http\Controllers\TipoDocumentoController@update');
Route::delete('deleteTipoDocumento/{id}', 'App\Http\Controllers\TipoDocumentoController@destroy');

//Tipo Entrega
Route::get('TipoEntrega', 'App\Http\Controllers\TipoEntregaController@getTipoEntrega');
Route::get('TipoEntrega/{id}', 'App\Http\Controllers\TipoEntregaController@show');
Route::post('addTipoEntrega', 'App\Http\Controllers\TipoEntregaController@store');
Route::put('updateTipoEntrega/{id}', 'App\Http\Controllers\TipoEntregaController@update');
Route::delete('deleteTipoEntrega/{id}', 'App\Http\Controllers\TipoEntregaController@destroy');