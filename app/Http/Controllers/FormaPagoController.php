<?php

namespace App\Http\Controllers;

use App\Models\FormaPago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Class FormaPagoController
 * @package App\Http\Controllers
 */
class FormaPagoController extends Controller
{
    public function getFormaPago(){
        Log::channel("formapago")->info("Registros encontrado");
        return response()->json(FormaPago::all(),200);
    }


    public function store(Request $request)
    {
        $validator0 = Validator::make($request->all(), [
            'nombreFormaPago' => 'required|min:4|max:40',
        ]);

        if($validator0->fails()){
            Log::channel("formapago")->error("El nombre de la forma de pago no puede estar vacío y debe tener entre 4 a 40 caracteres");
            return response()->json(['Error'=>'El nombre de la forma de pago no puede estar vacío y debe tener entre 4 a 40 caracteres.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'nombreFormaPago' => 'unique:forma_pagos',
        ]);

        if($validator1->fails()){
            Log::channel("formapago")->error("El nombre de la forma de pago debe ser único");
            return response()->json(['Error'=>'El nombre de la forma de pago debe ser único'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("formapago")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $formaPago = FormaPago::create($request->all());
        Log::channel("formapago")->error($formaPago);
        return response($formaPago, 200);
    }

    public function show($id)
    {
        $formaPago = FormaPago::find($id);

        if  ($id < 1){
            Log::channel("formapago")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($formaPago)){
            Log::channel("formapago")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }
        Log::channel("formapago")->error($formaPago);
        return response($formaPago, 200); 
    }

    public function update(Request $request,$id)
    {

        $formaPago = FormaPago::find($id);

        if  ($id < 1){
            Log::channel("formapago")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($formaPago)){
            Log::channel("formapago")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [
            'nombreFormaPago' => 'required|min:4|max:40',
        ]);

        if($validator0->fails()){
            Log::channel("formapago")->error("El nombre de la forma de pago no puede estar vacío y debe tener entre 4 a 40 caracteres");
            return response()->json(['Error'=>'El nombre de la forma de pago no puede estar vacío y debe tener entre 4 a 40 caracteres.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("formapago")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        
        try {

            $formaPago->update($request->all());
            Log::channel("formapago")->info($formaPago);
            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
        
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Log::channel("formapago")->error("Datos repetidos");
                return response()->json(['Error'=>'Los siguientes datos deben ser únicos: Nombre de Forma de Pago.'], 203);
            }
        }
    }

    public function destroy($id)
    {
        $formaPago = FormaPago::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
