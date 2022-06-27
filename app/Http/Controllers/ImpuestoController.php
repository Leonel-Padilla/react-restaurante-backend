<?php

namespace App\Http\Controllers;

use App\Models\Impuesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Class ImpuestoController
 * @package App\Http\Controllers
 */
class ImpuestoController extends Controller
{

    public function getImpuesto(){
        Log::channel("impuesto")->info("Registros encontrado");
        return response()->json(Impuesto::all(),200);
    }


    public function store(Request $request)
    {
        $validator0 = Validator::make($request->all(), [
            'valorImpuesto' => 'required|min:1|max:3',
        ]);

        if($validator0->fails()){
            Log::channel("impuesto")->error("El valor del impuesto no puede estar vacío y debe tener entre 1 a 3 digítos");
            return response()->json(['Error'=>'El valor del impuesto no puede estar vacío y debe tener entre 1 a 3 digítos.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'nombreImpuesto' => 'required|min:4|max:40',
        ]);

        if($validator1->fails()){
            Log::channel("impuesto")->error("El nombre del impuesto no puede estar vacío y debe tener entre 4 a 40 caracteres");
            return response()->json(['Error'=>'El nombre del impuesto no puede estar vacío y debe tener entre 4 a 40 caracteres.'], 203);
        }

        $validator2 = Validator::make($request->all(), [
            'nombreImpuesto' => 'unique:impuestos',
        ]);

        if($validator2->fails()){
            Log::channel("impuesto")->error("El nombre del impuesto debe ser único");
            return response()->json(['Error'=>'El nombre del impuesto debe ser único'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("impuesto")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $impuesto = Impuesto::create($request->all());
        Log::channel("impuesto")->info($impuesto);
        return response($impuesto, 200);
    }

    public function show($id)
    {
        $impuesto = Impuesto::find($id);

        if  ($id < 1){
            Log::channel("impuesto")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($impuesto)){
            Log::channel("impuesto")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }
        Log::channel("impuesto")->info($impuesto);
        return response($impuesto, 200); 
    }

    public function update(Request $request,$id)
    {
        $impuesto = Impuesto::find($id);

        if  ($id < 1){
            Log::channel("impuesto")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($impuesto)){
            Log::channel("impuesto")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [
            'valorImpuesto' => 'required|min:1|max:3',
        ]);

        if($validator0->fails()){
            Log::channel("impuesto")->error("El valor del impuesto no puede estar vacío y debe tener entre 1 a 3 digítos");
            return response()->json(['Error'=>'El valor del impuesto no puede estar vacío y debe tener entre 1 a 3 digítos.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'nombreImpuesto' => 'required|min:4|max:40',
        ]);

        if($validator1->fails()){
            Log::channel("impuesto")->error("El nombre del impuesto no puede estar vacío y debe tener entre 4 a 40 caracteres");
            return response()->json(['Error'=>'El nombre del impuesto no puede estar vacío y debe tener entre 4 a 40 caracteres.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("impuesto")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        try {

            $impuesto->update($request->all());
            Log::channel("impuesto")->info($impuesto);
            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
        
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Log::channel("impuesto")->error("Datos repetidos");
                return response()->json(['Error'=>'Los siguientes datos deben ser únicos: Nombre del Impuesto.'], 203);
            }
        }
    }


    public function destroy($id)
    {
        $impuesto = FormaPago::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
