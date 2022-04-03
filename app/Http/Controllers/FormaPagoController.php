<?php

namespace App\Http\Controllers;

use App\Models\FormaPago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class FormaPagoController
 * @package App\Http\Controllers
 */
class FormaPagoController extends Controller
{
    public function getFormaPago(){
        return response()->json(FormaPago::all(),200);
    }


    public function store(Request $request)
    {
        $validator0 = Validator::make($request->all(), [
            'nombreFormaPago' => 'required|min:4|max:40',
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'El nombre de la forma de pago no puede estar vacío y debe tener entre 4 a 40 caracteres.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'nombreFormaPago' => 'unique:forma_pagos',
        ]);

        if($validator1->fails()){
            return response()->json(['Error'=>'El nombre de la forma de pago debe ser único'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $formaPago = FormaPago::create($request->all());

        return response($formaPago, 200);
    }

    public function show($id)
    {
        $formaPago = FormaPago::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($formaPago)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        return response($formaPago, 200); 
    }

    public function update(Request $request,$id)
    {

        $formaPago = FormaPago::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($formaPago)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [
            'nombreFormaPago' => 'required|min:4|max:40',
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'El nombre de la forma de pago no puede estar vacío y debe tener entre 4 a 40 caracteres.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $formaPago->update($request->all());

        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
    }

    public function destroy($id)
    {
        $formaPago = FormaPago::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
