<?php

namespace App\Http\Controllers;

use App\Models\TipoEntrega;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Class TipoEntregaController
 * @package App\Http\Controllers
 */
class TipoEntregaController extends Controller
{
    public function getTipoEntrega(){
        try{
            return response()->json(TipoEntrega::all(),200);
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("tipoentrega")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }


    public function store(Request $request)
    {
        try{

        $validator0 = Validator::make($request->all(), [
            'nombreTipoEntrega' => 'required|min:4|max:40',
        ]);

        if($validator0->fails()){
            Log::channel("tipoentrega")->error("El nombre del tipo de entrega no puede estar vacío y debe tener entre 4 a 40 caracteres");
            return response()->json(['Error'=>'El nombre del tipo de entrega no puede estar vacío y debe tener entre 4 a 40 caracteres.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'nombreTipoEntrega' => 'unique:tipo_entregas',
        ]);

        if($validator1->fails()){
            Log::channel("tipoentrega")->error("El nombre del tipo de entrega debe ser único");
            return response()->json(['Error'=>'El nombre del tipo de entrega debe ser único'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("tipoentrega")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

            $tipoEntrega = TipoEntrega::create($request->all());
            Log::channel("tipoentrega")->info($tipoEntrega);
            return response($tipoEntrega, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("tipoentrega")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function show($id)
    {
        try{

        $tipoEntrega = TipoEntrega::find($id);

        if  ($id < 1){
            Log::channel("tipoentrega")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($tipoEntrega)){
            Log::channel("tipoentrega")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }
            Log::channel("tipoentrega")->info($tipoEntrega);
            return response($tipoEntrega, 200); 

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("tipoentrega")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function update(Request $request,$id)
    {
        try{
        $tipoEntrega = TipoEntrega::find($id);

        if  ($id < 1){
            Log::channel("tipoentrega")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($tipoEntrega)){
            Log::channel("tipoentrega")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [
            'nombreTipoEntrega' => 'required|min:4|max:40',
        ]);

        if($validator0->fails()){
            Log::channel("tipoentrega")->error("El nombre del tipo de entrega no puede estar vacío y debe tener entre 4 a 40 caracteres");
            return response()->json(['Error'=>'El nombre del tipo de entrega no puede estar vacío y debe tener entre 4 a 40 caracteres.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("tipoentrega")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

            $tipoEntrega->update($request->all());
            Log::channel("tipoentrega")->info($tipoEntrega);
            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
        
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Log::channel("tipoentrega")->error("Datos repetidos");
                return response()->json(['Error'=>'Los siguientes datos deben ser únicos: Tipo de Entrega.'], 203);
            }else{
                $errormessage = $e->getMessage();
                Log::channel("tipoentrega")->error($errormessage);
                return response()->json(['Error'=>$errormessage], 203);
            }
        }

    }

    public function destroy($id)
    {
        $tipoEntrega = TipoEntrega::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
