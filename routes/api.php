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