<?php

namespace App\Http\Controllers;

use App\Models\Sucursale;
use Illuminate\Http\Request;

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

        $sucursal = Sucursale::create($request->all());

        return response($sucursal, 200);
    }


    public function show($id)
    {
        $sucursal = Sucursale::find($id);

        return response($sucursal, 200);
    }


    public function update(Request $request, $id)
    {   
        $sucursal = Sucursale::find($id);

        $sucursal->update($request->all());

        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
    }


    public function destroy($id)
    {
        $sucursal = Sucursale::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
