<?php

namespace App\Http\Controllers;

use App\Models\ReservacionMesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Class ReservacionMesaController
 * @package App\Http\Controllers
 */
class ReservacionMesaController extends Controller
{
    public function getReservacionMesa(){
        Log::channel("reservacionmesa")->info("Registros encontrado");
        return response()->json(ReservacionMesa::all(),200);
    }

    public function getByReservacionId($reservacionId){


        $ReservacionMesa = ReservacionMesa::findByReservacionId($reservacionId);

        if(empty($ReservacionMesa)){
            Log::channel("reservacionmesa")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
        Log::channel("reservacionmesa")->info($ReservacionMesa);
        return response($ReservacionMesa, 200);
    }

    public function getByMesaId($mesaId){


        $ReservacionMesa = ReservacionMesa::findByMesaId($mesaId);

        if(empty($ReservacionMesa)){
            Log::channel("reservacionmesa")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
        Log::channel("reservacionmesa")->info($ReservacionMesa);
        return response($ReservacionMesa, 200);
    }

    public function store(Request $request)
    {
        $validator0 = Validator::make($request->all(), [ 
            'reservacionId' => 'required',
        ]);
 
        if($validator0->fails()){
            Log::channel("reservacionmesa")->error("La reservación no puede estar vacío");
            return response()->json(['Error'=>'La reservación no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'mesaId' => 'required',
        ]);
 
        if($validator1->fails()){
            Log::channel("reservacionmesa")->error("La mesa no puede estar vacía");
            return response()->json(['Error'=>'La mesa no puede estar vacía.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'fecha' => 'required|date',
        ]);
 
        if($validator2->fails()){
            Log::channel("reservacionmesa")->error("La fecha no puede estar vacía");
            return response()->json(['Error'=>'La fecha no puede estar vacía.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'horaInicio' => 'required',
        ]);
 
        if($validator2->fails()){
            Log::channel("reservacionmesa")->error("La hora de inicio no puede estar vacía");
            return response()->json(['Error'=>'La hora de inicio no puede estar vacía.'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'horaFinal' => 'required',
        ]);
 
        if($validator3->fails()){
            Log::channel("reservacionmesa")->error("La hora final no puede estar vacía");
            return response()->json(['Error'=>'La hora final no puede estar vacía.'], 203);
        }

        $validator4 = Validator::make($request->all(), [ 
            'horaInicio' => 'before:horaFinal',
        ]);
 
        if($validator4->fails()){
            Log::channel("reservacionmesa")->error("La hora de inicio no puede ser despues de la hora final");
            return response()->json(['Error'=>'La hora de inicio no puede ser despues de la hora final.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("reservacionmesa")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }


        $reservacionMesa = ReservacionMesa::create($request->all());
        Log::channel("reservacionmesa")->info($ReservacionMesa);
        return response($reservacionMesa, 200);
    }

   
    public function show($id)
    {
        $reservacionMesa = ReservacionMesa::find($id);

        if  ($id < 1){
            Log::channel("reservacionmesa")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($reservacionMesa)){
            Log::channel("reservacionmesa")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }
        Log::channel("reservacionmesa")->info($ReservacionMesa);
        return response($reservacionMesa, 200);
    }

    public function update(Request $request, $id)
    {
        $reservacionMesa = ReservacionMesa::find($id);

        if  ($id < 1){
            Log::channel("reservacionmesa")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($reservacionMesa)){
            Log::channel("reservacionmesa")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [ 
            'reservacionId' => 'required',
        ]);
 
        if($validator0->fails()){
            Log::channel("reservacionmesa")->error("La reservación no puede estar vacío");
            return response()->json(['Error'=>'La reservación no puede estar vacío .'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'mesaId' => 'required',
        ]);
 
        if($validator1->fails()){
            Log::channel("reservacionmesa")->error("La mesa no puede estar vacía");
            return response()->json(['Error'=>'La mesa no puede estar vacía.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'fecha' => 'required|date',
        ]);
 
        if($validator2->fails()){
            Log::channel("reservacionmesa")->error("La fecha no puede estar vacía");
            return response()->json(['Error'=>'La fecha no puede estar vacía.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'horaInicio' => 'required',
        ]);
 
        if($validator2->fails()){
            Log::channel("reservacionmesa")->error("La hora de inicio no puede estar vacía");
            return response()->json(['Error'=>'La hora de inicio no puede estar vacía.'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'horaFinal' => 'required',
        ]);
 
        if($validator3->fails()){
            Log::channel("reservacionmesa")->error("La hora final no puede estar vacía");
            return response()->json(['Error'=>'La hora final no puede estar vacía.'], 203);
        }

        $validator4 = Validator::make($request->all(), [ 
            'horaInicio' => 'before:horaFinal',
        ]);
 
        if($validator4->fails()){
            Log::channel("reservacionmesa")->error("La hora de inicio no puede ser despues de la hora final");
            return response()->json(['Error'=>'La hora de inicio no puede ser despues de la hora final.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("reservacionmesa")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $reservacionMesa->update($request->all());
        Log::channel("reservacionmesa")->info($ReservacionMesa);
        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
    }

    public function destroy($id)
    {
        $reservacionMesa = ReservacionMesa::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
