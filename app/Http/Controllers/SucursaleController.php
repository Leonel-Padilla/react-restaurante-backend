<?php

namespace App\Http\Controllers;

use App\Models\Sucursale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Class SucursaleController
 * @package App\Http\Controllers
 */
class SucursaleController extends Controller
{

    public function getSucursal(){
        Log::channel("sucursal")->info("Registros encontrado");
        return response()->json(Sucursale::all(),200);
    }

    public function getBySucursalNombre($nombreSucursal){

        $sucursal = Sucursale::findBySucursalNombre($nombreSucursal);

        if(empty($sucursal)){
            Log::channel("sucursal")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
        Log::channel("sucursal")->info($sucursal);
        return response($sucursal, 200);
    }

    public function getBySucursalEncargado($empleadoId){

        $sucursal = Sucursale::findBySucursalEncargado($empleadoId);

        if(empty($sucursal)){
            Log::channel("sucursal")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
        Log::channel("sucursal")->info($sucursal);
        return response($sucursal, 200);
    }



    public function store(Request $request)
    {
        $validator0 = Validator::make($request->all(), [ 
            'sucursalDireccion' => 'required|min:10|max:100',
        ]);
 
        if($validator0->fails()){
            Log::channel("sucursal")->error("No puede estar vacía la dirección del sucursal y debe tener entre 10 a 100 caracteres");
            return response()->json(['Error'=>'No puede estar vacía la dirección del sucursal y debe tener entre 10 a 100 caracteres'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'sucursalNombre' => 'required|min:4|max:40',
        ]);
 
        if($validator1->fails()){
            Log::channel("sucursal")->error("No puede estar vacía el nombre del sucursal y debe tener entre 4 a 40 caracteres");
            return response()->json(['Error'=>'No puede estar vacía el nombre del sucursal y debe tener entre 4 a 40 caracteres.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'sucursalNombre' => 'unique:sucursales',
        ]);
 
        if($validator2->fails()){
            Log::channel("sucursal")->error("El nombre del sucursal debe ser único");
            return response()->json(['Error'=>'El nombre del sucursal debe ser único.'], 203);
        }

        $sucursal = Sucursale::create($request->all());
        Log::channel("sucursal")->info($sucursal);
        return response($sucursal, 200);
    }


    public function show($id)
    {
        $sucursal = Sucursale::find($id);

        if  ($id < 1){
            Log::channel("sucursal")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($sucursal)){
            Log::channel("sucursal")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }
        Log::channel("sucursal")->info($sucursal);
        return response($sucursal, 200);
    }


    public function update(Request $request, $id)
    {   
        $sucursal = Sucursale::find($id);

        if  ($id < 1){
            Log::channel("sucursal")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($sucursal)){
            Log::channel("sucursal")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [ 
            'sucursalDireccion' => 'required|min:10|max:100',
        ]);
 
        if($validator0->fails()){
            Log::channel("sucursal")->error("No puede estar vacía la dirección del sucursal y debe tener entre 10 a 100 caracteres");
            return response()->json(['Error'=>'No puede estar vacía la dirección del sucursal y debe tener entre 10 a 100 caracteres.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'sucursalNombre' => 'required|min:4|max:40',
        ]);
 
        if($validator1->fails()){
            Log::channel("sucursal")->error("No puede estar vacía el nombre del sucursal y debe tener entre 4 a 40 caracteres");
            return response()->json(['Error'=>'No puede estar vacía el nombre del sucursal y debe tener entre 4 a 40 caracteres.'], 203);
        }

        try {

            $sucursal->update($request->all());
            Log::channel("sucursal")->info($sucursal);
            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
        
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Log::channel("sucursal")->error("Datos repetidos");
                return response()->json(['Error'=>'Los siguientes datos deben ser únicos: Nombre de la sucursal.'], 203);
            }
        }

    }


    public function destroy($id)
    {
        $sucursal = Sucursale::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
