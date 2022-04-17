<?php

namespace App\Http\Controllers;

use App\Models\Reservacione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class ReservacioneController
 * @package App\Http\Controllers
 */
class ReservacioneController extends Controller
{
    public function getReservacion(){
        return response()->json(Reservacione::all(),200);
    }

    //
    public function getByCliente($clienteId){

        $reservacione = Reservacione::findByCliente($clienteId);
        
        if(empty($reservacione)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
        
        return response($reservacione, 200);
    }
    
    public function store(Request $request)
    {
        $validator0 = Validator::make($request->all(), [ 
            'clienteId' => 'required',
        ]);
 
        if($validator0->fails()){
            return response()->json(['Error'=>'El cliente no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'sucursalId' => 'required',
        ]);
 
        if($validator1->fails()){
            return response()->json(['Error'=>'La sucursal no puede estar vacía.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $reservacione = Reservacione::create($request->all());

        return response($reservacione, 200);
    }

    public function show($id)
    {
        $reservacione = Reservacione::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($reservacione)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        return response($reservacione, 200);
    }

    public function update(Request $request, $id)
    {
        $reservacione = Reservacione::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($reservacione)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [ 
            'clienteId' => 'required',
        ]);
 
        if($validator0->fails()){
            return response()->json(['Error'=>'No puede estar vacío el cliente.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'sucursalId' => 'required',
        ]);
 
        if($validator1->fails()){
            return response()->json(['Error'=>'No puede estar vacía la sucursal.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $reservacione->update($request->all());

        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
    }

    public function destroy($id)
    {
        $reservacione = Reservacione::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
