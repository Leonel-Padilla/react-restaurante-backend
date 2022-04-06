<?php

namespace App\Http\Controllers;

use App\Models\TipoDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoDocumentoController extends Controller
{
    //
    public function getTipoDocumento(){
        return response()->json(TipoDocumento::all(),200);
    }
 
    //
    public function store(Request $request)
    {
        $validator0 = Validator::make($request->all(), [
            'nombreDocumento' => 'required'
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'El nombre no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'nombreDocumento' => 'unique:tipo_documentos'
        ]);

        if($validator1->fails()){
            return response()->json(['Error'=>'El nombre del documento debe ser único.'], 203);
        }
        //
        
        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $tipoDocumento = TipoDocumento::create($request->all());

        return response($tipoDocumento, 200);
    }

    //
    public function show($id)
    {
        $tipoDocumento = TipoDocumento::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($tipoDocumento)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        return response($tipoDocumento, 200);
    }

    //
    public function update(Request $request, $id)
    {   
        $tipoDocumento = TipoDocumento::find($id);
        //Validaciones Busqueda
        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }
        if  (is_null($tipoDocumento)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        //Validaciones Actualizar
        $validator0 = Validator::make($request->all(), [
            'nombreDocumento' => 'required'
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'El nombre no puede estar vacío.'], 203);
        }

        if ($request->estado > 1 || $request->estado < 0 ){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        try {

            $tipoDocumento->update($request->all());

            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);

        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return response()->json(['Error'=>'Los siguientes datos deben ser únicos: Nombre Documento.'], 203);
            }
        }

    }

    //
    public function destroy($id)
    {
        $tipoDocumento = TipoDocumento::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
