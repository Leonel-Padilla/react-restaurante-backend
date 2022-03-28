<?php

namespace App\Http\Controllers;

use App\Models\ProductoInsumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class ProductoInsumoController
 * @package App\Http\Controllers
 */
class ProductoInsumoController extends Controller{

    public function getProductoInsumo(){
        return response()->json(ProductoInsumo::all(),200);
    }

    public function getByInsumoId($insumoId){


        $ProductoInsumo = ProductoInsumo::findByInsumoId($insumoId);

        if(empty($ProductoInsumo)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
        return response($ProductoInsumo, 200);
    }

    public function getByProductoId($productoNombre){


        $ProductoInsumo = ProductoInsumo::findByProductoId($productoId);

        if(empty($ProductoInsumo)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
        return response($ProductoInsumo, 200);
    }

    public function store(Request $request)
    {
        $validator0 = Validator::make($request->all(), [ 
            'insumoId' => 'required',
        ]);
 
        if($validator0->fails()){
            return response()->json(['Error'=>'El insumo Id no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'productoId' => 'required',
        ]);
 
        if($validator1->fails()){
            return response()->json(['Error'=>'El producto Id no puede estar vacío.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'cantidad' => 'required',
        ]);
 
        if($validator2->fails()){
            return response()->json(['Error'=>'La cantidad no puede estar vacía.'], 203);
        }

        if ($request->cantidad > 999|| $request->estado < 1){
            return response()->json(['Error'=>'La cantidad solo puede estar entre 0 y 999.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        
        $productoInsumo = ProductoInsumo::create($request->all());

        return response($productoInsumo, 200);

    }

    public function show($id)
    {
        $productoInsumo = ProductoInsumo::find($id);
        
        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero.'], 203);
        }

        if  (is_null($productoInsumo)){
            return response()->json(['Error'=>'No existe este registro.'], 203);
        }

        return response($productoInsumo, 200); 
    }


    public function update(Request $request, $id){

        $productoInsumo = ProductoInsumo::find($id);
        
        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero.'], 203);
        }

        if  (is_null($productoInsumo)){
            return response()->json(['Error'=>'No existe este registro.'], 203);
        }

        $validator0 = Validator::make($request->all(), [ 
            'insumoId' => 'required',
        ]);
 
        if($validator0->fails()){
            return response()->json(['Error'=>'El insumo Id no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'productoId' => 'required',
        ]);
 
        if($validator1->fails()){
            return response()->json(['Error'=>'El producto Id no puede estar vacío.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'cantidad' => 'required',
        ]);
 
        if($validator2->fails()){
            return response()->json(['Error'=>'La cantidad no puede estar vacía.'], 203);
        }

        if ($request->cantidad > 999|| $request->estado < 1){
            return response()->json(['Error'=>'La cantidad solo puede estar entre 0 y 999.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $productoInsumo->update($request->all());

        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);

    }


    public function destroy($id)
    {
        $productoInsumo = ProductoInsumo::find($id)->delete();
        
        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
