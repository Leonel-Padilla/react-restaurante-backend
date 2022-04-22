<?php

namespace App\Http\Controllers;

use App\Models\OrdenDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class OrdenDetalleController
 * @package App\Http\Controllers
 */
class OrdenDetalleController extends Controller
{
    public function getOrdenDetalle(){
        return response()->json(OrdenDetalle::all(),200);
    }

    public function getByOrdenEncabezadoId($ordenEncabezado){

        $ordenEncabezado = OrdenDetalle::findByOrdenEncabezadoId($ordenEncabezado);

        if(empty($ordenEncabezado)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }

        return response($ordenEncabezado, 200);
    }

    public function store(Request $request)
    {
        $validator0 = Validator::make($request->all(), [ 
            'ordenEncabezadoId' => 'required',
        ]);
 
        if($validator0->fails()){
            return response()->json(['Error'=>'El encabezado de la orden no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'productoId' => 'required',
        ]);
 
        if($validator1->fails()){
            return response()->json(['Error'=>'El producto no puede estar vacío.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'precio' => 'required',
        ]);
 
        if($validator2->fails()){
            return response()->json(['Error'=>'El precio no puede estar vacío.'], 203);
        }
        
        $validator3 = Validator::make($request->all(), [ 
            'cantidad' => 'required',
        ]);
 
        if($validator3->fails()){
            return response()->json(['Error'=>'La cantidad no puede estar vacía.'], 203);
        }

        $validator4 = Validator::make($request->all(), [ 
            'descuentoProducto' => 'required',
        ]);
 
        if($validator4->fails()){
            return response()->json(['Error'=>'El descuento no puede estar vacío.'], 203);
        }

        $validator5 = Validator::make($request->all(), [ 
            'impuestoProducto' => 'required',
        ]);
 
        if($validator4->fails()){
            return response()->json(['Error'=>'El impuesto no puede estar vacío.'], 203);
        }

        if ($request->descuentoProducto < 0 || $request->descuentoProducto > 100){
            return response()->json(['Error'=>'El descuento tiene que estar entre 0 y 100.'], 203);
        }

        if ($request->impuestoProducto < 0 || $request->impuestoProducto > 100){
            return response()->json(['Error'=>'El impuesto tiene que estar entre 0 y 100.'], 203);
        }

        if ($request->precio < 1 || $request->precio > 50000){
            return response()->json(['Error'=>'El precio tiene que estar entre 1 a 50,000.'], 203);
        }

        if ($request->cantidad < 1|| $request->cantidad > 999){
            return response()->json(['Error'=>'La cantidad excede lo permitido, debe estar entre 1 a 999.'], 203);
        }

        if ($request->estado > 1 || $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $ordenDetalle = OrdenDetalle::create($request->all());

        return response($ordenDetalle, 200);
    }

    public function show($id)
    {
        $ordenDetalle = OrdenDetalle::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($ordenDetalle)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        return response($ordenDetalle, 200);
    }

    public function update(Request $request, $id)
    {
        $ordenDetalle = OrdenDetalle::find($id);
        //Validaciones Busqueda
        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($ordenDetalle)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [ 
            'ordenEncabezadoId' => 'required',
        ]);
 
        if($validator0->fails()){
            return response()->json(['Error'=>'El encabezado de la orden no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'productoId' => 'required',
        ]);
 
        if($validator1->fails()){
            return response()->json(['Error'=>'El producto no puede estar vacío.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'precio' => 'required',
        ]);
 
        if($validator2->fails()){
            return response()->json(['Error'=>'El precio no puede estar vacío.'], 203);
        }
        
        $validator3 = Validator::make($request->all(), [ 
            'cantidad' => 'required',
        ]);
 
        if($validator3->fails()){
            return response()->json(['Error'=>'La cantidad no puede estar vacía.'], 203);
        }

        $validator4 = Validator::make($request->all(), [ 
            'descuentoProducto' => 'required',
        ]);
 
        if($validator4->fails()){
            return response()->json(['Error'=>'El descuento no puede estar vacío.'], 203);
        }

        $validator5 = Validator::make($request->all(), [ 
            'impuestoProducto' => 'required',
        ]);
 
        if($validator4->fails()){
            return response()->json(['Error'=>'El impuesto no puede estar vacío.'], 203);
        }

        if ($request->descuentoProducto < 0 || $request->descuentoProducto > 100){
            return response()->json(['Error'=>'El descuento tiene que estar entre 0 y 100.'], 203);
        }

        if ($request->impuestoProducto < 0 || $request->impuestoProducto > 100){
            return response()->json(['Error'=>'El impuesto tiene que estar entre 0 y 100.'], 203);
        }

        if ($request->precio < 1 || $request->precio > 50000){
            return response()->json(['Error'=>'El precio tiene que estar entre 1 a 50,000.'], 203);
        }

        if ($request->cantidad < 1|| $request->cantidad > 999){
            return response()->json(['Error'=>'La cantidad excede lo permitido, debe estar entre 1 a 999.'], 203);
        }

        if ($request->estado > 1 || $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $ordenDetalle->update($request->all());

        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
    }

    public function destroy($id)
    {
        $ordenDetalle = OrdenDetalle::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
