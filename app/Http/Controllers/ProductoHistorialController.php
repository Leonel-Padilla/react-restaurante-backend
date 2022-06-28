<?php

namespace App\Http\Controllers;

use App\Models\ProductoHistorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;


/**
 * Class ProductoHistorialController
 * @package App\Http\Controllers
 */
class ProductoHistorialController extends Controller
{
    public function getProductoHistorial(){
        try{
            return response()->json(ProductoHistorial::all(),200);
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("productohistorial")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    //

    public function getByProductoId($productoId){
        try{

        $productoHistorial = ProductoHistorial::findByProductoId($productoId);

        if(empty($productoHistorial)){
            Log::channel("productohistorial")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
            Log::channel("productohistorial")->info($productoHistorial);
            return response($productoHistorial, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("productohistorial")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function store(Request $request)
    {
        try{

        $validator0 = Validator::make($request->all(), [
            'productoId' => 'required'
        ]);

        if($validator0->fails()){
            Log::channel("productohistorial")->error("El Id del producto no puede estar vacía");
            return response()->json(['Error'=>'El Id del producto no puede estar vacía.'], 203);
        }
        //
        $validator1 = Validator::make($request->all(), [
            'precio' => 'required|min:1|max:5'
        ]);

        if($validator1->fails()){
            Log::channel("productohistorial")->error("El precio del producto no puede estar vacío y debe tener entre 1 y 5 dígitos");
            return response()->json(['Error'=>'El precio del producto no puede estar vacío y debe tener entre 1 y 5 dígitos.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("productohistorial")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

            $productoHistorial = ProductoHistorial::create($request->all());
            Log::channel("productohistorial")->info($productoHistorial);
            return response($productoHistorial, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("productohistorial")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }


    public function show($id)
    {
        try{

        $productoHistorial = ProductoHistorial::find($id);

        if  ($id < 1){
            Log::channel("productohistorial")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($productoHistorial)){
            Log::channel("productohistorial")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }
            Log::channel("productohistorial")->info($productoHistorial);
            return response($productoHistorial, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("productohistorial")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function update(Request $request, $id)
    {
        try{

        $productoHistorial = ProductoHistorial::find($id);

        if  ($id < 1){
            Log::channel("productohistorial")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($productoHistorial)){
            Log::channel("productohistorial")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [
            'productoId' => 'required'
        ]);

        if($validator0->fails()){
            Log::channel("productohistorial")->error("El Id del producto no puede estar vacía");
            return response()->json(['Error'=>'El Id del producto no puede estar vacía.'], 203);
        }
        //
        $validator1 = Validator::make($request->all(), [
            'precio' => 'required|min:1|max:5'
        ]);

        if($validator1->fails()){
            Log::channel("productohistorial")->error("El precio del producto no puede estar vacío y debe tener entre 1 y 5 dígitos");
            return response()->json(['Error'=>'El precio del producto no puede estar vacío y debe tener entre 1 y 5 dígitos.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("productohistorial")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

            $productoHistorial->update($request->all());
            Log::channel("productohistorial")->info($productoHistorial);
            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
            
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("productohistorial")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function destroy($id)
    {
        $productoHistorial = ProductoHistorial::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
