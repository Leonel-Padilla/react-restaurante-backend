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

Route::get('TipoDocumento', 'App\Http\Controllers\TipoDocumentoController@getTipoDocumento');
Route::get('TipoDocumento/{id}', 'App\Http\Controllers\TipoDocumentoController@show');
Route::get('TipoDocumentoND/{numeroDocumento}', 'App\Http\Controllers\TipoDocumentoController@getByNumeroDocumento');
Route::post('addTipoDocumento', 'App\Http\Controllers\TipoDocumentoController@store');
Route::put('updateTipoDocumento/{id}', 'App\Http\Controllers\TipoDocumentoController@update');
Route::delete('deleteTipoDocumento/{id}', 'App\Http\Controllers\TipoDocumentoController@destroy');

Route::get('Empleado', 'App\Http\Controllers\EmpleadoController@getEmpleado');
Route::get('Empleado/{id}', 'App\Http\Controllers\EmpleadoController@show');
Route::get('EmpleadoN/{nombreEmpleado}', 'App\Http\Controllers\EmpleadoController@getByEmpleadoNombre');
Route::post('addEmpleado', 'App\Http\Controllers\EmpleadoController@store');
Route::put('updateEmpleado/{id}', 'App\Http\Controllers\EmpleadoController@update');
Route::delete('deleteEmpleado/{id}', 'App\Http\Controllers\EmpleadoController@destroy');

Route::get('Proveedor', 'App\Http\Controllers\ProveedoreController@getProveedor');
Route::get('Proveedor/{id}', 'App\Http\Controllers\ProveedoreController@show');
Route::get('ProveedorN/{nombreProveedor}', 'App\Http\Controllers\ProveedoreController@getByProveedorNombre');
Route::post('addProveedor', 'App\Http\Controllers\ProveedoreController@store');
Route::put('updateProveedor/{id}', 'App\Http\Controllers\ProveedoreController@update');
Route::delete('deleteProveedor/{id}', 'App\Http\Controllers\ProveedoreController@destroy');

Route::get('Cargo', 'App\Http\Controllers\CargoController@getCargo');
Route::get('Cargo/{id}', 'App\Http\Controllers\CargoController@show');
Route::get('CargoN/{nombreCargo}', 'App\Http\Controllers\CargoController@getByCargoNombre');
Route::post('addCargo', 'App\Http\Controllers\CargoController@store');
Route::put('updateCargo/{id}', 'App\Http\Controllers\CargoController@update');
Route::delete('deleteCargo/{id}', 'App\Http\Controllers\CargoController@destroy');