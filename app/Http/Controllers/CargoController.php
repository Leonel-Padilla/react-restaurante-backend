<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class CargoController
 * @package App\Http\Controllers
 */
class CargoController extends Controller
{


    public function getCargo(){
        return response()->json(Cargo::all(),200);
    }

    //
    public function getByCargoNombre($nombreCargo){


        $Cargo = Cargo::findByCargoNombre($nombreCargo);

        if(empty($Cargo)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
        return response($Cargo, 200);
    }
    


    public function store(Request $request)
    {
        $validator1 = Validator::make($request->all(), [ 
            'cargoNombre' => 'unique:cargos',
        ]);
 
        if($validator1->fails()){
            return response()->json(['Error'=>'No se puede repetir el nombre del cargo'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'cargoDescripcion' => 'unique:cargos',
        ]);
 
        if($validator2->fails()){
            return response()->json(['Error'=>'No se puede repetir la decripción del cargo'], 203);
        }


        /*if (str_contains($request->cargoNombre, "@") || str_contains($request->cargoNombre, ".") 
        || str_contains($request->cargoNombre, "/") || str_contains($request->cargoNombre, "#") 
        || str_contains($request->cargoNombre, "$") || str_contains($request->cargoNombre, "-")
        || str_contains($request->cargoNombre, "_") || str_contains($request->cargoNombre, "?")
        || str_contains($request->cargoNombre, "!") || str_contains($request->cargoNombre, ",")){
            return response()->json(['Error'=>'El nombre no puede contener caracteres especiales'], 203);
        }*/

        if (strlen($request->cargoNombre) === 0){
            return response()->json(['Error'=>'El nombre no puede estar vacio'], 203);
        }

        if (strlen($request->cargoNombre) < 4){
            return response()->json(['Error'=>'El nombre del cargo no puede ser menor de 4 caracteres'], 203);
        }

        if (strlen($request->cargoNombre) > 30){
            return response()->json(['Error'=>'El nombre del cargo no puede ser mayor de 30 caracteres'], 203);
        }
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////

        if (strlen($request->cargoDescripcion) === 0){
            return response()->json(['Error'=>'La descripción del cargo no puede estar vacía'], 203);
        }

        if (strlen($request->cargoDescripcion) > 100){
            return response()->json(['Error'=>'La descripción del cargo no puede ser mayor de 100 caracteres'], 203);
        }

        if (strlen($request->cargoDescripcion) < 20){
            return response()->json(['Error'=>'La descripción del cargo no puede ser menor de 20 caracteres'], 203);
        }
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////

        
        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $cargo = Cargo::create($request->all());

        return response($cargo, 200);
    }

   
    public function show($id)
    {
        $cargo = Cargo::find($id);

         //Validaciones Busqueda
        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($cargo)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        return response($cargo, 200);
    }

    
    public function update(Request $request, $id)
    {
        $cargo = Cargo::find($id);

         //Validaciones Busqueda
        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($cargo)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        ////
        /*$validator1 = Validator::make($request->all(), [ 
            'cargoNombre' => 'unique:cargos',
        ]);
 
        if($validator1->fails()){
            return response()->json(['Mensaje'=>'No se puede repetir el nombre del cargo'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'cargoDescripcion' => 'unique:cargos',
        ]);
 
        if($validator2->fails()){
            return response()->json(['Mensaje'=>'No se puede repetir la decripción del cargo'], 203);
        }*/


        if (strlen($request->cargoNombre) === 0){
            return response()->json(['Error'=>'El nombre no puede estar vacio'], 203);
        }

        if (strlen($request->cargoNombre) < 4){
            return response()->json(['Error'=>'El nombre del cargo no puede ser menor de 4 caracteres'], 203);
        }

        if (strlen($request->cargoNombre) > 30){
            return response()->json(['Error'=>'El nombre del cargo no puede ser mayor de 30 caracteres'], 203);
        }
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////

        if (strlen($request->cargoDescripcion) === 0){
            return response()->json(['Error'=>'La descripción del cargo no puede estar vacía'], 203);
        }

        if (strlen($request->cargoDescripcion) > 100){
            return response()->json(['Error'=>'La descripción del cargo no puede ser mayor de 100 caracteres'], 203);
        }

        if (strlen($request->cargoDescripcion) < 20){
            return response()->json(['Error'=>'La descripción del cargo no puede ser menor de 20 caracteres'], 203);
        }
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $cargo->update($request->all());

        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);

    }

    
    public function destroy($id)
    {
        $cargo = Cargo::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
