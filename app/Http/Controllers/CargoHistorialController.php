<?php

namespace App\Http\Controllers;

use App\Models\CargoHistorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class CargoHistorialController
 * @package App\Http\Controllers
 */
class CargoHistorialController extends Controller
{
    public function getCargoHistorial(){
        return response()->json(CargoHistorial::all(),200);
    }

    //
    public function getByEmpleadoId($empleadoId){

        $cargoHistorial = CargoHistorial::findByEmpleadoId($empleadoId);

        if(empty($cargoHistorial)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }

        return response($cargoHistorial, 200);
    }

    public function store(Request $request)
    {

        $validator0 = Validator::make($request->all(), [
            'empleadoId' => 'required'
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'El Id del empleado no puede estar vacía.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'cargoId' => 'required'
        ]);

        if($validator1->fails()){
            return response()->json(['Error'=>'El Id del cargo no puede estar vacía.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $cargoHistorial = CargoHistorial::create($request->all());

        return response($cargoHistorial, 200);
    }

    public function show($id)
    {
        $cargoHistorial = CargoHistorial::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($cargoHistorial)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        return response($cargoHistorial, 200); 
    }

    public function update(Request $request,  $id)
    {
        $cargoHistorial = CargoHistorial::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($cargoHistorial)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [
            'empleadoId' => 'required'
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'El Id del empleado no puede estar vacía.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'cargoId' => 'required'
        ]);

        if($validator1->fails()){
            return response()->json(['Error'=>'El Id del empleado no puede estar vacía.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $cargoHistorial->update($request->all());

        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);

    }

    public function destroy($id)
    {
        $cargoHistorial = CargoHistorial::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
