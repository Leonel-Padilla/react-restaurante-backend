<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Class DeliveryController
 * @package App\Http\Controllers
 */
class DeliveryController extends Controller
{

    public function getDelivery(){
        try{
            return response()->json(Delivery::all(),200);
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("delivery")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    //
    public function getByCliente($clienteId){
        try{

            $delivery = Delivery::findByCliente($clienteId);
    
        if(empty($delivery)){
            Log::channel("delivery")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
            Log::channel("delivery")->info($delivery);
            return response($delivery, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("delivery")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function store(Request $request)
    {
        try{
        $validator0 = Validator::make($request->all(), [ 
            'clienteId' => 'required',
        ]);
 
        if($validator0->fails()){
            Log::channel("delivery")->error("El cliente no puede estar vacío");
            return response()->json(['Error'=>'El cliente no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'empleadoId' => 'required',
        ]);
 
        if($validator1->fails()){
            Log::channel("delivery")->error("El empleado no puede estar vacío");
            return response()->json(['Error'=>'El empleado no puede estar vacío.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'ordenEncabezadoId' => 'required',
        ]);
 
        if($validator2->fails()){
            Log::channel("delivery")->error("El orden no puede estar vacío");
            return response()->json(['Error'=>'El orden no puede estar vacío.'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'ordenEncabezadoId' => 'unique:deliveries',
        ]);
 
        if($validator3->fails()){
            Log::channel("delivery")->error("Esta orden ya esta registrada en un delivery");
            return response()->json(['Error'=>'Esta orden ya esta registrada en un delivery.'], 203);
        }

        $validator4 = Validator::make($request->all(), [ 
            'fechaEntrega' => 'required|date',
        ]);
 
        if($validator4->fails()){
            Log::channel("delivery")->error("La fecha de entrega no puede estar vacía");
            return response()->json(['Error'=>'La fecha de entrega no puede estar vacía.'], 203);
        }

        $validator6 = Validator::make($request->all(), [ 
            'comentario' => 'max:200',
        ]);
 
        if($validator6->fails()){
            Log::channel("delivery")->error("El comentario tiene un máximo de 200 caracteres");
            return response()->json(['Error'=>'El comentario tiene un máximo de 200 caracteres.'], 203);
        }

        if($request->horaEntrega != null && $request->horaDespacho == null){
            Log::channel("delivery")->error("La hora de despacho no puede estar vacío si ya existe hora de entrega");
            return response()->json(['Error'=>'La hora de despacho no puede estar vacío si ya existe hora de entrega.'], 203);
        }

        if($request->horaEntrega != null){

            $validator7 = Validator::make($request->all(), [ 
                'horaDespacho' => 'before:horaEntrega',
            ]);
     
            if($validator7->fails()){
                Log::channel("delivery")->error("La hora del despacho no puede ser antes de la hora de entrega");
                return response()->json(['Error'=>'La hora del despacho no puede ser antes de la hora de entrega.'], 203);
            }
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("delivery")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

            $delivery = Delivery::create($request->all());
            Log::channel("delivery")->info($delivery);
            return response($delivery, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("delivery")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function show($id)
    {
        try{
        $delivery = Delivery::find($id);

        if  ($id < 1){
            Log::channel("delivery")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($delivery)){
            Log::channel("delivery")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

            Log::channel("delivery")->info($delivery);
            return response($delivery, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("delivery")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }


    public function update(Request $request,$id)
    {
        try{

        $delivery = Delivery::find($id);

        if  ($id < 1){
            Log::channel("delivery")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($delivery)){
            Log::channel("delivery")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [ 
            'clienteId' => 'required',
        ]);
 
        if($validator0->fails()){
            Log::channel("delivery")->error("El cliente no puede estar vacío");
            return response()->json(['Error'=>'El cliente no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'empleadoId' => 'required',
        ]);
 
        if($validator1->fails()){
            Log::channel("delivery")->error("El empleado no puede estar vacío");
            return response()->json(['Error'=>'El empleado no puede estar vacío.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'ordenEncabezadoId' => 'required',
        ]);
 
        if($validator2->fails()){
            Log::channel("delivery")->error("El orden no puede estar vacío");
            return response()->json(['Error'=>'El orden no puede estar vacío.'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'ordenEncabezadoId' => 'unique:deliveries',
        ]);
 
        if($validator3->fails()){
            Log::channel("delivery")->error("Esta orden ya esta registrada en un delivery");
            return response()->json(['Error'=>'Esta orden ya esta registrada en un delivery.'], 203);
        }

        $validator4 = Validator::make($request->all(), [ 
            'fechaEntrega' => 'required|date',
        ]);
 
        if($validator4->fails()){
            Log::channel("delivery")->error("La fecha de entrega no puede estar vacía");
            return response()->json(['Error'=>'La fecha de entrega no puede estar vacía.'], 203);
        }

        $validator6 = Validator::make($request->all(), [ 
            'comentario' => 'max:200',
        ]);
 
        if($validator6->fails()){
            Log::channel("delivery")->error("El comentario tiene un máximo de 200 caracteres");
            return response()->json(['Error'=>'El comentario tiene un máximo de 200 caracteres.'], 203);
        }

        if($request->horaEntrega != null && $request->horaDespacho == null){
            Log::channel("delivery")->error("La hora de despacho no puede estar vacío si ya existe hora de entrega");
            return response()->json(['Error'=>'La hora de despacho no puede estar vacío si ya existe hora de entrega.'], 203);
        }

        if($request->horaEntrega != null){

            $validator7 = Validator::make($request->all(), [ 
                'horaDespacho' => 'before:horaEntrega',
            ]);
     
            if($validator7->fails()){
                Log::channel("delivery")->error("La hora del despacho no puede ser antes de la hora de entrega");
                return response()->json(['Error'=>'La hora del despacho no puede ser antes de la hora de entrega.'], 203);
            }
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("delivery")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

            $delivery->update($request->all());
            Log::channel("delivery")->info($delivery);
            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
        
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Log::channel("delivery")->error("Datos repetidos");
                return response()->json(['Error'=>'Esta orden ya esta registrada en un delivery'], 203);
            }else{
                $errormessage = $e->getMessage();
                Log::channel("delivery")->error($errormessage);
                return response()->json(['Error'=>$errormessage], 203);
            }
        }

    }

    public function destroy($id)
    {
        $delivery = Delivery::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
