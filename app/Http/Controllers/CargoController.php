<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Class CargoController
 * @package App\Http\Controllers
 */
class CargoController extends Controller
{


    public function getCargo(){
        try{
            return response()->json(Cargo::all(),200);
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("cargo")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    //
    public function getByCargoNombre($nombreCargo){
        try{
            $Cargo = Cargo::findByCargoNombre($nombreCargo);
            if(empty($Cargo)){
                Log::channel("cargo")->error("Registro no encontrado");
                return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
            }
            Log::channel("cargo")->info($Cargo);
            return response($Cargo, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("cargo")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }


    public function store(Request $request)
    {
        try {

        $validator1 = Validator::make($request->all(), [ 
            'cargoNombre' => 'unique:cargos',
        ]);
 
        if($validator1->fails()){
            Log::channel("cargo")->error("No se puede repetir el nombre del cargo");
            return response()->json(['Error'=>'No se puede repetir el nombre del cargo'], 203);
        }

        /*if str_contains($request->cargoNombre, "@" || str_contains($request->cargoNombre, ".") 
        || str_contains($request->cargoNombre, "/") || str_contains($request->cargoNombre, "#") 
        || str_contains($request->cargoNombre, "$") || str_contains($request->cargoNombre, "-")
        || str_contains($request->cargoNombre, "_") || str_contains($request->cargoNombre, "?")
        || str_contains($request->cargoNombre, "!") || str_contains($request->cargoNombre, ",")){
            return response()->json(['Error'=>'El nombre no puede contener caracteres especiales'], 203);
        }*/

        if (strlen($request->cargoNombre) === 0){
            Log::channel("cargo")->error("El nombre no puede estar vacío");
            return response()->json(['Error'=>'El nombre no puede estar vacío'], 203);
        }

        if (strlen($request->cargoNombre) < 4){
            Log::channel("cargo")->error("El nombre del cargo no puede ser menor de 4 caracteres");
            return response()->json(['Error'=>'El nombre del cargo no puede ser menor de 4 caracteres'], 203);
        }

        if (strlen($request->cargoNombre) > 30){
            Log::channel("cargo")->error("El nombre del cargo no puede ser mayor de 30 caracteres");
            return response()->json(['Error'=>'El nombre del cargo no puede ser mayor de 30 caracteres'], 203);
        }
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////

        if (strlen($request->cargoDescripcion) === 0){
            Log::channel("cargo")->error("La descripción del cargo no puede estar vacía");
            return response()->json(['Error'=>'La descripción del cargo no puede estar vacía'], 203);
        }

        if (strlen($request->cargoDescripcion) > 100){
            Log::channel("cargo")->error("La descripción del cargo no puede ser mayor de 100 caracteres");
            return response()->json(['Error'=>'La descripción del cargo no puede ser mayor de 100 caracteres'], 203);
        }

        if (strlen($request->cargoDescripcion) < 20){
            Log::channel("cargo")->error("La descripción del cargo no puede ser menor de 20 caracteres");
            return response()->json(['Error'=>'La descripción del cargo no puede ser menor de 20 caracteres'], 203);
        }
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("cargo")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);

        }
            $cargo = Cargo::create($request->all());
            Log::channel("cargo")->info($cargo);
            return response($cargo, 200);
        
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->getMessage();
            Log::channel("cargo")->error($errorCode);
            return response()->json(['Error'=>$errorCode], 203);
        }
    
    }

   
    public function show($id)
    {
        try{
        $cargo = Cargo::find($id);

         //Validaciones Busqueda
        if  ($id < 1){
            Log::channel("cargo")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($cargo)){
            Log::channel("cargo")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        Log::channel("cargo")->info($cargo);
        return response($cargo, 200);     

        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->getMessage();
            Log::channel("cargo")->error($errorCode);
            return response()->json(['Error'=>$errorCode], 203);
        }
    }

    
    public function update(Request $request, $id)
    {
        try{
        $cargo = Cargo::find($id);

         //Validaciones Busqueda
        if  ($id < 1){
            Log::channel("cargo")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($cargo)){
            Log::channel("cargo")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        if (strlen($request->cargoNombre) === 0){
            Log::channel("cargo")->error("El nombre no puede estar vacío");
            return response()->json(['Error'=>'El nombre no puede estar vacío'], 203);
        }

        if (strlen($request->cargoNombre) < 4){
            
            Log::channel("cargo")->error("El nombre del cargo no puede ser menor de 4 caracteres");
            return response()->json(['Error'=>'El nombre del cargo no puede ser menor de 4 caracteres'], 203);
        }

        if (strlen($request->cargoNombre) > 30){
            Log::channel("cargo")->error("El nombre del cargo no puede ser mayor de 30 caracteres");
            return response()->json(['Error'=>'El nombre del cargo no puede ser mayor de 30 caracteres'], 203);
        }
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////

        if (strlen($request->cargoDescripcion) === 0){
            Log::channel("cargo")->error("La descripción del cargo no puede estar vacía");
            return response()->json(['Error'=>'La descripción del cargo no puede estar vacía'], 203);
        }

        if (strlen($request->cargoDescripcion) > 100){
            Log::channel("cargo")->error("La descripción del cargo no puede ser mayor de 100 caracteres");
            return response()->json(['Error'=>'La descripción del cargo no puede ser mayor de 100 caracteres'], 203);
        }

        if (strlen($request->cargoDescripcion) < 20){
            Log::channel("cargo")->error("La descripción del cargo no puede ser menor de 20 caracteres");
            return response()->json(['Error'=>'La descripción del cargo no puede ser menor de 20 caracteres'], 203);
        }
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("cargo")->error("El estado solo puede ser 1 o 0'");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

            $cargo->update($request->all());
            Log::channel("cargo")->info($cargo);
            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
        
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Log::channel("cargo")->error("Datos repetidos");
                return response()->json(['Error'=>'Los siguientes datos deben ser únicos: Nombre del cargo.'], 203);
            }else{
                $errorCode = $e->getMessage();
                Log::channel("cargo")->error($errorCode);
                return response()->json(['Error'=>$errorCode], 203);
            }
        }

    }

    
    public function destroy($id)
    {
        $cargo = Cargo::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
