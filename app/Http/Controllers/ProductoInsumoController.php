<?php

namespace App\Http\Controllers;

use App\Models\ProductoInsumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Class ProductoInsumoController
 * @package App\Http\Controllers
 */
class ProductoInsumoController extends Controller{

    public function getProductoInsumo(){
        try{
            return response()->json(ProductoInsumo::all(),200);
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("productoinsumo")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function getByInsumoId($insumoId){
        try{

        $ProductoInsumo = ProductoInsumo::findByInsumoId($insumoId);

        if(empty($ProductoInsumo)){
            Log::channel("productoinsumo")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
            Log::channel("productoinsumo")->info($ProductoInsumo);
            return response($ProductoInsumo, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("productoinsumo")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function getByProductoId($productoId){
        try{

        $ProductoInsumo = ProductoInsumo::findByProductoId($productoId);

        if(empty($ProductoInsumo)){
            Log::channel("productoinsumo")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
            Log::channel("productoinsumo")->info($ProductoInsumo);
            return response($ProductoInsumo, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("productoinsumo")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function store(Request $request)
    {
        try{

        $validator0 = Validator::make($request->all(), [ 
            'insumoId' => 'required',
        ]);
 
        if($validator0->fails()){
            Log::channel("productoinsumo")->error("El insumo Id no puede estar vacío");
            return response()->json(['Error'=>'El insumo Id no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'productoId' => 'required',
        ]);
 
        if($validator1->fails()){
            Log::channel("productoinsumo")->error("El producto Id no puede estar vacío");
            return response()->json(['Error'=>'El producto Id no puede estar vacío.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'cantidad' => 'required',
        ]);
 
        if($validator2->fails()){
            Log::channel("productoinsumo")->error("La cantidad no puede estar vacía");
            return response()->json(['Error'=>'La cantidad no puede estar vacía.'], 203);
        }

        if ($request->cantidad > 999|| $request->estado < 1){
            Log::channel("productoinsumo")->error("La cantidad solo puede estar entre 0 y 999");
            return response()->json(['Error'=>'La cantidad solo puede estar entre 0 y 999.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("productoinsumo")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }
        
            $productoInsumo = ProductoInsumo::create($request->all());
            Log::channel("productoinsumo")->info($ProductoInsumo);
            return response($productoInsumo, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("productoinsumo")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }

    }

    public function show($id)
    {
        try{

        $productoInsumo = ProductoInsumo::find($id);
        
        if  ($id < 1){
            Log::channel("productoinsumo")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero.'], 203);
        }

        if  (is_null($productoInsumo)){
            Log::channel("productoinsumo")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro.'], 203);
        }
            Log::channel("productoinsumo")->info($ProductoInsumo);
            return response($productoInsumo, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("productoinsumo")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }


    public function update(Request $request, $id){
        try{

        $productoInsumo = ProductoInsumo::find($id);
        
        if  ($id < 1){
            Log::channel("productoinsumo")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero.'], 203);
        }

        if  (is_null($productoInsumo)){
            Log::channel("productoinsumo")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro.'], 203);
        }

        $validator0 = Validator::make($request->all(), [ 
            'insumoId' => 'required',
        ]);
 
        if($validator0->fails()){
            Log::channel("productoinsumo")->error("El insumo Id no puede estar vacío");
            return response()->json(['Error'=>'El insumo Id no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'productoId' => 'required',
        ]);
 
        if($validator1->fails()){
            Log::channel("productoinsumo")->error("El producto Id no puede estar vacío");
            return response()->json(['Error'=>'El producto Id no puede estar vacío.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'cantidad' => 'required',
        ]);
 
        if($validator2->fails()){
            Log::channel("productoinsumo")->error("La cantidad no puede estar vacía");
            return response()->json(['Error'=>'La cantidad no puede estar vacía.'], 203);
        }

        if ($request->cantidad > 999|| $request->estado < 1){
            Log::channel("productoinsumo")->error("La cantidad solo puede estar entre 0 y 999");
            return response()->json(['Error'=>'La cantidad solo puede estar entre 0 y 999.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("productoinsumo")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

            $productoInsumo->update($request->all());
            Log::channel("productoinsumo")->info($ProductoInsumo);
            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
            
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("productoinsumo")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }

    }


    public function destroy($id)
    {
        $productoInsumo = ProductoInsumo::find($id)->delete();
        
        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
