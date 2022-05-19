<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class FacturaController
 * @package App\Http\Controllers
 */
class FacturaController extends Controller
{
    public function getFactura(){
        return response()->json(Factura::all(),200);
    }

    public function getByEmpleadoCajeroId($empleadoCajeroId){

        $empleadoCajeroId = Factura::findByEmpleadoCajeroId($empleadoCajeroId);

        if(empty($empleadoCajeroId)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }

        return response($empleadoCajeroId, 200);
    }
    
    public function store(Request $request)
    {
        $validator0 = Validator::make($request->all(), [
            'ordenEncabezadoId' => 'required',
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'El orden de encabezado no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'empleadoCajeroId' => 'required',
        ]);

        if($validator1->fails()){
            return response()->json(['Error'=>'El cajero no puede estar vacío.'], 203);
        }

        $validator2 = Validator::make($request->all(), [
            'parametroFacturaId' => 'required',
        ]);

        if($validator2->fails()){
            return response()->json(['Error'=>'El parametro de factura no puede estar vacío.'], 203);
        }
        
        $validator3 = Validator::make($request->all(), [
            'formaPagosId' => 'required',
        ]);

        if($validator3->fails()){
            return response()->json(['Error'=>'La forma de pago no puede estar vacía.'], 203);
        }

        $validator4 = Validator::make($request->all(), [
            'numeroFactura' => 'required|min:16|max:16',
        ]);

        if($validator4->fails()){
            return response()->json(['Error'=>'El número de factura no puede estar vacío y debe tener 16 dígitos.'], 203);
        }

        $validator5 = Validator::make($request->all(), [
            'fechaHora' => 'required|date',
        ]);

        if($validator5->fails()){
            return response()->json(['Error'=>'La fecha y hora de la factura no puede estar vacío.'], 203);
        }

        $validator6 = Validator::make($request->all(), [
            'impuesto' => 'required',
        ]);

        if($validator6->fails()){
            return response()->json(['Error'=>'El impuesto no puede estar vacío.'], 203);
        }

        $validator7 = Validator::make($request->all(), [
            'subTotal' => 'required',
        ]);

        if($validator7->fails()){
            return response()->json(['Error'=>'El sub total no puede estar vacío.'], 203);
        }
        
        $validator8 = Validator::make($request->all(), [
            'total' => 'required',
        ]);

        if($validator8->fails()){
            return response()->json(['Error'=>'El total no puede estar vacío.'], 203);
        }

        $validator9 = Validator::make($request->all(), [
            'informacionPago' => 'required',
        ]);

        if($validator9->fails()){
            return response()->json(['Error'=>'La información de pago no puede estar vacío.'], 203);
        }

        $validator10 = Validator::make($request->all(), [
            'justificacion' => 'max:200',
        ]);

        if($validator10->fails()){
            return response()->json(['Error'=>'La justificación tiene un máximo de 200 caracteres.'], 203);
        }

        // $validator11 = Validator::make($request->all(), [
        //     'descuentoPorcentaje' => 'required',
        // ]);

        // if($validator11->fails()){
        //     return response()->json(['Error'=>'El porcentaje del descuento no puede estar vacío.'], 203);
        // }

        // $validator12 = Validator::make($request->all(), [
        //     'descuentoCantidad' => 'required',
        // ]);

        // if($validator12->fails()){
        //     return response()->json(['Error'=>'La cantidad del descuento no puede estar vacío.'], 203);
        // }

        if ($request->impuesto < 0){
            return response()->json(['Error'=>'El impuesto no puede ser menor a 0'], 203);
        }

        if ($request->subTotal < 0){
            return response()->json(['Error'=>'El sub total no puede ser menor a 0'], 203);
        }

        if ($request->total < 0){
            return response()->json(['Error'=>'El total no puede ser menor a 0'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $factura = Factura::create($request->all());

        return response($factura, 200);
    }

    public function show($id)
    {
        $factura = Factura::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($factura)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        return response($factura, 200);
    }

    public function update(Request $request, $id)
    {
        $factura = Factura::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($factura)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [
            'ordenEncabezadoId' => 'required',
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'El orden de encabezado no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'empleadoCajeroId' => 'required',
        ]);

        if($validator1->fails()){
            return response()->json(['Error'=>'El cajero no puede estar vacío.'], 203);
        }

        $validator2 = Validator::make($request->all(), [
            'parametroFacturaId' => 'required',
        ]);

        if($validator2->fails()){
            return response()->json(['Error'=>'El parametro de factura no puede estar vacío.'], 203);
        }
        
        $validator3 = Validator::make($request->all(), [
            'formaPagosId' => 'required',
        ]);

        if($validator3->fails()){
            return response()->json(['Error'=>'La forma de pago no puede estar vacía.'], 203);
        }

        $validator4 = Validator::make($request->all(), [
            'numeroFactura' => 'required|min:16|max:16',
        ]);

        if($validator4->fails()){
            return response()->json(['Error'=>'El número de factura no puede estar vacío y debe tener 16 dígitos.'], 203);
        }
        
        $validator5 = Validator::make($request->all(), [
            'fechaHora' => 'required|date',
        ]);

        if($validator5->fails()){
            return response()->json(['Error'=>'La fecha y hora de la factura no puede estar vacío.'], 203);
        }

        $validator6 = Validator::make($request->all(), [
            'impuesto' => 'required',
        ]);

        if($validator6->fails()){
            return response()->json(['Error'=>'El impuesto no puede estar vacío.'], 203);
        }

        $validator7 = Validator::make($request->all(), [
            'subTotal' => 'required',
        ]);

        if($validator7->fails()){
            return response()->json(['Error'=>'El sub total no puede estar vacío.'], 203);
        }
        
        $validator8 = Validator::make($request->all(), [
            'total' => 'required',
        ]);

        if($validator8->fails()){
            return response()->json(['Error'=>'El total no puede estar vacío.'], 203);
        }

        $validator9 = Validator::make($request->all(), [
            'informacionPago' => 'required',
        ]);

        if($validator9->fails()){
            return response()->json(['Error'=>'La información de pago no puede estar vacío.'], 203);
        }

        $validator10 = Validator::make($request->all(), [
            'justificacion' => 'max:200',
        ]);

        if($validator10->fails()){
            return response()->json(['Error'=>'La justificación tiene un máximo de 200 caracteres.'], 203);
        }

        // $validator11 = Validator::make($request->all(), [
        //     'descuentoPorcentaje' => 'required',
        // ]);

        // if($validator11->fails()){
        //     return response()->json(['Error'=>'El porcentaje del descuento no puede estar vacío.'], 203);
        // }

        // $validator12 = Validator::make($request->all(), [
        //     'descuentoCantidad' => 'required',
        // ]);

        // if($validator12->fails()){
        //     return response()->json(['Error'=>'La cantidad del descuento no puede estar vacío.'], 203);
        // }

        if ($request->impuesto < 0){
            return response()->json(['Error'=>'El impuesto no puede ser menor a 0'], 203);
        }

        if ($request->subTotal < 0){
            return response()->json(['Error'=>'El sub total no puede ser menor a 0'], 203);
        }

        if ($request->total < 0){
            return response()->json(['Error'=>'El total no puede ser menor a 0'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $factura->update($request->all());

        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
    }

    public function destroy($id)
    {
        $factura = Factura::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
