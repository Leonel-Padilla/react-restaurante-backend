<?php

namespace App\Http\Controllers;

use App\Models\CargoHistorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Class CargoHistorialController
 * @package App\Http\Controllers
 */
class CargoHistorialController extends Controller
{
    public function getCargoHistorial(){
        try{
            return response()->json(CargoHistorial::all(),200);
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("cargohistorial")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    //
    public function getByEmpleadoId($empleadoId){
        try{
            $cargoHistorial = CargoHistorial::findByEmpleadoId($empleadoId);

            if(empty($cargoHistorial)){
                Log::channel("cargohistorial")->error("Registro no encontrado");
                return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
            }
            Log::channel("cargohistorial")->info($cargoHistorial);
            return response($cargoHistorial, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("cargohistorial")->error($errormessage);
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
            Log::channel("cargohistorial")->error("El Id del empleado no puede estar vacía");
            return response()->json(['Error'=>'El Id del empleado no puede estar vacía.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'cargoId' => 'required'
        ]);

        if($validator1->fails()){
            Log::channel("cargohistorial")->error("El Id del cargo no puede estar vacía");
            return response()->json(['Error'=>'El Id del cargo no puede estar vacía.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("cargohistorial")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);

        }
            $cargoHistorial = CargoHistorial::create($request->all());
            Log::channel("cargohistorial")->info($cargoHistorial);
            return response($cargoHistorial, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->getMessage();
            Log::channel("cargohistorial")->error($errorCode);
            return response()->json(['Error'=>$errorCode], 203);
        }

    }

    public function show($id)
    {
        try{
        $cargoHistorial = CargoHistorial::find($id);

        if  ($id < 1){
            Log::channel("cargohistorial")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($cargoHistorial)){
            Log::channel("cargohistorial")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        Log::channel("cargohistorial")->info($cargoHistorial);
        return response($cargoHistorial, 200); 

        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->getMessage();
            Log::channel("cargohistorial")->error($errorCode);
            return response()->json(['Error'=>$errorCode], 203);
        }
    }

    public function update(Request $request,  $id)
    {
        try{
        $cargoHistorial = CargoHistorial::find($id);

        if  ($id < 1){
            Log::channel("cargohistorial")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($cargoHistorial)){
            Log::channel("cargohistorial")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [
            'empleadoId' => 'required'
        ]);

        if($validator0->fails()){
            Log::channel("cargohistorial")->error("El Id del empleado no puede estar vacía");
            return response()->json(['Error'=>'El Id del empleado no puede estar vacía.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'cargoId' => 'required'
        ]);

        if($validator1->fails()){
            Log::channel("cargohistorial")->error("El Id del empleado no puede estar vacía");
            return response()->json(['Error'=>'El Id del empleado no puede estar vacía.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("cargohistorial")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

            $cargoHistorial->update($request->all());
            Log::channel("cargohistorial")->info($cargoHistorial);
            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->getMessage();
            Log::channel("cargohistorial")->error($errorCode);
            return response()->json(['Error'=>$errorCode], 203);
        }

    }

    public function destroy($id)
    {
        $cargoHistorial = CargoHistorial::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
