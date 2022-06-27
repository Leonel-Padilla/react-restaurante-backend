<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Class ComentarioController
 * @package App\Http\Controllers
 */
class ComentarioController extends Controller{

    public function getComentario(){
        Log::channel("comentario")->info("Registros encontrado");
        return response()->json(Comentario::all(),200);
    }

    public function getBySucursalId($sucursalId){


        $Comentario = Comentario::findBySucursalId($sucursalId);

        if(empty($Comentario)){
            Log::channel("comentario")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
        Log::channel("comentario")->info($Comentario);
        return response($Comentario, 200);
    }

    public function store(Request $request)
    {
        
        $validator0 = Validator::make($request->all(), [ 
            'sucursalId' => 'required',
        ]);
 
        if($validator0->fails()){
            Log::channel("comentario")->error("La sucursal Id no puede estar vacío");
            return response()->json(['Error'=>'La sucursal Id no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'descripcion' => 'required|min:10|max:100',
        ]);
 
        if($validator1->fails()){
            Log::channel("comentario")->error("La descripcion no puede estar vacía y debe tener entre 10 a 100 caracteres");
            return response()->json(['Error'=>'La descripcion no puede estar vacía y debe tener entre 10 a 100 caracteres.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'telCliente' => 'required|min:8|max:8|starts_with:2,3,7,8,9',
        ]);
 
        if($validator2->fails()){
            Log::channel("comentario")->error("El teléfono debe tener 8 dígitos y debe comenzar con 2, 3, 7, 8 o un 9");
            return response()->json(['Error'=>'El teléfono debe tener 8 dígitos y debe comenzar con 2, 3, 7, 8 o un 9.'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'correoCliente' => 'required|email|min:10|max:50',
        ]);
 
        if($validator3->fails()){
            Log::channel("comentario")->error("El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com");
            return response()->json(['Error'=>'El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com'], 203);
        }

        if (!str_contains($request->correoCliente, "@") || !str_contains($request->correoCliente, ".")){
            Log::channel("comentario")->error("El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com");
            return response()->json(['Error'=>'El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("comentario")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $comentario = Comentario::create($request->all());

        Log::channel("comentario")->info($comentario);
        return response($comentario, 200);
    }

    public function show($id)
    {
        $comentario = Comentario::find($id);
        
        if  ($id < 1){
            Log::channel("comentario")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero.'], 203);
        }

        if  (is_null($comentario)){
            Log::channel("comentario")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro.'], 203);
        }

        Log::channel("comentario")->info($comentario);
        return response($comentario, 200); 
    }

    public function update(Request $request, $id){

        $comentario = Comentario::find($id);
        
        if  ($id < 1){
            Log::channel("comentario")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero.'], 203);
        }

        if  (is_null($comentario)){
            Log::channel("comentario")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro.'], 203);
        }
        
        $validator0 = Validator::make($request->all(), [ 
            'sucursalId' => 'required',
        ]);
 
        if($validator0->fails()){
            Log::channel("comentario")->error("La sucursal Id no puede estar vacío");
            return response()->json(['Error'=>'La sucursal Id no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'descripcion' => 'required|min:10|max:100',
        ]);
 
        if($validator1->fails()){
            Log::channel("comentario")->error("La descripcion no puede estar vacía y debe tener entre 10 a 100 caracteres");
            return response()->json(['Error'=>'La descripcion no puede estar vacía y debe tener entre 10 a 100 caracteres.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'telCliente' => 'required|min:8|max:8|starts_with:2,3,7,8,9',
        ]);
 
        if($validator2->fails()){
            Log::channel("comentario")->error("El teléfono debe tener 8 dígitos y debe comenzar con 2, 3, 7, 8 o un 9");
            return response()->json(['Error'=>'El teléfono debe tener 8 dígitos y debe comenzar con 2, 3, 7, 8 o un 9.'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'correoCliente' => 'required|min:10|max:50',
        ]);
 
        if($validator3->fails()){
            Log::channel("comentario")->error("El correo no puede estar vacío y debe tener entre 10 a 50 caracteres");
            return response()->json(['Error'=>'El correo no puede estar vacío y debe tener entre 10 a 50 caracteres.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("comentario")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $comentario->update($request->all());
        Log::channel("comentario")->info($comentario);
        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);

    }

    public function destroy($id)
    {
        $comentario = Comentario::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
