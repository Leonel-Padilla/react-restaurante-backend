<?php

namespace App\Http\Controllers;

use App\Models\ProductoHistorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


/**
 * Class ProductoHistorialController
 * @package App\Http\Controllers
 */
class ProductoHistorialController extends Controller
{
    public function getProductoHistorial(){
        return response()->json(ProductoHistorial::all(),200);
    }

    //

    public function getByProductoId($productoId){

        $productoHistorial = ProductoHistorial::findByProductoId($productoId);

        if(empty($productoHistorial)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }

        return response($productoHistorial, 200);
    }

    public function store(Request $request)
    {
        $validator0 = Validator::make($request->all(), [
            'productoId' => 'required'
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'El Id del producto no puede estar vacía.'], 203);
        }
        //
        $validator1 = Validator::make($request->all(), [
            'precio' => 'required|min:1|max:5'
        ]);

        if($validator1->fails()){
            return response()->json(['Error'=>'El precio del producto no puede estar vacío y debe tener entre 1 y 5 dígitos.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $productoHistorial = ProductoHistorial::create($request->all());

        return response($productoHistorial, 200);
    }


    public function show($id)
    {
        $productoHistorial = ProductoHistorial::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($productoHistorial)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        return response($productoHistorial, 200); 
    }

    public function update(Request $request, $id)
    {
        $productoHistorial = ProductoHistorial::find($id);

        $validator0 = Validator::make($request->all(), [
            'productoId' => 'required'
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'El Id del producto no puede estar vacía.'], 203);
        }
        //
        $validator1 = Validator::make($request->all(), [
            'precio' => 'required|min:1|max:5'
        ]);

        if($validator1->fails()){
            return response()->json(['Error'=>'El precio del producto no puede estar vacío y debe tener entre 1 y 5 dígitos.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $productoHistorial->update($request->all());

        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
    }

    public function destroy($id)
    {
        $productoHistorial = ProductoHistorial::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
