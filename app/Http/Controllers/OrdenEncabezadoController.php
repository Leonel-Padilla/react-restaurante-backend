<?php

namespace App\Http\Controllers;

use App\Models\OrdenEncabezado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class OrdenEncabezadoController
 * @package App\Http\Controllers
 */
class OrdenEncabezadoController extends Controller
{
    public function getOrdenEncabezado(){
        return response()->json(OrdenEncabezado::all(),200);
    }

    public function getByClienteId($clienteId){

        $ordenEncabezado = OrdenEncabezado::findByCliente($clienteId);

        if(empty($ordenEncabezado)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }

        return response($ordenEncabezado, 200);
    }

    public function getByEmpleadoMeseroId($empleadoId){

        $ordenEncabezado = OrdenEncabezado::findByEmpleadoMesero($empleadoId);

        if(empty($ordenEncabezado)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }

        return response($ordenEncabezado, 200);
    }

    public function getByEmpleadoCocinaId($empleadoId){

        $ordenEncabezado = OrdenEncabezado::findByEmpleadoCocina($empleadoId);

        if(empty($ordenEncabezado)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }

        return response($ordenEncabezado, 200);
    }

    public function getByEstadoOrden($estadoOrden){

        $ordenEncabezado = OrdenEncabezado::findByEstadoOrden($estadoOrden);

        if(empty($ordenEncabezado)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }

        return response($ordenEncabezado, 200);
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
            'empleadoMeseroId' => 'required',
        ]);

        if($validator1->fails()){
            return response()->json(['Error'=>'El mesero no puede estar vacío.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'empleadoCocinaId' => 'required',
        ]);

        if($validator2->fails()){
            return response()->json(['Error'=>'El cocinero no puede estar vacío.'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'tipoEntregaId' => 'required',
        ]);

        if($validator3->fails()){
            return response()->json(['Error'=>'El tipo de entrega no puede estar vacío.'], 203);
        }

        $validator4 = Validator::make($request->all(), [ 
            'fechaHora' => 'required',
        ]);

        if($validator4->fails()){
            return response()->json(['Error'=>'La fecha y hora de la orden no puede estar vacía.'], 203);
        }

        $validator4 = Validator::make($request->all(), [ 
            'estadoOrden' => 'required|min:3|max:20',
        ]);

        if($validator4->fails()){
            return response()->json(['Error'=>'El estado de la orden no puede estar vacía y debe tener entre 3 a 20 caracteres.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $ordenEncabezado = OrdenEncabezado::create($request->all());

        return response($ordenEncabezado, 200);
    }
    
    public function show($id)
    {
        $ordenEncabezado = OrdenEncabezado::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($ordenEncabezado)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        return response($ordenEncabezado, 200);
    }

    public function update(Request $request, $id)
    {
        $ordenEncabezado = OrdenEncabezado::find($id);

        $validator0 = Validator::make($request->all(), [ 
            'clienteId' => 'required',
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'El cliente no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'empleadoMeseroId' => 'required',
        ]);

        if($validator1->fails()){
            return response()->json(['Error'=>'El mesero no puede estar vacío.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'empleadoCocinaId' => 'required',
        ]);

        if($validator2->fails()){
            return response()->json(['Error'=>'El cocinero no puede estar vacío.'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'tipoEntregaId' => 'required',
        ]);

        if($validator3->fails()){
            return response()->json(['Error'=>'El tipo de entrega no puede estar vacío.'], 203);
        }

        $validator4 = Validator::make($request->all(), [ 
            'fechaHora' => 'required',
        ]);

        if($validator4->fails()){
            return response()->json(['Error'=>'La fecha y hora de la orden no puede estar vacía.'], 203);
        }

        $validator4 = Validator::make($request->all(), [ 
            'estadoOrden' => 'required|min:3|max:20',
        ]);

        if($validator4->fails()){
            return response()->json(['Error'=>'El estado de la orden no puede estar vacía y debe tener entre 3 a 20 caracteres.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $ordenEncabezado->update($request->all());

        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
    }

    public function destroy($id)
    {
        $ordenEncabezado = OrdenEncabezado::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
