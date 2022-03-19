<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class MesaController
 * @package App\Http\Controllers
 */
class MesaController extends Controller
{

    public function getMesa(){
        return response()->json(Mesa::all(),200);
    }

    public function store(Request $request)
    {

        $validator0 = Validator::make($request->all(), [
            'sucursalId' => 'required'
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'El Id del sucursal no puede estar vacía.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'cantidadAsientos' => 'required|max:2|min:1'
        ]);

        if($validator1->fails()){
            return response()->json(['Error'=>'La cantidad de asientos no puede estar vacía.'], 203);
        }

        if ($request->cantidadAsientos > 50 || $request->cantidadAsientos < 0 ){
            return response()->json(['Error'=>'La cantidad de asientos no puede ser mayor a 50 o menor a 0'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $mesa = Mesa::create($request->all());

        return response($mesa, 200);
    }


    public function show($id)
    {
        $mesa = Mesa::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($mesa)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        return response($mesa, 200); 
    }


    public function update(Request $request,$id)
    {

        $mesa = Mesa::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero.'], 203);
        }

        if  (is_null($mesa)){
            return response()->json(['Error'=>'No existe este registro.'], 203);
        }

        $validator0 = Validator::make($request->all(), [
            'sucursalId' => 'required'
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'El Id del sucursal no puede estar vacía.'], 203);
        }

        if ($request->cantidadAsientos > 50 || $request->cantidadAsientos < 0 ){
            return response()->json(['Error'=>'La cantidad de asientos no puede ser mayor a 50 o menor a 0'], 203);
        }

        $validator0 = Validator::make($request->all(), [
            'cantidadAsientos' => 'required|max:2|min:1'
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'La cantidad de asientos no puede estar vacía y debe ser un minimo de 0 y máximo de 50.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $mesa->update($request->all());

        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
    }


    public function destroy($id)
    {
        $mesa = Mesa::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
