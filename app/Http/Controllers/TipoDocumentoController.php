<?php

namespace App\Http\Controllers;

use App\Models\TipoDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class TipoDocumentoController extends Controller
{
    //
    public function getTipoDocumento(){
        Log::channel("tipodocumento")->info("Registros encontrado");
        return response()->json(TipoDocumento::all(),200);
    }
 
    //
    public function store(Request $request)
    {
        $validator0 = Validator::make($request->all(), [
            'nombreDocumento' => 'required'
        ]);

        if($validator0->fails()){
            Log::channel("tipodocumento")->error("El nombre no puede estar vacío");
            return response()->json(['Error'=>'El nombre no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'nombreDocumento' => 'unique:tipo_documentos'
        ]);

        if($validator1->fails()){
            Log::channel("tipodocumento")->error("El nombre del documento debe ser único");
            return response()->json(['Error'=>'El nombre del documento debe ser único.'], 203);
        }
        //
        
        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("tipodocumento")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $tipoDocumento = TipoDocumento::create($request->all());
        Log::channel("tipodocumento")->info($tipoDocumento);
        return response($tipoDocumento, 200);
    }

    //
    public function show($id)
    {
        $tipoDocumento = TipoDocumento::find($id);

        if  ($id < 1){
            Log::channel("tipodocumento")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($tipoDocumento)){
            Log::channel("tipodocumento")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }
        Log::channel("tipodocumento")->info($tipoDocumento);
        return response($tipoDocumento, 200);
    }

    //
    public function update(Request $request, $id)
    {   
        $tipoDocumento = TipoDocumento::find($id);
        //Validaciones Busqueda
        if  ($id < 1){
            Log::channel("tipodocumento")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }
        if  (is_null($tipoDocumento)){
            Log::channel("tipodocumento")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        //Validaciones Actualizar
        $validator0 = Validator::make($request->all(), [
            'nombreDocumento' => 'required'
        ]);

        if($validator0->fails()){
            Log::channel("tipodocumento")->error("El nombre no puede estar vacío");
            return response()->json(['Error'=>'El nombre no puede estar vacío.'], 203);
        }

        if ($request->estado > 1 || $request->estado < 0 ){
            Log::channel("tipodocumento")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        try {

            $tipoDocumento->update($request->all());
            Log::channel("tipodocumento")->info($tipoDocumento);
            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);

        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Log::channel("tipodocumento")->error("Datos repetidos");
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
