<?php

namespace App\Http\Controllers;

use App\Models\ParametrosFactura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class ParametrosFacturaController
 * @package App\Http\Controllers
 */
class ParametrosFacturaController extends Controller
{

    public function getParametrosFactura(){
        return response()->json(ParametrosFactura::all(),200);
    }
  
    public function store(Request $request)
    {
        $validator0 = Validator::make($request->all(), [
            'numeroCAI' => 'required',
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'El número del CAI no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'fechaDesde' => 'required|date',
        ]);

        if($validator1->fails()){
            return response()->json(['Error'=>'La fecha desde no puede estar vacía.'], 203);
        }

        $validator2 = Validator::make($request->all(), [
            'fechaDesde' => 'before:fechaHasta',
        ]);

        if($validator2->fails()){
            return response()->json(['Error'=>'La fecha desde no puede ser despues de la fecha hasta.'], 203);
        }

        $validator3 = Validator::make($request->all(), [
            'fechaHasta' => 'required|date',
        ]);

        if($validator3->fails()){
            return response()->json(['Error'=>'La fecha hasta no puede estar vacía.'], 203);
        }

        $validator4 = Validator::make($request->all(), [
            'rangoInicial' => 'required',
        ]);

        if($validator4->fails()){
            return response()->json(['Error'=>'El rango inicial no puede estar vacío.'], 203);
        }

        $validator5 = Validator::make($request->all(), [
            'rangoFinal' => 'required',
        ]);

        if($validator5->fails()){
            return response()->json(['Error'=>'El rango final no puede estar vacío.'], 203);
        }

        $validator6 = Validator::make($request->all(), [
            'numeroFacturaActual' => 'required',
        ]);

        if($validator6->fails()){
            return response()->json(['Error'=>'El número de factura actual no puede estar vacío.'], 203);
        }

        $validator7 = Validator::make($request->all(), [
            'puntoEmision' => 'required|min:3|max:3',
        ]);

        if($validator7->fails()){
            return response()->json(['Error'=>'El número de punto de emisión no puede estar vacío y debe contener 3 dígitos.'], 203);
        }

        $validator8 = Validator::make($request->all(), [
            'establecimiento' => 'required|min:2|max:2',
        ]);

        if($validator8->fails()){
            return response()->json(['Error'=>'El número de establecimiento no puede estar vacío y debe contener 2 dígitos.'], 203);
        }

        $validator9 = Validator::make($request->all(), [
            'tipoDocumento' => 'required|min:2|max:2',
        ]);

        if($validator9->fails()){
            return response()->json(['Error'=>'El número de tipo de documento no puede estar vacío y debe contener 2 dígitos.'], 203);
        }

        $validator10 = Validator::make($request->all(), [
            'rtn_Restaurante' => 'required|min:14|max:14',
        ]);

        if($validator10->fails()){
            return response()->json(['Error'=>'El RTN del restaurante no puede estar vacío y debe tener 14 digitos.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $parametrosFactura = ParametrosFactura::create($request->all());

        return response($parametrosFactura, 200);
    }

    public function show($id)
    {
        $parametrosFactura = ParametrosFactura::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($parametrosFactura)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        return response($parametrosFactura, 200); 
    }

    public function update(Request $request,$id)
    {
        $parametrosFactura = ParametrosFactura::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($parametrosFactura)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [
            'numeroCAI' => 'required',
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'El número del CAI no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'fechaDesde' => 'required|date',
        ]);

        if($validator1->fails()){
            return response()->json(['Error'=>'La fecha desde no puede estar vacía.'], 203);
        }

        $validator2 = Validator::make($request->all(), [
            'fechaDesde' => 'before:fechaHasta',
        ]);

        if($validator2->fails()){
            return response()->json(['Error'=>'La fecha desde no puede ser despues de la fecha hasta.'], 203);
        }

        $validator3 = Validator::make($request->all(), [
            'fechaHasta' => 'required|date',
        ]);

        if($validator3->fails()){
            return response()->json(['Error'=>'La fecha hasta no puede estar vacía.'], 203);
        }

        $validator4 = Validator::make($request->all(), [
            'rangoInicial' => 'required',
        ]);

        if($validator4->fails()){
            return response()->json(['Error'=>'El rango inicial no puede estar vacío.'], 203);
        }

        $validator5 = Validator::make($request->all(), [
            'rangoFinal' => 'required',
        ]);

        if($validator5->fails()){
            return response()->json(['Error'=>'El rango final no puede estar vacío.'], 203);
        }

        $validator6 = Validator::make($request->all(), [
            'numeroFacturaActual' => 'required',
        ]);

        if($validator6->fails()){
            return response()->json(['Error'=>'El número de factura actual no puede estar vacío.'], 203);
        }

        $validator7 = Validator::make($request->all(), [
            'puntoEmision' => 'required|min:3|max:3',
        ]);

        if($validator7->fails()){
            return response()->json(['Error'=>'El número de punto de emisión no puede estar vacío y debe contener 3 dígitos.'], 203);
        }

        $validator8 = Validator::make($request->all(), [
            'establecimiento' => 'required|min:2|max:2',
        ]);

        if($validator8->fails()){
            return response()->json(['Error'=>'El número de establecimiento no puede estar vacío y debe contener 2 dígitos.'], 203);
        }

        $validator9 = Validator::make($request->all(), [
            'tipoDocumento' => 'required|min:2|max:2',
        ]);

        if($validator9->fails()){
            return response()->json(['Error'=>'El número de tipo de documento no puede estar vacío y debe contener 2 dígitos.'], 203);
        }

        $validator10 = Validator::make($request->all(), [
            'rtn_Restaurante' => 'required|min:14|max:14',
        ]);

        if($validator10->fails()){
            return response()->json(['Error'=>'El RTN del restaurante no puede estar vacío y debe tener 14 digitos.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $parametrosFactura->update($request->all());

        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
    }

    public function destroy($id)
    {
        $parametrosFactura = ParametrosFactura::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
