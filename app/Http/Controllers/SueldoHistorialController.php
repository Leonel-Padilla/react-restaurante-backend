<?php

namespace App\Http\Controllers;

use App\Models\SueldoHistorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Class SueldoHistorialController
 * @package App\Http\Controllers
 */
class SueldoHistorialController extends Controller
{
    public function getSueldoHistorial(){
        try{
            return response()->json(SueldoHistorial::all(),200);
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("sueldo")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }


    //
    public function getByEmpleadoId($empleadoId){

        try{

        $sueldoHistorial = SueldoHistorial::findByEmpleadoId($empleadoId);

        if(empty($sueldoHistorial)){
            Log::channel("sueldo")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
            Log::channel("sueldo")->info($sueldoHistorial);
            return response($sueldoHistorial, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("sueldo")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function store(Request $request)
    {
        try{

        $validator0 = Validator::make($request->all(), [
            'empleadoId' => 'required'
        ]);

        if($validator0->fails()){
            Log::channel("sueldo")->error("El Id del empleado no puede estar vacía");
            return response()->json(['Error'=>'El Id del empleado no puede estar vacía.'], 203);
        }
        //
        $validator1 = Validator::make($request->all(), [
            'sueldo' => 'required|min:4|max:6'
        ]);

        if($validator1->fails()){
            Log::channel("sueldo")->error("El sueldo no puede estar vacío y debe tener de 4 a 6 digitos");
            return response()->json(['Error'=>'El sueldo no puede estar vacío y debe tener de 4 a 6 digitos.'], 203);
        }
        //
        /*$validator2 = Validator::make($request->all(), [
            'fechaInicio' => 'required|date|before:fechaFinal'
        ]);

        if($validator2->fails()){
            return response()->json(['Error'=>'La fecha inicial no puede ser antes de la fecha final'], 203);
        }
        //
        $validator3 = Validator::make($request->all(), [
            'fechaFinal' => 'required|date|after:fechaInicio'
        ]);

        if($validator3->fails()){
            return response()->json(['Error'=>'La fecha final no puede ser antes de la fecha inicial.'], 203);
        }*/
        //
        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("sueldo")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

            $sueldoHistorial = SueldoHistorial::create($request->all());
            Log::channel("sueldo")->info($sueldoHistorial);
            return response($sueldoHistorial, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("sueldo")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function show($id)
    {
        try{

        $sueldoHistorial = SueldoHistorial::find($id);

        if  ($id < 1){
            Log::channel("sueldo")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($sueldoHistorial)){
            Log::channel("sueldo")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }
            Log::channel("sueldo")->info($sueldoHistorial);
            return response($sueldoHistorial, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("sueldo")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function update(Request $request, $id)
    {
        try{

        $sueldoHistorial = SueldoHistorial::find($id);

        $validator0 = Validator::make($request->all(), [
            'empleadoId' => 'required'
        ]);

        if($validator0->fails()){
            Log::channel("sueldo")->error("El Id del empleado no puede estar vacía");
            return response()->json(['Error'=>'El Id del empleado no puede estar vacía.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'sueldo' => 'required|min:4|max:6'
        ]);

        if($validator1->fails()){
            Log::channel("sueldo")->error("El sueldo no puede estar vacío y debe tener de 4 a 6 digitos");
            return response()->json(['Error'=>'El sueldo no puede estar vacío y debe tener de 4 a 6 digitos.'], 203);
        }
        //
        /*$validator2 = Validator::make($request->all(), [
            'fechaInicio' => 'required|date|before:fechaFinal'
        ]);

        if($validator2->fails()){
            return response()->json(['Error'=>'La fecha inicial no puede ser antes de la fecha final'], 203);
        }
        //
        $validator3 = Validator::make($request->all(), [
            'fechaFinal' => 'required|date|after:fechaInicio'
        ]);

        if($validator3->fails()){
            return response()->json(['Error'=>'La fecha final no puede ser antes de la fecha inicial.'], 203);
        }*/
        //
        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("sueldo")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }
        //
            $sueldoHistorial->update($request->all());
            Log::channel("sueldo")->info($sueldoHistorial);
            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
            
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("sueldo")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function destroy($id)
    {
        $sueldoHistorial = SueldoHistorial::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
