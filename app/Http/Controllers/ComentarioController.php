<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class ComentarioController
 * @package App\Http\Controllers
 */
class ComentarioController extends Controller{

    public function getComentario(){
        return response()->json(Comentario::all(),200);
    }

    public function getBySucursalId($sucursalId){


        $Comentario = Comentario::findBySucursalId($sucursalId);

        if(empty($Comentario)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
        return response($Comentario, 200);
    }

    public function store(Request $request)
    {
        
        $validator0 = Validator::make($request->all(), [ 
            'sucursalId' => 'required',
        ]);
 
        if($validator0->fails()){
            return response()->json(['Error'=>'La sucursal Id no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'descripcion' => 'required|min:10|max:100',
        ]);
 
        if($validator1->fails()){
            return response()->json(['Error'=>'La descripcion no puede estar vacía y debe tener entre 10 a 100 caracteres.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'telCliente' => 'required|min:8|max:8|starts_with:2,3,7,8,9',
        ]);
 
        if($validator2->fails()){
            return response()->json(['Error'=>'El teléfono debe tener 8 dígitos y debe comenzar con 2, 3, 7, 8 o un 9.'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'correoCliente' => 'required|email|min:10|max:50',
        ]);
 
        if($validator3->fails()){
            return response()->json(['Error'=>'El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com'], 203);
        }

        if (!str_contains($request->correoCliente, "@") || !str_contains($request->correoCliente, ".")){
            return response()->json(['Error'=>'El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $comentario = Comentario::create($request->all());

        return response($comentario, 200);
    }

    public function show($id)
    {
        $comentario = Comentario::find($id);
        
        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero.'], 203);
        }

        if  (is_null($comentario)){
            return response()->json(['Error'=>'No existe este registro.'], 203);
        }

        return response($comentario, 200); 
    }

    public function update(Request $request, $id){

        $comentario = Comentario::find($id);
        
        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero.'], 203);
        }

        if  (is_null($comentario)){
            return response()->json(['Error'=>'No existe este registro.'], 203);
        }
        
        $validator0 = Validator::make($request->all(), [ 
            'sucursalId' => 'required',
        ]);
 
        if($validator0->fails()){
            return response()->json(['Error'=>'La sucursal Id no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'descripcion' => 'required|min:10|max:100',
        ]);
 
        if($validator1->fails()){
            return response()->json(['Error'=>'La descripcion no puede estar vacía y debe tener entre 10 a 100 caracteres.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'telCliente' => 'required|min:8|max:8|starts_with:2,3,7,8,9',
        ]);
 
        if($validator2->fails()){
            return response()->json(['Error'=>'El teléfono debe tener 8 dígitos y debe comenzar con 2, 3, 7, 8 o un 9.'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'correoCliente' => 'required|min:10|max:50',
        ]);
 
        if($validator3->fails()){
            return response()->json(['Error'=>'El correo no puede estar vacío y debe tener entre 10 a 50 caracteres.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $comentario->update($request->all());

        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);

    }

    public function destroy($id)
    {
        $comentario = Comentario::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
