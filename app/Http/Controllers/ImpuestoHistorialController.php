<?php

namespace App\Http\Controllers;

use App\Models\ImpuestoHistorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class ImpuestoHistorialController
 * @package App\Http\Controllers
 */
class ImpuestoHistorialController extends Controller
{
    public function getImpuestoHistorial(){
        return response()->json(ImpuestoHistorial::all(),200);
    }

    public function getByImpuestoId($impuestoId){

        $impuestoHistorial = ImpuestoHistorial::findByImpuestoId($impuestoId);

        if(empty($impuestoHistorial)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }

        return response($impuestoHistorial, 200);
    }

    public function store(Request $request)
    {
        $validator0 = Validator::make($request->all(), [
            'impuestoId' => 'required'
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'El impuesto no puede estar vacía.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'valorImpuesto' => 'required|min:1|max:3'
        ]);

        if($validator1->fails()){
            return response()->json(['Error'=>'El valor del impuesto no puede estar vacío.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $impuestoHistorial = ImpuestoHistorial::create($request->all());

        return response($impuestoHistorial, 200);
    }

    public function show($id)
    {
        $impuestoHistorial = ImpuestoHistorial::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($impuestoHistorial)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        return response($impuestoHistorial, 200); 
    }

    public function update(Request $request,  $id)
    {
        $impuestoHistorial = ImpuestoHistorial::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($impuestoHistorial)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [
            'impuestoId' => 'required'
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'El impuesto no puede estar vacía.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'valorImpuesto' => 'required|min:1|max:3'
        ]);

        if($validator1->fails()){
            return response()->json(['Error'=>'El valor del impuesto no puede estar vacío.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $impuestoHistorial->update($request->all());

        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
    }

    public function destroy($id)
    {
        $impuestoHistorial = ImpuestoHistorial::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
