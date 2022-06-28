<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Class InsumoController
 * @package App\Http\Controllers
 */
class InsumoController extends Controller
{

    public function getInsumo(){
        try{
            return response()->json(Insumo::all(),200);
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("insumo")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    //
    public function getByInsumoNombre($nombreInsumo){

        try{
        $Insumo = Insumo::findByInsumoNombre($nombreInsumo);

        if(empty($Insumo)){
            Log::channel("insumo")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
            Log::channel("insumo")->info($Insumo);
            return response($Insumo, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("insumo")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }


    public function getByProveedorId($proveedorId){
        try{

        $Insumo = Insumo::findByProveedorId($proveedorId);
    
        if(empty($Insumo)){
            Log::channel("insumo")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
            Log::channel("insumo")->info($Insumo);
            return response($Insumo, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("insumo")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }
   
    public function store(Request $request)
    {
        try{

        $validator0 = Validator::make($request->all(), [ 
            'insumoNombre' => 'unique:insumos',
        ]);
 
        if($validator0->fails()){
            Log::channel("insumo")->error("No se puede repetir el nombre del insumo");
            return response()->json(['Error'=>'No se puede repetir el nombre del insumo'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'insumoNombre' => 'required|max:40|min:3',
        ]);
 
        if($validator1->fails()){
            Log::channel("insumo")->error("El nombre del insumo no puede estar vacío y debe tener entre 3 y 40 caracteres");
            return response()->json(['Error'=>'El nombre del insumo no puede estar vacío y debe tener entre 3 y 40 caracteres'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'insumoDescripcion' => 'required|max:100|min:10',
        ]);
 
        if($validator2->fails()){
            Log::channel("insumo")->error("La descripción del insumo no puede estar vacío y debe tener entre 10 y 100 caracteres");
            return response()->json(['Error'=>'La descripción del insumo no puede estar vacío y debe tener entre 10 y 100 caracteres'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'cantidad' => 'required|max:3|min:1',
        ]);
 
        if($validator3->fails()){
            Log::channel("insumo")->error("La cantidad actual no puede estar vacía y debe estar entre 0 y 999");
            return response()->json(['Error'=>'La cantidad actual no puede estar vacía y debe estar entre 0 y 999'], 203);
        }

        $validator4 = Validator::make($request->all(), [ 
            'cantidadMin' => 'required|max:3|min:1',
        ]);
 
        if($validator4->fails()){
            Log::channel("insumo")->error("La cantidad mínima no puede estar vacía y debe estar entre 0 y 999");
            return response()->json(['Error'=>'La cantidad mínima no puede estar vacía y debe estar entre 0 y 999'], 203);
        }

        $validator5 = Validator::make($request->all(), [ 
            'cantidadMax' => 'required|max:3|min:1',
        ]);
 
        if($validator5->fails()){
            Log::channel("insumo")->error("La cantidad máxima no puede estar vacía y debe estar entre 1 y 999");
            return response()->json(['Error'=>'La cantidad máxima no puede estar vacía y debe estar entre 1 y 999'], 203);
        }

        $validator6 = Validator::make($request->all(), [
            'proveedorId' => 'required'
        ]);

        if($validator6->fails()){
            Log::channel("insumo")->error("El Id del proveedor no puede estar vacía");
            return response()->json(['Error'=>'El Id del proveedor no puede estar vacía.'], 203);
        }

        if ($request->cantidad > 999 || $request->cantidad < 0 ){
            Log::channel("insumo")->error("La cantidad actual no puede ser mayor a 999 o menor a 0");
            return response()->json(['Error'=>'La cantidad actual no puede ser mayor a 999 o menor a 0'], 203);
        }

        if ($request->cantidadMax > 999 || $request->cantidadMax <= 0 ){
            Log::channel("insumo")->error("La cantidad máxima no puede ser mayor a 999 o menor a 1");
            return response()->json(['Error'=>'La cantidad máxima no puede ser mayor a 999 o menor a 1'], 203);
        }

        if ($request->cantidadMin > 999 || $request->cantidadMin < 0 ){
            Log::channel("insumo")->error("La cantidad mínima no puede ser mayor a 999 o menor a 0");
            return response()->json(['Error'=>'La cantidad mínima no puede ser mayor a 999 o menor a 0'], 203);
        }

        if ($request->cantidadMax < $request->cantidadMin || $request->cantidadMax == $request->cantidadMin){
            Log::channel("insumo")->error("La cantidad máxima no puede ser menor o igual a la cantidad mínima");
            return response()->json(['Error'=>'La cantidad máxima no puede ser menor o igual a la cantidad mínima'], 203);
        }

        if ($request->cantidadMin > $request->cantidadMax || $request->cantidadMin == $request->cantidadMax){
            Log::channel("insumo")->error("La cantidad mínima no puede ser mayor o igual a la cantidad máxima");
            return response()->json(['Error'=>'La cantidad mínima no puede ser mayor o igual a la cantidad máxima'], 203);
        }

        if ($request->cantidad < $request->cantidadMin){
            Log::channel("insumo")->error("La cantidad actual no puede ser menor a la cantidad mínima");
            return response()->json(['Error'=>'La cantidad actual no puede ser menor a la cantidad mínima'], 203);
        }

        if ($request->cantidad > $request->cantidadMax){
            Log::channel("insumo")->error("La cantidad actual no puede ser mayor a la cantidad máxima");
            return response()->json(['Error'=>'La cantidad actual no puede ser mayor a la cantidad máxima'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("insumo")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

            $insumo = Insumo::create($request->all());
            Log::channel("insumo")->info($insumo);
            return response($insumo, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("insumo")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }


    public function show($id)
    {
        try{

        $insumo = Insumo::find($id);

        if  ($id < 1){
            Log::channel("insumo")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($insumo)){
            Log::channel("insumo")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }
            Log::channel("insumo")->info($insumo);
            return response($insumo, 200); 

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("insumo")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }


    public function update(Request $request, $id)
    { 
        try{

        $insumo = Insumo::find($id);
        
        if  ($id < 1){
            Log::channel("insumo")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero.'], 203);
        }

        if  (is_null($insumo)){
            Log::channel("insumo")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'insumoNombre' => 'required|max:40|min:3',
        ]);
 
        if($validator1->fails()){
            Log::channel("insumo")->error("El nombre del insumo no puede estar vacio y debe tener entre 3 y 40 carácteres");
            return response()->json(['Error'=>'El nombre del insumo no puede estar vacio y debe tener entre 3 y 40 carácteres'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'insumoDescripcion' => 'required|max:100|min:10',
        ]);
 
        if($validator2->fails()){
            Log::channel("insumo")->error("La descripcion del insumo no puede estar vacio y debe tener entre 10 y 100 carácteres");
            return response()->json(['Error'=>'La descripcion del insumo no puede estar vacio y debe tener entre 10 y 100 carácteres'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'cantidad' => 'required|max:3|min:1',
        ]);
 
        if($validator3->fails()){
            Log::channel("insumo")->error("La cantidad no puede estar vacía y debe estar entre 0 y 999");
            return response()->json(['Error'=>'La cantidad no puede estar vacía y debe estar entre 0 y 999'], 203);
        }

        $validator4 = Validator::make($request->all(), [ 
            'cantidadMin' => 'required|max:3|min:1',
        ]);
 
        if($validator4->fails()){
            Log::channel("insumo")->error("La cantidad mínima no puede estar vacía y debe estar entre 0 y 999");
            return response()->json(['Error'=>'La cantidad mínima no puede estar vacía y debe estar entre 0 y 999'], 203);
        }

        $validator5 = Validator::make($request->all(), [ 
            'cantidadMax' => 'required|max:3|min:1',
        ]);
 
        if($validator5->fails()){
            Log::channel("insumo")->error("La cantidad máxima no puede estar vacía y debe estar entre 0 y 999");
            return response()->json(['Error'=>'La cantidad máxima no puede estar vacía y debe estar entre 0 y 999'], 203);
        }

        $validator6 = Validator::make($request->all(), [
            'proveedorId' => 'required'
        ]);

        if($validator6->fails()){
            Log::channel("insumo")->error("El Id del proveedor no puede estar vacío");
            return response()->json(['Error'=>'El Id del proveedor no puede estar vacío.'], 203);
        }

        if ($request->cantidad > 999 || $request->cantidad < 0 ){
            Log::channel("insumo")->error("La cantidad actual no puede ser mayor a 999 o menor a 0");
            return response()->json(['Error'=>'La cantidad actual no puede ser mayor a 999 o menor a 0'], 203);
        }

        if ($request->cantidadMax > 999 || $request->cantidadMax <= 0 ){
            Log::channel("insumo")->error("La cantidad máxima no puede ser mayor a 999 o menor a 1");
            return response()->json(['Error'=>'La cantidad máxima no puede ser mayor a 999 o menor a 1'], 203);
        }

        if ($request->cantidadMin > 999 || $request->cantidadMin < 0 ){
            Log::channel("insumo")->error("La cantidad mínima no puede ser mayor a 999 o menor a 0");
            return response()->json(['Error'=>'La cantidad mínima no puede ser mayor a 999 o menor a 0'], 203);
        }

        if ($request->cantidadMax < $request->cantidadMin || $request->cantidadMax == $request->cantidadMin){
            Log::channel("insumo")->error("La cantidad máxima no puede ser menor o igual a la cantidad mínima");
            return response()->json(['Error'=>'La cantidad máxima no puede ser menor o igual a la cantidad mínima'], 203);
        }

        if ($request->cantidadMin > $request->cantidadMax || $request->cantidadMin == $request->cantidadMax){
            Log::channel("insumo")->error("La cantidad mínima no puede ser mayor o igual a la cantidad máxima");
            return response()->json(['Error'=>'La cantidad mínima no puede ser mayor o igual a la cantidad máxima'], 203);
        }

        if ($request->cantidad < $request->cantidadMin){
            Log::channel("insumo")->error("La cantidad actual no puede ser menor a la cantidad mínima");
            return response()->json(['Error'=>'La cantidad actual no puede ser menor a la cantidad mínima'], 203);
        }

        if ($request->cantidad > $request->cantidadMax){
            Log::channel("insumo")->error("La cantidad actual no puede ser mayor a la cantidad máxima");
            return response()->json(['Error'=>'La cantidad actual no puede ser mayor a la cantidad máxima'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("insumo")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

            $insumo->update($request->all());
            Log::channel("insumo")->info($insumo);
            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
        
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Log::channel("insumo")->error("Datos repetidos");
                return response()->json(['Error'=>'Los siguientes datos deben ser únicos: Nombre del Insumo.'], 203);
            }else{
                $errormessage = $e->getMessage();
                Log::channel("insumo")->error($errormessage);
                return response()->json(['Error'=>$errormessage], 203);
            }
        }

    }


    public function destroy($id)
    {
        $insumo = Insumo::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
