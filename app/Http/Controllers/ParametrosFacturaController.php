<?php

namespace App\Http\Controllers;

use App\Models\ParametrosFactura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Class ParametrosFacturaController
 * @package App\Http\Controllers
 */
class ParametrosFacturaController extends Controller
{

    public function getParametrosFactura(){
        Log::channel("parametrosfactura")->info("Registros encontrado");
        return response()->json(ParametrosFactura::all(),200);
    }

    //
    public function getBySucursal($sucursalId){

        $parametrosFactura = ParametrosFactura::findBySucursal($sucursalId);
        
        if(empty($parametrosFactura)){
            Log::channel("parametrosfactura")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
        Log::channel("parametrosfactura")->info($parametrosFactura);
        return response($parametrosFactura, 200);
    }
  
    public function store(Request $request)
    {
        $validator0 = Validator::make($request->all(), [
            'sucursalId' => 'required',
        ]);

        if($validator0->fails()){
            Log::channel("parametrosfactura")->error("La sucursal no puede estar vacío");
            return response()->json(['Error'=>'La sucursal no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'numeroCAI' => 'required',
        ]);

        if($validator1->fails()){
            Log::channel("parametrosfactura")->error("El número del CAI no puede estar vacío");
            return response()->json(['Error'=>'El número del CAI no puede estar vacío.'], 203);
        }

        $validator2 = Validator::make($request->all(), [
            'numeroCAI' => 'unique:parametros_facturas',
        ]);

        if($validator2->fails()){
            Log::channel("parametrosfactura")->error("El número del CAI debe ser único");
            return response()->json(['Error'=>'El número del CAI debe ser único.'], 203);
        }

        $validator3 = Validator::make($request->all(), [
            'fechaDesde' => 'required|date',
        ]);

        if($validator3->fails()){
            Log::channel("parametrosfactura")->error("La fecha desde no puede estar vacía");
            return response()->json(['Error'=>'La fecha desde no puede estar vacía.'], 203);
        }

        $validator4 = Validator::make($request->all(), [
            'fechaDesde' => 'before:fechaHasta',
        ]);

        if($validator4->fails()){
            Log::channel("parametrosfactura")->error("La fecha desde no puede ser despues de la fecha hasta");
            return response()->json(['Error'=>'La fecha desde no puede ser despues de la fecha hasta.'], 203);
        }

        $validator5 = Validator::make($request->all(), [
            'fechaHasta' => 'required|date',
        ]);

        if($validator5->fails()){
            Log::channel("parametrosfactura")->error("La fecha hasta no puede estar vacía");
            return response()->json(['Error'=>'La fecha hasta no puede estar vacía.'], 203);
        }

        $validator6 = Validator::make($request->all(), [
            'rangoInicial' => 'required',
        ]);

        if($validator6->fails()){
            Log::channel("parametrosfactura")->error("El rango inicial no puede estar vacío");
            return response()->json(['Error'=>'El rango inicial no puede estar vacío.'], 203);
        }

        $validator7 = Validator::make($request->all(), [
            'rangoFinal' => 'required',
        ]);

        if($validator7->fails()){
            Log::channel("parametrosfactura")->error("El rango final no puede estar vacío");
            return response()->json(['Error'=>'El rango final no puede estar vacío.'], 203);
        }

        $validator8 = Validator::make($request->all(), [
            'numeroFacturaActual' => 'required',
        ]);

        if($validator8->fails()){
            Log::channel("parametrosfactura")->error("El número de factura actual no puede estar vacío");
            return response()->json(['Error'=>'El número de factura actual no puede estar vacío.'], 203);
        }

        $validator9 = Validator::make($request->all(), [
            'puntoEmision' => 'required|min:3|max:3',
        ]);

        if($validator9->fails()){
            Log::channel("parametrosfactura")->error("El número de punto de emisión no puede estar vacío y debe contener 3 dígitos");
            return response()->json(['Error'=>'El número de punto de emisión no puede estar vacío y debe contener 3 dígitos.'], 203);
        }

        $validator10 = Validator::make($request->all(), [
            'establecimiento' => 'required|min:3|max:3',
        ]);

        if($validator10->fails()){
            Log::channel("parametrosfactura")->error("El número de establecimiento no puede estar vacío y debe contener 3 dígitos");
            return response()->json(['Error'=>'El número de establecimiento no puede estar vacío y debe contener 3 dígitos.'], 203);
        }

        $validator11 = Validator::make($request->all(), [
            'tipoDocumento' => 'required|min:2|max:2',
        ]);

        if($validator11->fails()){
            Log::channel("parametrosfactura")->error("El número de tipo de documento no puede estar vacío y debe contener 2 dígitos");
            return response()->json(['Error'=>'El número de tipo de documento no puede estar vacío y debe contener 2 dígitos.'], 203);
        }

        $validator12 = Validator::make($request->all(), [
            'rtn_Restaurante' => 'required|min:14|max:14',
        ]);

        if($validator12->fails()){
            Log::channel("parametrosfactura")->error("El RTN del restaurante no puede estar vacío y debe contener 14 dígitos");
            return response()->json(['Error'=>'El RTN del restaurante no puede estar vacío y debe contener 14 dígitos.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("parametrosfactura")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $parametrosFactura = ParametrosFactura::create($request->all());
        Log::channel("parametrosfactura")->info($parametrosFactura);
        return response($parametrosFactura, 200);
    }

    public function show($id)
    {
        $parametrosFactura = ParametrosFactura::find($id);

        if  ($id < 1){
            Log::channel("parametrosfactura")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($parametrosFactura)){
            Log::channel("parametrosfactura")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }
        Log::channel("parametrosfactura")->info($parametrosFactura);
        return response($parametrosFactura, 200); 
    }

    public function update(Request $request,$id)
    {
        $parametrosFactura = ParametrosFactura::find($id);

        if  ($id < 1){
            Log::channel("parametrosfactura")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($parametrosFactura)){
            Log::channel("parametrosfactura")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [
            'sucursalId' => 'required',
        ]);

        if($validator0->fails()){
            Log::channel("parametrosfactura")->error("La sucursal no puede estar vacío");
            return response()->json(['Error'=>'La sucursal no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'numeroCAI' => 'required',
        ]);

        if($validator1->fails()){
            Log::channel("parametrosfactura")->error("El número del CAI no puede estar vacío");
            return response()->json(['Error'=>'El número del CAI no puede estar vacío.'], 203);
        }

        $validator3 = Validator::make($request->all(), [
            'fechaDesde' => 'required|date',
        ]);

        if($validator3->fails()){
            Log::channel("parametrosfactura")->error("La fecha desde no puede estar vacía");
            return response()->json(['Error'=>'La fecha desde no puede estar vacía.'], 203);
        }

        $validator4 = Validator::make($request->all(), [
            'fechaDesde' => 'before:fechaHasta',
        ]);

        if($validator4->fails()){
            Log::channel("parametrosfactura")->error("La fecha desde no puede ser despues de la fecha hasta");
            return response()->json(['Error'=>'La fecha desde no puede ser despues de la fecha hasta.'], 203);
        }

        $validator5 = Validator::make($request->all(), [
            'fechaHasta' => 'required|date',
        ]);

        if($validator5->fails()){
            Log::channel("parametrosfactura")->error("La fecha hasta no puede estar vacía");
            return response()->json(['Error'=>'La fecha hasta no puede estar vacía.'], 203);
        }

        $validator6 = Validator::make($request->all(), [
            'rangoInicial' => 'required',
        ]);

        if($validator6->fails()){
            Log::channel("parametrosfactura")->error("El rango inicial no puede estar vacío");
            return response()->json(['Error'=>'El rango inicial no puede estar vacío.'], 203);
        }

        $validator7 = Validator::make($request->all(), [
            'rangoFinal' => 'required',
        ]);

        if($validator7->fails()){
            Log::channel("parametrosfactura")->error("El rango final no puede estar vacío");
            return response()->json(['Error'=>'El rango final no puede estar vacío.'], 203);
        }

        $validator8 = Validator::make($request->all(), [
            'numeroFacturaActual' => 'required',
        ]);

        if($validator8->fails()){
            Log::channel("parametrosfactura")->error("El número de factura actual no puede estar vacío");
            return response()->json(['Error'=>'El número de factura actual no puede estar vacío.'], 203);
        }

        $validator9 = Validator::make($request->all(), [
            'puntoEmision' => 'required|min:3|max:3',
        ]);

        if($validator9->fails()){
            Log::channel("parametrosfactura")->error("El número de punto de emisión no puede estar vacío y debe contener 3 dígitos");
            return response()->json(['Error'=>'El número de punto de emisión no puede estar vacío y debe contener 3 dígitos.'], 203);
        }

        $validator10 = Validator::make($request->all(), [
            'establecimiento' => 'required|min:3|max:3',
        ]);

        if($validator10->fails()){
            Log::channel("parametrosfactura")->error("El número de establecimiento no puede estar vacío y debe contener 3 dígitos");
            return response()->json(['Error'=>'El número de establecimiento no puede estar vacío y debe contener 3 dígitos.'], 203);
        }

        $validator11 = Validator::make($request->all(), [
            'tipoDocumento' => 'required|min:2|max:2',
        ]);

        if($validator11->fails()){
            Log::channel("parametrosfactura")->error("El número de tipo de documento no puede estar vacío y debe contener 2 dígitos");
            return response()->json(['Error'=>'El número de tipo de documento no puede estar vacío y debe contener 2 dígitos.'], 203);
        }

        $validator12 = Validator::make($request->all(), [
            'rtn_Restaurante' => 'required|min:14|max:14',
        ]);

        if($validator12->fails()){
            Log::channel("parametrosfactura")->error("El RTN del restaurante no puede estar vacío y debe contener 14 dígitos");
            return response()->json(['Error'=>'El RTN del restaurante no puede estar vacío y debe contener 14 dígitos.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("parametrosfactura")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        try {

            $parametrosFactura->update($request->all());
            Log::channel("parametrosfactura")->info($parametrosFactura);
            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
        
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Log::channel("parametrosfactura")->error("Datos repetidos");
                return response()->json(['Error'=>'Los siguientes datos deben ser únicos: Número CAI.'], 203);
            }
        }


    }

    public function destroy($id)
    {
        $parametrosFactura = ParametrosFactura::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
