<?php

namespace App\Http\Controllers;

use App\Models\ParametrosFactura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class ParametrosFacturaController
 * @package App\Http\Controllers
 */
class ParametrosFacturaController extends Controller
{

    public function getParametrosFactura(){
        return response()->json(ParametrosFactura::all(),200);
    }
  
    public function store(Request $request)
    {
        $validator0 = Validator::make($request->all(), [
            'cai_Restaurante' => 'required|min:32|max:32',
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'El CAI del restaurante no puede estar vacío y debe tener 32 caracteres.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'rtn_Restaurante' => 'required|min:14|max:14',
        ]);

        if($validator1->fails()){
            return response()->json(['Error'=>'El RTN del restaurante no puede estar vacío y debe tener 14 digitos.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $parametrosFactura = ParametrosFactura::create($request->all());

        return response($parametrosFactura, 200);
    }

    public function show($id)
    {
        $parametrosFactura = ParametrosFactura::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($parametrosFactura)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        return response($parametrosFactura, 200); 
    }

    public function update(Request $request,$id)
    {
        $parametrosFactura = ParametrosFactura::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($parametrosFactura)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [
            'cai_Restaurante' => 'required|min:32|max:32',
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'El CAI del restaurante no puede estar vacío y debe tener 32 caracteres.'], 203);
        }

        $validator1 = Validator::make($request->all(), [
            'rtn_Restaurante' => 'required|min:14|max:14',
        ]);

        if($validator1->fails()){
            return response()->json(['Error'=>'El RTN del restaurante no puede estar vacío y debe tener 14 digitos.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $parametrosFactura->update($request->all());

        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
    }

    public function destroy($id)
    {
        $parametrosFactura = ParametrosFactura::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
