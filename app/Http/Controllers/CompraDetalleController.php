<?php

namespace App\Http\Controllers;

use App\Models\CompraDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class CompraDetalleController
 * @package App\Http\Controllers
 */
class CompraDetalleController extends Controller
{

    public function getCompraDetalle(){
        return response()->json(CompraDetalle::all(),200);
    }

    public function getByCompraEncabezadoId($compraEncabezado){

        $compraEncabezado = CompraDetalle::findByCompraEncabezadoId($compraEncabezado);

        if(empty($compraEncabezado)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }

        return response($compraEncabezado, 200);
    }
   
    public function store(Request $request)
    {
        $validator0 = Validator::make($request->all(), [ 
            'insumoId' => 'required',
        ]);
 
        if($validator0->fails()){
            return response()->json(['Error'=>'El insumo no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'compraEncabezadoId' => 'required',
        ]);
 
        if($validator1->fails()){
            return response()->json(['Error'=>'La compra del encabezado no puede estar vacío.'], 203);
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

        if ($request->precio < 100|| $request->precio > 50000){
            return response()->json(['Error'=>'El precio tiene que estar entre 100 a 50,000.'], 203);
        }

        if ($request->cantidad < 0|| $request->cantidad > 999){
            return response()->json(['Error'=>'La cantidad excede lo permitido, debe estar entre 0 a 999.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $compraDetalle = CompraDetalle::create($request->all());

        return response($compraDetalle, 200);
    }

   
    public function show($id)
    {
        $compraDetalle = CompraDetalle::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($compraDetalle)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        return response($compraDetalle, 200);
    }

    public function update(Request $request, $id)
    {

        $compraDetalle = CompraDetalle::find($id);
        //Validaciones Busqueda
        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($compraDetalle)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [ 
            'insumoId' => 'required',
        ]);
 
        if($validator0->fails()){
            return response()->json(['Error'=>'El insumo no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'compraEncabezadoId' => 'required',
        ]);
 
        if($validator1->fails()){
            return response()->json(['Error'=>'La compra del encabezado no puede estar vacío.'], 203);
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

        if ($request->precio < 100|| $request->precio > 50000){
            return response()->json(['Error'=>'El precio tiene que estar entre 100 a 50,000.'], 203);
        }

        if ($request->cantidad < 0|| $request->cantidad > 999){
            return response()->json(['Error'=>'La cantidad excede lo permitido, debe estar entre 0 a 999.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }
    
        $compraDetalle->update($request->all());

        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
    }

    public function destroy($id)
    {
        $compraDetalle = CompraDetalle::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
