<?php

namespace App\Http\Controllers;

use App\Models\OrdenEncabezado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Class OrdenEncabezadoController
 * @package App\Http\Controllers
 */
class OrdenEncabezadoController extends Controller
{
    public function getOrdenEncabezado(){
        try{
            return response()->json(OrdenEncabezado::all(),200);
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("ordenencabezado")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function getByClienteId($clienteId){
        try{

        $ordenEncabezado = OrdenEncabezado::findByCliente($clienteId);

        if(empty($ordenEncabezado)){
            Log::channel("ordenencabezado")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
            Log::channel("ordenencabezado")->info($ordenEncabezado);
            return response($ordenEncabezado, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("ordenencabezado")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function getByEmpleadoMeseroId($empleadoId){
        try{

        $ordenEncabezado = OrdenEncabezado::findByEmpleadoMesero($empleadoId);

        if(empty($ordenEncabezado)){
            Log::channel("ordenencabezado")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
            Log::channel("ordenencabezado")->info($ordenEncabezado);
            return response($ordenEncabezado, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("ordenencabezado")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function getByEmpleadoCocinaId($empleadoId){
        try{

        $ordenEncabezado = OrdenEncabezado::findByEmpleadoCocina($empleadoId);

        if(empty($ordenEncabezado)){
            Log::channel("ordenencabezado")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
            Log::channel("ordenencabezado")->info($ordenEncabezado);
            return response($ordenEncabezado, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("ordenencabezado")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function getByTipoEntregaId($tipoEntregaId){
        try{

        $ordenEncabezado = OrdenEncabezado::findByTipoEntrega($tipoEntregaId);

        if(empty($ordenEncabezado)){
            Log::channel("ordenencabezado")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
            Log::channel("ordenencabezado")->info($ordenEncabezado);
            return response($ordenEncabezado, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("ordenencabezado")->error($errormessage);
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
            Log::channel("ordenencabezado")->error("El cliente no puede estar vacío");
            return response()->json(['Error'=>'El cliente no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'empleadoMeseroId' => 'required',
        ]);

        if($validator1->fails()){
            Log::channel("ordenencabezado")->error("El mesero no puede estar vacío");
            return response()->json(['Error'=>'El mesero no puede estar vacío.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'empleadoCocinaId' => 'required',
        ]);

        if($validator2->fails()){
            Log::channel("ordenencabezado")->error("El cocinero no puede estar vacío");
            return response()->json(['Error'=>'El cocinero no puede estar vacío.'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'tipoEntregaId' => 'required',
        ]);

        if($validator3->fails()){
            Log::channel("ordenencabezado")->error("El tipo de entrega no puede estar vacío");
            return response()->json(['Error'=>'El tipo de entrega no puede estar vacío.'], 203);
        }

        $validator4 = Validator::make($request->all(), [ 
            'fechaHora' => 'required',
        ]);

        if($validator4->fails()){
            Log::channel("ordenencabezado")->error("La fecha y hora de la orden no puede estar vacía");
            return response()->json(['Error'=>'La fecha y hora de la orden no puede estar vacía.'], 203);
        }

        if ($request->empleadoMeseroId == $request->empleadoCocinaId) {
            Log::channel("ordenencabezado")->error("El mesero y el cocinero no pueden ser el mismo");
            return response()->json(['Error'=>'El mesero y el cocinero no pueden ser el mismo.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("ordenencabezado")->error("l estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

            $ordenEncabezado = OrdenEncabezado::create($request->all());
            Log::channel("ordenencabezado")->info($ordenEncabezado);
            return response($ordenEncabezado, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("ordenencabezado")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }
    
    public function show($id)
    {
        try{

        $ordenEncabezado = OrdenEncabezado::find($id);

        if  ($id < 1){
            Log::channel("ordenencabezado")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($ordenEncabezado)){
            Log::channel("ordenencabezado")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }
            Log::channel("ordenencabezado")->info($ordenEncabezado);
            return response($ordenEncabezado, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("ordenencabezado")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function update(Request $request, $id)
    {
        try{

        $ordenEncabezado = OrdenEncabezado::find($id);

        $validator0 = Validator::make($request->all(), [ 
            'clienteId' => 'required',
        ]);

        if($validator0->fails()){
            Log::channel("ordenencabezado")->error("El cliente no puede estar vacío");
            return response()->json(['Error'=>'El cliente no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'empleadoMeseroId' => 'required',
        ]);

        if($validator1->fails()){
            Log::channel("ordenencabezado")->error("El mesero no puede estar vacío");
            return response()->json(['Error'=>'El mesero no puede estar vacío.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'empleadoCocinaId' => 'required',
        ]);

        if($validator2->fails()){
            Log::channel("ordenencabezado")->error("El cocinero no puede estar vacío");
            return response()->json(['Error'=>'El cocinero no puede estar vacío.'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'tipoEntregaId' => 'required',
        ]);

        if($validator3->fails()){
            Log::channel("ordenencabezado")->error("El tipo de entrega no puede estar vacío");
            return response()->json(['Error'=>'El tipo de entrega no puede estar vacío.'], 203);
        }

        $validator4 = Validator::make($request->all(), [ 
            'fechaHora' => 'required',
        ]);

        if($validator4->fails()){
            Log::channel("ordenencabezado")->error("La fecha y hora de la orden no puede estar vacía");
            return response()->json(['Error'=>'La fecha y hora de la orden no puede estar vacía.'], 203);
        }

        if ($request->empleadoMeseroId == $request->empleadoCocinaId) {
            Log::channel("ordenencabezado")->error("El mesero y el cocinero no pueden ser el mismo");
            return response()->json(['Error'=>'El mesero y el cocinero no pueden ser el mismo.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("ordenencabezado")->error("l estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

            $ordenEncabezado->update($request->all());
            Log::channel("ordenencabezado")->info($ordenEncabezado);
            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
            
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("ordenencabezado")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function destroy($id)
    {
        $ordenEncabezado = OrdenEncabezado::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
