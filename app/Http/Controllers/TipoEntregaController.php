<?php

namespace App\Http\Controllers;

use App\Models\TipoEntrega;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class TipoEntregaController
 * @package App\Http\Controllers
 */
class TipoEntregaController extends Controller
{
    public function getTipoEntrega(){
        return response()->json(TipoEntrega::all(),200);
    }


    public function store(Request $request)
    {
        $validator0 = Validator::make($request->all(), [
            'nombreTipoEntrega' => 'required|min:4|max:40',
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'El nombre del tipo de entrega no puede estar vacío y debe tener entre 4 a 40 caracteres.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'nombreTipoEntrega' => 'unique:tipo_entregas',
        ]);

        if($validator1->fails()){
            return response()->json(['Error'=>'El nombre del tipo de entrega debe ser único'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $tipoEntrega = TipoEntrega::create($request->all());

        return response($tipoEntrega, 200);
    }

    public function show($id)
    {
        $tipoEntrega = TipoEntrega::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($tipoEntrega)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        return response($tipoEntrega, 200); 
    }

    public function update(Request $request,$id)
    {

        $tipoEntrega = TipoEntrega::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($tipoEntrega)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [
            'nombreTipoEntrega' => 'required|min:4|max:40',
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'El nombre del tipo de entrega no puede estar vacío y debe tener entre 4 a 40 caracteres.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        try {

            $tipoEntrega->update($request->all());

            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
        
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return response()->json(['Error'=>'Los siguientes datos deben ser únicos: Tipo de Entrega.'], 203);
            }
        }

    }

    public function destroy($id)
    {
        $tipoEntrega = TipoEntrega::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
