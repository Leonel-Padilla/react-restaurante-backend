<?php

namespace App\Http\Controllers;

use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class TipoDocumentoController extends Controller
{
    //
    public function getTipoDocumento(){
        return response()->json(TipoDocumento::all(),200);
    }
 
    //
    public function store(Request $request)
    {
        if (strlen($request->nombreDocumento) === 0){
            return response()->json(['Error'=>'El nombre no puede estar vacio'], 203);
        }
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
        if (strlen($request->nombreDocumento) === 0){
            return response()->json(['Error'=>'El nombre no puede estar vacio'], 203);
        }
        if ($request->estado > 1 || $request->estado < 0 ){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $tipoDocumento->update($request->all());

        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
    }

    //
    public function destroy($id)
    {
        $tipoDocumento = TipoDocumento::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
