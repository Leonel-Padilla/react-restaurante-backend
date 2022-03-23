<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class ClienteController
 * @package App\Http\Controllers
 */
class ClienteController extends Controller
{

    public function getCliente(){
        return response()->json(Cliente::all(),200);
    }


    public function getByClienteNombre($nombreCliente){


        $Cliente = Cliente::findByClienteNombre($nombreCliente);

        if(empty($Cliente)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
        return response($Cliente, 200);
    }


    public function store(Request $request){

        $validator0 = Validator::make($request->all(), [ 
            'clienteNombre' => 'required|min:4|max:40',
        ]);
 
        if($validator0->fails()){
            return response()->json(['Error'=>'El nombre del cliente no puede estar vacío y tiene que tener entre 4 y 40 caracteres'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'clienteNumero' => 'required|starts_with:2,3,7,8,9|min:8|max:8',
        ]);
 
        if($validator1->fails()){
            return response()->json(['Error'=>'El número del cliente debe tener 8 dígitos y debe comenzar con 2, 3, 7, 8 o un 9.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'clienteNumero' => 'unique:clientes',
        ]);
 
        if($validator2->fails()){
            return response()->json(['Error'=>'El número del cliente debe ser único.'], 203);
        }

        $validator3 = Validator::make($request->all(), [
            'clienteCorreo' => 'required|min:10|max:50',
        ]);

        if($validator3->fails()){
            return response()->json(['Error'=>'El correo del cliente no puede estar vacío'], 203);
        }

        $validator4 = Validator::make($request->all(), [
            'clienteCorreo' => 'unique:clientes',
        ]);

        if($validator4->fails()){
            return response()->json(['Error'=>'El correo del cliente debe ser único.'], 203);
        }

        $validator5 = Validator::make($request->all(), [
            'clienteRTN' => 'unique:clientes',
        ]);

        if($validator5->fails()){
            return response()->json(['Error'=>'El RTN del cliente debe ser único.'], 203);
        }

        $validator6 = Validator::make($request->all(), [
            'clienteRTN' => 'required|min:14|max:14',
        ]);

        if($validator6->fails()){
            return response()->json(['Error'=>'El RTN del cliente no puede estar vacío y debe ser de 14 dígitos.'], 203);
        }


        $cliente = Cliente::create($request->all());

        return response($cliente, 200);
    }


    public function show($id)
    {
        $cliente = Cliente::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($cliente)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        return response($cliente, 200);
    }


    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($cliente)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [ 
            'clienteNombre' => 'required|min:4|max:40',
        ]);
 
        if($validator0->fails()){
            return response()->json(['Error'=>'El nombre del cliente no puede estar vacío'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'clienteNumero' => 'required|starts_with:2,3,7,8,9|min:8|max:8',
        ]);
 
        if($validator1->fails()){
            return response()->json(['Error'=>'El número del cliente debe tener 8 dígitos y debe comenzar con 2, 3, 7, 8 o un 9.'], 203);
        }

        $validator2 = Validator::make($request->all(), [
            'clienteCorreo' => 'required|min:10|max:50',
        ]);

        if($validator2->fails()){
            return response()->json(['Error'=>'El correo del cliente no puede estar vacío'], 203);
        }

        $validator3 = Validator::make($request->all(), [
            'clienteRTN' => 'required|min:14|max:14',
        ]);

        if($validator3->fails()){
            return response()->json(['Error'=>'El RTN del cliente no puede estar vacío y debe ser de 14 dígitos.'], 203);
        }

        $cliente->update($request->all());

        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);

    }

    

    public function destroy($id)
    {
        $cliente = Cliente::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
