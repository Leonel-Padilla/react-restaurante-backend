<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class DeliveryController
 * @package App\Http\Controllers
 */
class DeliveryController extends Controller
{

    public function getDelivery(){
        return response()->json(Delivery::all(),200);
    }

    //
    public function getByCliente($clienteId){

        $delivery = Delivery::findByCliente($clienteId);
    
        if(empty($delivery)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
    
        return response($delivery, 200);
    }

    public function store(Request $request)
    {

        $validator0 = Validator::make($request->all(), [ 
            'clienteId' => 'required',
        ]);
 
        if($validator0->fails()){
            return response()->json(['Error'=>'El cliente no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'empleadoId' => 'required',
        ]);
 
        if($validator1->fails()){
            return response()->json(['Error'=>'El empleado no puede estar vacío.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'ordenEncabezadoId' => 'required',
        ]);
 
        if($validator2->fails()){
            return response()->json(['Error'=>'El orden no puede estar vacío.'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'ordenEncabezadoId' => 'unique:deliveries',
        ]);
 
        if($validator3->fails()){
            return response()->json(['Error'=>'Esta orden ya esta registrada en un delivery.'], 203);
        }

        $validator4 = Validator::make($request->all(), [ 
            'fechaEntrega' => 'required|date',
        ]);
 
        if($validator4->fails()){
            return response()->json(['Error'=>'La fecha de entrega no puede estar vacía.'], 203);
        }

        $validator5 = Validator::make($request->all(), [ 
            'fechaEntrega' => 'required|date',
        ]);
 
        if($validator5->fails()){
            return response()->json(['Error'=>'La fecha de entrega no puede estar vacía.'], 203);
        }

        $validator6 = Validator::make($request->all(), [ 
            'comentario' => 'max:200',
        ]);
 
        if($validator6->fails()){
            return response()->json(['Error'=>'El comentario tiene un máximo de 200 caracteres.'], 203);
        }

        if($request->horaEntrega != null && $request->horaDespacho == null){
            
            return response()->json(['Error'=>'La hora de despacho no puede estar vacío si ya existe hora de entrega.'], 203);
        }

        if($request->horaEntrega != null){

            $validator6 = Validator::make($request->all(), [ 
                'horaDespacho' => 'before:horaEntrega',
            ]);
     
            if($validator6->fails()){
                return response()->json(['Error'=>'La hora del despacho no puede ser antes de la hora de entrega.'], 203);
            }
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $delivery = Delivery::create($request->all());

        return response($delivery, 200);
    }

    public function show($id)
    {
        $delivery = Delivery::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($delivery)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        return response($delivery, 200);
    }


    public function update(Request $request,$id)
    {

        $delivery = Delivery::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($delivery)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [ 
            'clienteId' => 'required',
        ]);
 
        if($validator0->fails()){
            return response()->json(['Error'=>'El cliente no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'empleadoId' => 'required',
        ]);
 
        if($validator1->fails()){
            return response()->json(['Error'=>'El empleado no puede estar vacío.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'ordenEncabezadoId' => 'required',
        ]);
 
        if($validator2->fails()){
            return response()->json(['Error'=>'El orden no puede estar vacío.'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'ordenEncabezadoId' => 'unique:deliveries',
        ]);
 
        if($validator3->fails()){
            return response()->json(['Error'=>'Esta orden ya esta registrada en un delivery.'], 203);
        }

        $validator4 = Validator::make($request->all(), [ 
            'fechaEntrega' => 'required|date',
        ]);
 
        if($validator4->fails()){
            return response()->json(['Error'=>'La fecha de entrega no puede estar vacía.'], 203);
        }

        $validator5 = Validator::make($request->all(), [ 
            'fechaEntrega' => 'required|date',
        ]);
 
        if($validator5->fails()){
            return response()->json(['Error'=>'La fecha de entrega no puede estar vacía.'], 203);
        }

        $validator6 = Validator::make($request->all(), [ 
            'comentario' => 'max:200',
        ]);
 
        if($validator6->fails()){
            return response()->json(['Error'=>'El comentario tiene un máximo de 200 caracteres.'], 203);
        }

        if($request->horaEntrega != null && $request->horaDespacho == null){
            
            return response()->json(['Error'=>'La hora de despacho no puede estar vacío si ya existe hora de entrega.'], 203);
        }

        if($request->horaEntrega != null){

            $validator6 = Validator::make($request->all(), [ 
                'horaDespacho' => 'before:horaEntrega',
            ]);
     
            if($validator6->fails()){
                return response()->json(['Error'=>'La hora del despacho no puede ser antes de la hora de entrega.'], 203);
            }
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        try {

            $delivery->update($request->all());

            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
        
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return response()->json(['Error'=>'Esta orden ya esta registrada en un delivery'], 203);
            }
        }

    }

    public function destroy($id)
    {
        $delivery = Delivery::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
