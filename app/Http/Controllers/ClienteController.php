<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Class ClienteController
 * @package App\Http\Controllers
 */
class ClienteController extends Controller
{

    public function getCliente(){
        Log::channel("cliente")->info("Registros encontrado");
        return response()->json(Cliente::all(),200);
    }


    public function getByClienteNombre($nombreCliente){


        $Cliente = Cliente::findByClienteNombre($nombreCliente);

        if(empty($Cliente)){
            Log::channel("cliente")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
        Log::channel("cliente")->info($Cliente);
        return response($Cliente, 200);
    }


    public function store(Request $request){

        $validator0 = Validator::make($request->all(), [ 
            'tipoDocumentoId' => 'required|min:1|max:1',
        ]);
 
        if($validator0->fails()){
            Log::channel("cliente")->error("El tipo de documento no puede estar vacío");
            return response()->json(['Error'=>'El tipo de documento no puede estar vacío'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'numeroDocumento' => 'required',
        ]);
 
        if($validator1->fails()){
            Log::channel("cliente")->error("El número de documento no puede estar vacío");
            return response()->json(['Error'=>'El número de documento no puede estar vacío.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'numeroDocumento' => 'unique:clientes',
        ]);
 
        if($validator2->fails()){
            Log::channel("cliente")->error("El número de documento debe ser único");
            return response()->json(['Error'=>'El número de documento debe ser único.'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'clienteNombre' => 'required|min:4|max:40',
        ]);
 
        if($validator3->fails()){
            Log::channel("cliente")->error("El nombre del cliente no puede estar vacío y tiene que tener entre 4 y 40 caracteres");
            return response()->json(['Error'=>'El nombre del cliente no puede estar vacío y tiene que tener entre 4 y 40 caracteres'], 203);
        }

        $validator4 = Validator::make($request->all(), [ 
            'clienteNumero' => 'required|starts_with:2,3,7,8,9|min:8|max:8',
        ]);
 
        if($validator4->fails()){
            Log::channel("cliente")->error("El número del cliente debe tener 8 dígitos y debe comenzar con 2, 3, 7, 8 o un 9");
            return response()->json(['Error'=>'El número del cliente debe tener 8 dígitos y debe comenzar con 2, 3, 7, 8 o un 9.'], 203);
        }

        $validator5 = Validator::make($request->all(), [ 
            'clienteNumero' => 'unique:clientes',
        ]);
 
        if($validator5->fails()){
            Log::channel("cliente")->error("El número del cliente debe ser único");
            return response()->json(['Error'=>'El número del cliente debe ser único.'], 203);
        }

        $validator6 = Validator::make($request->all(), [
            'clienteCorreo' => 'required|email|min:10|max:50',
        ]);

        if($validator6->fails()){
            Log::channel("cliente")->error("El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com");
            return response()->json(['Error'=>'El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com'], 203);
        }

        if (!str_contains($request->clienteCorreo, "@") || !str_contains($request->clienteCorreo, ".")){
            Log::channel("cliente")->error("El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com");
            return response()->json(['Error'=>'El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com'], 203);
        }

        $validator7 = Validator::make($request->all(), [
            'clienteCorreo' => 'unique:clientes',
        ]);

        if($validator7->fails()){
            Log::channel("cliente")->error("El correo del cliente debe ser único");
            return response()->json(['Error'=>'El correo del cliente debe ser único.'], 203);
        }

        $validator8 = Validator::make($request->all(), [
            'clienteRTN' => 'unique:clientes',
        ]);

        if($validator8->fails()){
            Log::channel("cliente")->error("El RTN del cliente debe ser único");
            return response()->json(['Error'=>'El RTN del cliente debe ser único.'], 203);
        }

        $validator9 = Validator::make($request->all(), [
            'clienteRTN' => 'min:14|max:14',
        ]);

        if($validator9->fails()){
            Log::channel("cliente")->error("El RTN del cliente debe ser de 14 dígitos");
            return response()->json(['Error'=>'El RTN del cliente debe ser de 14 dígitos.'], 203);
        }

        $validator10 = Validator::make($request->all(), [ 
            'clienteRTN' => 'starts_with:0,1',
        ]);
 
        if($validator10->fails()){
            Log::channel("cliente")->error("El RTN debe empezar con 0 o 1");
            return response()->json(['Error'=>'El RTN debe empezar con 0 o 1.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("cliente")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }


        $cliente = Cliente::create($request->all());

        return response($cliente, 200);
    }


    public function show($id)
    {
        $cliente = Cliente::find($id);

        if  ($id < 1){
            Log::channel("cliente")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($cliente)){
            Log::channel("cliente")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        return response($cliente, 200);
    }


    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);

        if  ($id < 1){
            Log::channel("cliente")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($cliente)){
            Log::channel("cliente")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [ 
            'tipoDocumentoId' => 'required|min:1|max:1',
        ]);
 
        if($validator0->fails()){
            Log::channel("cliente")->error("El tipo de documento no puede estar vacío");
            return response()->json(['Error'=>'El tipo de documento no puede estar vacío'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'numeroDocumento' => 'required',
        ]);
 
        if($validator1->fails()){
            Log::channel("cliente")->error("El número de documento no puede estar vacío");
            return response()->json(['Error'=>'El número de documento no puede estar vacío.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'clienteNombre' => 'required|min:4|max:40',
        ]);
 
        if($validator2->fails()){
            Log::channel("cliente")->error("EEl nombre del cliente no puede estar vacío y tiene que tener entre 4 y 40 caracteres");
            return response()->json(['Error'=>'El nombre del cliente no puede estar vacío y tiene que tener entre 4 y 40 caracteres'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'clienteNumero' => 'required|starts_with:2,3,7,8,9|min:8|max:8',
        ]);
 
        if($validator3->fails()){
            Log::channel("cliente")->error("El número del cliente debe tener 8 dígitos y debe comenzar con 2, 3, 7, 8 o un 9");
            return response()->json(['Error'=>'El número del cliente debe tener 8 dígitos y debe comenzar con 2, 3, 7, 8 o un 9.'], 203);
        }

        $validator5 = Validator::make($request->all(), [
            'clienteCorreo' => 'required|email|min:10|max:50',
        ]);

        if($validator5->fails()){
            Log::channel("cliente")->error("El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com");
            return response()->json(['Error'=>'El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com'], 203);
        }

        if (!str_contains($request->clienteCorreo, "@") || !str_contains($request->clienteCorreo, ".")){
            Log::channel("cliente")->error("El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com");
            return response()->json(['Error'=>'El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com'], 203);
        }

        $validator8 = Validator::make($request->all(), [
            'clienteRTN' => 'min:14|max:14',
        ]);

        if($validator8->fails()){
            Log::channel("cliente")->error("El RTN del cliente debe ser de 14 dígitos");
            return response()->json(['Error'=>'El RTN del cliente debe ser de 14 dígitos.'], 203);
        }

        $validator9 = Validator::make($request->all(), [ 
            'clienteRTN' => 'starts_with:0,1',
        ]);
 
        if($validator9->fails()){
            Log::channel("cliente")->error("El RTN debe empezar con 0 o 1");
            return response()->json(['Error'=>'El RTN debe empezar con 0 o 1.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("cliente")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        try {

            $cliente->update($request->all());
            Log::channel("cliente")->info($cliente);
            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);

        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Log::channel("cliente")->error("Datos repetidos");
                return response()->json(['Error'=>'Los siguientes datos deben ser únicos: Número Documento, Número Cliente, Cliente Correo, RTN Cliente'], 203);
            }
        }

    }

    

    public function destroy($id)
    {
        $cliente = Cliente::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
