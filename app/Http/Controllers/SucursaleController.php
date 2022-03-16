<?php

namespace App\Http\Controllers;

use App\Models\Sucursale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class SucursaleController
 * @package App\Http\Controllers
 */
class SucursaleController extends Controller
{

    public function getSucursal(){
        return response()->json(Sucursale::all(),200);
    }


    public function store(Request $request)
    {
        $validator0 = Validator::make($request->all(), [ 
            'sucursalDireccion' => 'required|min:4|max:100',
        ]);
 
        if($validator0->fails()){
            return response()->json(['Error'=>'No puede estar vacia la dirección del sucursal'], 203);
        }

        $sucursal = Sucursale::create($request->all());

        return response($sucursal, 200);
    }


    public function show($id)
    {
        $sucursal = Sucursale::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($sucursal)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        return response($sucursal, 200);
    }


    public function update(Request $request, $id)
    {   
        $sucursal = Sucursale::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($sucursal)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [ 
            'sucursalDireccion' => 'required|min:4|max:100',
        ]);
 
        if($validator0->fails()){
            return response()->json(['Error'=>'No puede estar vacia la dirección del sucursal'], 203);
        }

        $sucursal->update($request->all());

        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
    }


    public function destroy($id)
    {
        $sucursal = Sucursale::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}