<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

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
       
        if (strlen($request->cargoNombre) === 0){
            return response()->json(['Error'=>'El nombre no puede estar vacio'], 203);
        }
        if (strlen($request->cargoDescripcion) === 0){
            return response()->json(['Error'=>'El numero del cargo tiene que ser igual a 8'], 203);
        }
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


        if (strlen($request->cargoNombre) === 0){
            return response()->json(['Error'=>'El nombre no puede estar vacio'], 203);
        }
        if (strlen($request->cargoDescripcion) === 0){
            return response()->json(['Error'=>'El numero del cargo tiene que ser igual a 8'], 203);
        }
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
