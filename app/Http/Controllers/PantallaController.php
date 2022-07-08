<?php

namespace App\Http\Controllers;

use App\Models\Pantalla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Class PantallaController
 * @package App\Http\Controllers
 */
class PantallaController extends Controller
{
    public function getPantalla(){
        try{
            return response()->json(Pantalla::all(),200);
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("pantalla")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function getByPantallaNombre($nombrePantalla){
        try{
            $pantalla = Pantalla::findByPantallaNombre($nombrePantalla);
            if(empty($pantalla)){
                Log::channel("pantalla")->error("Registro no encontrado");
                return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
            }
            Log::channel("pantalla")->info($pantalla);
            return response($pantalla, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("pantalla")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }
   
    public function store(Request $request)
    {
        try{

        $validator1 = Validator::make($request->all(), [ 
            'nombrePantalla' => 'unique:pantallas',
        ]);
     
        if($validator1->fails()){
            Log::channel("pantalla")->error("No se puede repetir el nombre de la pantalla");
            return response()->json(['Error'=>'No se puede repetir el nombre de la pantalla'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'nombrePantalla' => 'required',
        ]);
     
        if($validator2->fails()){
            Log::channel("pantalla")->error("El nombre de la pantalla no puede estar vacío");
            return response()->json(['Error'=>'El nombre de la pantalla no puede estar vacío'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("pantalla")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $pantalla = Pantalla::create($request->all());
        Log::channel("pantalla")->info($pantalla);
        return response($pantalla, 200);

    }catch(\Illuminate\Database\QueryException $e){
        $errorCode = $e->getMessage();
        Log::channel("pantalla")->error($errorCode);
        return response()->json(['Error'=>$errorCode], 203);
        }
    }

    public function show($id)
    {
        $pantalla = Pantalla::find($id);

        if  ($id < 1){
            Log::channel("pantalla")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($pantalla)){
            Log::channel("pantalla")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }
    }

    public function update(Request $request, $id)
    {
        try{

            $pantalla = Pantalla::find($id);

            if  ($id < 1){
                Log::channel("pantalla")->error("El Id no puede ser menor o igual a cero");
                return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
            }
    
            if  (is_null($pantalla)){
                Log::channel("pantalla")->error("No existe este registro");
                return response()->json(['Error'=>'No existe este registro'], 203);
            }
    
            $validator2 = Validator::make($request->all(), [ 
                'nombrePantalla' => 'required',
            ]);
         
            if($validator2->fails()){
                Log::channel("pantalla")->error("El nombre de la pantalla no puede estar vacío");
                return response()->json(['Error'=>'El nombre de la pantalla no puede estar vacío'], 203);
            }
    
            if ($request->estado > 1|| $request->estado < 0){
                Log::channel("pantalla")->error("El estado solo puede ser 1 o 0");
                return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
            }

            $pantalla->update($request->all());
            Log::channel("pantalla")->info($pantalla);
            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Log::channel("pantalla")->error("Datos repetidos");
                return response()->json(['Error'=>'Los siguientes datos deben ser únicos: Nombre Pantalla.'], 203);
            }else{
                $errorCode = $e->getMessage();
                Log::channel("pantalla")->error($errorCode);
                return response()->json(['Error'=>$errorCode], 203);
            }
        }
    }


    public function destroy($id)
    {
        $pantalla = Pantalla::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
