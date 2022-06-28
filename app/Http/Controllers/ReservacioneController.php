<?php

namespace App\Http\Controllers;

use App\Models\Reservacione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Class ReservacioneController
 * @package App\Http\Controllers
 */
class ReservacioneController extends Controller
{
    public function getReservacion(){
        try{
            return response()->json(Reservacione::all(),200);
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("reservacion")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    //
    public function getByCliente($clienteId){
        try{

        $reservacione = Reservacione::findByCliente($clienteId);
        
        if(empty($reservacione)){
            Log::channel("reservacion")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
            Log::channel("reservacion")->info($reservacione);
            return response($reservacione, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("reservacion")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }
    
    public function store(Request $request)
    {
        try{

        $validator0 = Validator::make($request->all(), [ 
            'clienteId' => 'required',
        ]);
 
        if($validator0->fails()){
            Log::channel("reservacion")->error("El cliente no puede estar vacío");
            return response()->json(['Error'=>'El cliente no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'sucursalId' => 'required',
        ]);
 
        if($validator1->fails()){
            Log::channel("reservacion")->error("La sucursal no puede estar vacía");
            return response()->json(['Error'=>'La sucursal no puede estar vacía.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("reservacion")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

            $reservacione = Reservacione::create($request->all());
            Log::channel("reservacion")->info($reservacione);
            return response($reservacione, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("reservacion")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function show($id)
    {
        try{

        $reservacione = Reservacione::find($id);

        if  ($id < 1){
            Log::channel("reservacion")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($reservacione)){
            Log::channel("reservacion")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }
            Log::channel("reservacion")->info($reservacione);
            return response($reservacione, 200);
            
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("reservacion")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function update(Request $request, $id)
    {
        try{

        $reservacione = Reservacione::find($id);

        if  ($id < 1){
            Log::channel("reservacion")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($reservacione)){
            Log::channel("reservacion")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [ 
            'clienteId' => 'required',
        ]);
 
        if($validator0->fails()){
            Log::channel("reservacion")->error("No puede estar vacío el cliente");
            return response()->json(['Error'=>'No puede estar vacío el cliente.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'sucursalId' => 'required',
        ]);
 
        if($validator1->fails()){
            Log::channel("reservacion")->error("No puede estar vacía la sucursal");
            return response()->json(['Error'=>'No puede estar vacía la sucursal.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("reservacion")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

            $reservacione->update($request->all());
            Log::channel("reservacion")->info($reservacione);
            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
            
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("reservacion")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function destroy($id)
    {
        $reservacione = Reservacione::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
