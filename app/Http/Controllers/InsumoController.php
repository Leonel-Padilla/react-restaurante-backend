<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class InsumoController
 * @package App\Http\Controllers
 */
class InsumoController extends Controller
{

    public function getInsumo(){
        return response()->json(Insumo::all(),200);
    }

    //
    public function getByInsumoNombre($nombreInsumo){


        $Insumo = Insumo::findByInsumoNombre($nombreInsumo);

        if(empty($Insumo)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
        return response($Insumo, 200);
    }


    public function getByProveedorId($proveedorId){


        $Insumo = Insumo::findByProveedorId($proveedorId);
    
        if(empty($Insumo)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
        return response($Insumo, 200);
    }
   
    public function store(Request $request)
    {

        $validator0 = Validator::make($request->all(), [ 
            'insumoNombre' => 'unique:insumos',
        ]);
 
        if($validator0->fails()){
            return response()->json(['Error'=>'No se puede repetir el nombre del insumo'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'insumoNombre' => 'required|max:40|min:3',
        ]);
 
        if($validator1->fails()){
            return response()->json(['Error'=>'El nombre del insumo no puede estar vacío y debe tener entre 3 y 40 caracteres'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'insumoDescripcion' => 'required|max:100|min:10',
        ]);
 
        if($validator2->fails()){
            return response()->json(['Error'=>'La descripción del insumo no puede estar vacío y debe tener entre 10 y 100 caracteres'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'cantidad' => 'required|max:3|min:1',
        ]);
 
        if($validator3->fails()){
            return response()->json(['Error'=>'La cantidad actual no puede estar vacía y debe estar entre 0 y 999'], 203);
        }

        $validator4 = Validator::make($request->all(), [ 
            'cantidadMin' => 'required|max:3|min:1',
        ]);
 
        if($validator4->fails()){
            return response()->json(['Error'=>'La cantidad mínima no puede estar vacía y debe estar entre 0 y 999'], 203);
        }

        $validator5 = Validator::make($request->all(), [ 
            'cantidadMax' => 'required|max:3|min:1',
        ]);
 
        if($validator5->fails()){
            return response()->json(['Error'=>'La cantidad máxima no puede estar vacía y debe estar entre 1 y 999'], 203);
        }

        $validator6 = Validator::make($request->all(), [
            'proveedorId' => 'required'
        ]);

        if($validator6->fails()){
            return response()->json(['Error'=>'El Id del proveedor no puede estar vacía.'], 203);
        }

        if ($request->cantidad > 999 || $request->cantidad < 0 ){
            return response()->json(['Error'=>'La cantidad actual no puede ser mayor a 999 o menor a 0'], 203);
        }

        if ($request->cantidadMax > 999 || $request->cantidadMax <= 0 ){
            return response()->json(['Error'=>'La cantidad máxima no puede ser mayor a 999 o menor a 1'], 203);
        }

        if ($request->cantidadMin > 999 || $request->cantidadMin < 0 ){
            return response()->json(['Error'=>'La cantidad mínima no puede ser mayor a 999 o menor a 0'], 203);
        }

        if ($request->cantidadMax < $request->cantidadMin || $request->cantidadMax == $request->cantidadMin){
            return response()->json(['Error'=>'La cantidad máxima no puede ser menor o igual a la cantidad mínima'], 203);
        }

        if ($request->cantidadMin > $request->cantidadMax || $request->cantidadMin == $request->cantidadMax){
            return response()->json(['Error'=>'La cantidad mínima no puede ser mayor o igual a la cantidad máxima'], 203);
        }

        if ($request->cantidad < $request->cantidadMin){
            return response()->json(['Error'=>'La cantidad actual no puede ser menor a la cantidad mínima'], 203);
        }

        if ($request->cantidad > $request->cantidadMax){
            return response()->json(['Error'=>'La cantidad actual no puede ser mayor a la cantidad máxima'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $insumo = Insumo::create($request->all());

        return response($insumo, 200);
    }


    public function show($id)
    {
        $insumo = Insumo::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($insumo)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        return response($insumo, 200); 
    }


    public function update(Request $request, $id)
    { 
        $insumo = Insumo::find($id);
        
        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero.'], 203);
        }

        if  (is_null($insumo)){
            return response()->json(['Error'=>'No existe este registro.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'insumoNombre' => 'required|max:40|min:3',
        ]);
 
        if($validator1->fails()){
            return response()->json(['Error'=>'El nombre del insumo no puede estar vacio y debe tener entre 3 y 40 carácteres'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'insumoDescripcion' => 'required|max:100|min:10',
        ]);
 
        if($validator2->fails()){
            return response()->json(['Error'=>'La descripcion del insumo no puede estar vacio y debe tener entre 10 y 100 carácteres'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'cantidad' => 'required|max:3|min:1',
        ]);
 
        if($validator3->fails()){
            return response()->json(['Error'=>'La cantidad no puede estar vacía y debe estar entre 0 y 999'], 203);
        }

        $validator4 = Validator::make($request->all(), [ 
            'cantidadMin' => 'required|max:3|min:1',
        ]);
 
        if($validator4->fails()){
            return response()->json(['Error'=>'La cantidad mínima no puede estar vacía y debe estar entre 0 y 999'], 203);
        }

        $validator5 = Validator::make($request->all(), [ 
            'cantidadMax' => 'required|max:3|min:1',
        ]);
 
        if($validator5->fails()){
            return response()->json(['Error'=>'La cantidad máxima no puede estar vacía y debe estar entre 0 y 999'], 203);
        }

        $validator6 = Validator::make($request->all(), [
            'proveedorId' => 'required'
        ]);

        if($validator6->fails()){
            return response()->json(['Error'=>'El Id del proveedor no puede estar vacío.'], 203);
        }

        if ($request->cantidad > 999 || $request->cantidad < 0 ){
            return response()->json(['Error'=>'La cantidad actual no puede ser mayor a 999 o menor a 0'], 203);
        }

        if ($request->cantidadMax > 999 || $request->cantidadMax <= 0 ){
            return response()->json(['Error'=>'La cantidad máxima no puede ser mayor a 999 o menor a 1'], 203);
        }

        if ($request->cantidadMin > 999 || $request->cantidadMin < 0 ){
            return response()->json(['Error'=>'La cantidad mínima no puede ser mayor a 999 o menor a 0'], 203);
        }

        if ($request->cantidadMax < $request->cantidadMin || $request->cantidadMax == $request->cantidadMin){
            return response()->json(['Error'=>'La cantidad máxima no puede ser menor o igual a la cantidad mínima'], 203);
        }

        if ($request->cantidadMin > $request->cantidadMax || $request->cantidadMin == $request->cantidadMax){
            return response()->json(['Error'=>'La cantidad mínima no puede ser mayor o igual a la cantidad máxima'], 203);
        }

        if ($request->cantidad < $request->cantidadMin){
            return response()->json(['Error'=>'La cantidad actual no puede ser menor a la cantidad mínima'], 203);
        }

        if ($request->cantidad > $request->cantidadMax){
            return response()->json(['Error'=>'La cantidad actual no puede ser mayor a la cantidad máxima'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $insumo->update($request->all());

        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
    }


    public function destroy($id)
    {
        $insumo = Insumo::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
