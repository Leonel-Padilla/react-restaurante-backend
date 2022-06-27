<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Class MesaController
 * @package App\Http\Controllers
 */
class MesaController extends Controller
{

    public function getMesa(){
        Log::channel("mesa")->info("Registros encontrado");
        return response()->json(Mesa::all(),200);
    }

    public function getBySucursalId($sucursalId){

        $mesa = Mesa::findBySucursalId($sucursalId);

        if(empty($mesa)){
            Log::channel("mesa")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
        Log::channel("mesa")->info("Registros encontrado");
        return response($mesa, 200);
    }

    public function store(Request $request)
    {

        $validator0 = Validator::make($request->all(), [
            'sucursalId' => 'required'
        ]);

        if($validator0->fails()){
            Log::channel("mesa")->error("La sucursal no puede estar vacía");
            return response()->json(['Error'=>'La sucursal no puede estar vacía.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'cantidadAsientos' => 'required'
        ]);

        if($validator1->fails()){
            Log::channel("mesa")->error("La cantidad de asientos no puede estar vacía");
            return response()->json(['Error'=>'La cantidad de asientos no puede estar vacía.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'descripcion' => 'required|max:100|min:10',
        ]);
 
        if($validator2->fails()){
            Log::channel("mesa")->error("La descripción de la mesa no puede estar vacio y debe tener entre 10 y 100 caracteres");
            return response()->json(['Error'=>'La descripción de la mesa no puede estar vacio y debe tener entre 10 y 100 caracteres'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'numero' => 'required',
        ]);
 
        if($validator3->fails()){
            Log::channel("mesa")->error("El número de la mesa no puede estar vacío");
            return response()->json(['Error'=>'El número de la mesa no puede estar vacío.'], 203);
        }

        $validator4 = Validator::make($request->all(), [ 
            'numero' => 'unique:mesas',
        ]);
 
        if($validator4->fails()){
            Log::channel("mesa")->error("El número de la mesa debe ser único");
            return response()->json(['Error'=>'El número de la mesa debe ser único.'], 203);
        }

        if ($request->numero > 999 || $request->numero < 1 ){
            Log::channel("mesa")->error("El número de la mesa debe estar entre 1 y 999");
            return response()->json(['Error'=>'El número de la mesa debe estar entre 1 y 999.'], 203);
        }

        if ($request->cantidadAsientos > 20 || $request->cantidadAsientos < 2 ){
            Log::channel("mesa")->error("La cantidad de asientos no puede ser mayor a 20 o menor a 2");
            return response()->json(['Error'=>'La cantidad de asientos no puede ser mayor a 20 o menor a 2'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("mesa")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $mesa = Mesa::create($request->all());
        Log::channel("mesa")->info($mesa);
        return response($mesa, 200);
    }


    public function show($id)
    {
        $mesa = Mesa::find($id);

        if  ($id < 1){
            Log::channel("mesa")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($mesa)){
            Log::channel("mesa")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }
        Log::channel("mesa")->info($mesa);
        return response($mesa, 200); 
    }


    public function update(Request $request,$id)
    {

        $mesa = Mesa::find($id);

        if  ($id < 1){
            Log::channel("mesa")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero.'], 203);
        }

        if  (is_null($mesa)){
            Log::channel("mesa")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro.'], 203);
        }

        $validator0 = Validator::make($request->all(), [
            'sucursalId' => 'required'
        ]);

        if($validator0->fails()){
            Log::channel("mesa")->error("La sucursal no puede estar vacía");
            return response()->json(['Error'=>'La sucursal no puede estar vacía.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'cantidadAsientos' => 'required'
        ]);

        if($validator1->fails()){
            Log::channel("mesa")->error("La cantidad de asientos no puede estar vacía");
            return response()->json(['Error'=>'La cantidad de asientos no puede estar vacía'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'descripcion' => 'required|max:100|min:10',
        ]);
 
        if($validator2->fails()){
            Log::channel("mesa")->error("La descripción de la mesa no puede estar vacio y debe tener entre 10 y 100 caracteres");
            return response()->json(['Error'=>'La descripción de la mesa no puede estar vacio y debe tener entre 10 y 100 caracteres'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'numero' => 'required|max:3|min:1',
        ]);
 
        if($validator3->fails()){
            Log::channel("mesa")->error("El número de la mesa no puede estar vacío");
            return response()->json(['Error'=>'El número de la mesa no puede estar vacío.'], 203);
        }

        if ($request->numero > 999 || $request->numero < 1 ){
            Log::channel("mesa")->error("El número de la mesa debe estar entre 1 y 999");
            return response()->json(['Error'=>'El número de la mesa debe estar entre 1 y 999.'], 203);
        }

        if ($request->cantidadAsientos > 20 || $request->cantidadAsientos < 2 ){
            Log::channel("mesa")->error("La cantidad de asientos no puede ser mayor a 20 o menor a 2");
            return response()->json(['Error'=>'La cantidad de asientos no puede ser mayor a 20 o menor a 2'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("mesa")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }
        try {

            $mesa->update($request->all());
            Log::channel("mesa")->info($mesa);
            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
        
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Log::channel("mesa")->error("Datos repetidos");
                return response()->json(['Error'=>'Los siguientes datos deben ser únicos: Número de Mesa.'], 203);
            }
        }

    }


    public function destroy($id)
    {
        $mesa = Mesa::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
