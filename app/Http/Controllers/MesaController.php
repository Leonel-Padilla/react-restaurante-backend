<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class MesaController
 * @package App\Http\Controllers
 */
class MesaController extends Controller
{

    public function getMesa(){
        return response()->json(Mesa::all(),200);
    }

    public function getBySucursalId($sucursalId){

        $mesa = Mesa::findBySucursalId($sucursalId);

        if(empty($mesa)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }

        return response($mesa, 200);
    }

    public function store(Request $request)
    {

        $validator0 = Validator::make($request->all(), [
            'sucursalId' => 'required'
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'El Id del sucursal no puede estar vacía.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'cantidadAsientos' => 'required'
        ]);

        if($validator1->fails()){
            return response()->json(['Error'=>'La cantidad de asientos no puede estar vacía.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'descripcion' => 'required|max:100|min:10',
        ]);
 
        if($validator2->fails()){
            return response()->json(['Error'=>'La descripcion de la mesa no puede estar vacio y debe tener entre 10 y 100 carácteres'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'numero' => 'required',
        ]);
 
        if($validator3->fails()){
            return response()->json(['Error'=>'El numero de la mesa no puede estar vacio.'], 203);
        }

        $validator4 = Validator::make($request->all(), [ 
            'numero' => 'unique:mesas',
        ]);
 
        if($validator4->fails()){
            return response()->json(['Error'=>'El numero de la mesa debe ser único.'], 203);
        }

        if ($request->numero > 999 || $request->numero < 1 ){
            return response()->json(['Error'=>'El numero de la mesa debe estar entre 1 y 999.'], 203);
        }

        if ($request->cantidadAsientos > 20 || $request->cantidadAsientos < 2 ){
            return response()->json(['Error'=>'La cantidad de asientos no puede ser mayor a 20 o menor a 2'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $mesa = Mesa::create($request->all());

        return response($mesa, 200);
    }


    public function show($id)
    {
        $mesa = Mesa::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($mesa)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        return response($mesa, 200); 
    }


    public function update(Request $request,$id)
    {

        $mesa = Mesa::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero.'], 203);
        }

        if  (is_null($mesa)){
            return response()->json(['Error'=>'No existe este registro.'], 203);
        }

        $validator0 = Validator::make($request->all(), [
            'sucursalId' => 'required'
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'El Id del sucursal no puede estar vacía.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'cantidadAsientos' => 'required'
        ]);

        if($validator1->fails()){
            return response()->json(['Error'=>'La cantidad de asientos no puede estar vacía'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'descripcion' => 'required|max:100|min:10',
        ]);
 
        if($validator2->fails()){
            return response()->json(['Error'=>'La descripcion de la mesa no puede estar vacio y debe tener entre 10 y 100 carácteres'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'numero' => 'required|max:1|min:3',
        ]);
 
        if($validator3->fails()){
            return response()->json(['Error'=>'El numero de la mesa no puede estar vacio.'], 203);
        }

        if ($request->numero > 999 || $request->numero < 0 ){
            return response()->json(['Error'=>'El numero de la mesa debe estar entre 1 y 999.'], 203);
        }

        if ($request->cantidadAsientos > 20 || $request->cantidadAsientos < 2 ){
            return response()->json(['Error'=>'La cantidad de asientos no puede ser mayor a 20 o menor a 2'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $mesa->update($request->all());

        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
    }


    public function destroy($id)
    {
        $mesa = Mesa::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
