<?php

namespace App\Http\Controllers;

use App\Models\ImpuestoHistorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Class ImpuestoHistorialController
 * @package App\Http\Controllers
 */
class ImpuestoHistorialController extends Controller
{
    public function getImpuestoHistorial(){
        Log::channel("impuestohistorial")->info("Registros encontrado");
        return response()->json(ImpuestoHistorial::all(),200);
    }

    public function getByImpuestoId($impuestoId){

        $impuestoHistorial = ImpuestoHistorial::findByImpuestoId($impuestoId);

        if(empty($impuestoHistorial)){
            Log::channel("impuestohistorial")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
        Log::channel("impuestohistorial")->info($impuestoHistorial);
        return response($impuestoHistorial, 200);
    }

    public function store(Request $request)
    {
        $validator0 = Validator::make($request->all(), [
            'impuestoId' => 'required'
        ]);

        if($validator0->fails()){
            Log::channel("impuestohistorial")->error("El impuesto no puede estar vacía");
            return response()->json(['Error'=>'El impuesto no puede estar vacía.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'valorImpuesto' => 'required|min:1|max:3'
        ]);

        if($validator1->fails()){
            Log::channel("impuestohistorial")->error("El valor del impuesto no puede estar vacío");
            return response()->json(['Error'=>'El valor del impuesto no puede estar vacío.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("impuestohistorial")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $impuestoHistorial = ImpuestoHistorial::create($request->all());

        Log::channel("impuestohistorial")->info($impuestoHistorial);
        return response($impuestoHistorial, 200);
    }

    public function show($id)
    {
        $impuestoHistorial = ImpuestoHistorial::find($id);

        if  ($id < 1){
            Log::channel("impuestohistorial")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($impuestoHistorial)){
            Log::channel("impuestohistorial")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        Log::channel("impuestohistorial")->info($impuestoHistorial);
        return response($impuestoHistorial, 200); 
    }

    public function update(Request $request,  $id)
    {
        $impuestoHistorial = ImpuestoHistorial::find($id);

        if  ($id < 1){
            Log::channel("impuestohistorial")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($impuestoHistorial)){
            Log::channel("impuestohistorial")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [
            'impuestoId' => 'required'
        ]);

        if($validator0->fails()){
            Log::channel("impuestohistorial")->error("El impuesto no puede estar vacía");
            return response()->json(['Error'=>'El impuesto no puede estar vacía.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'valorImpuesto' => 'required|min:1|max:3'
        ]);

        if($validator1->fails()){
            Log::channel("impuestohistorial")->error("El valor del impuesto no puede estar vacío");
            return response()->json(['Error'=>'El valor del impuesto no puede estar vacío.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("impuestohistorial")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $impuestoHistorial->update($request->all());

        Log::channel("impuestohistorial")->info($impuestoHistorial);
        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
    }

    public function destroy($id)
    {
        $impuestoHistorial = ImpuestoHistorial::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
