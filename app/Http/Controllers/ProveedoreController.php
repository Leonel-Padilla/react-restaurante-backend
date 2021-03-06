<?php

namespace App\Http\Controllers;

use App\Models\Proveedore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;


class ProveedoreController extends Controller
{
    public function getProveedor(){
        try{
            return response()->json(Proveedore::all(),200);
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("proveedor")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    //
    public function getByProveedorNombre($nombreProveedor){
        try{

        $proveedor = Proveedore::findByProveedorNombre($nombreProveedor);

        if(empty($proveedor)){
            Log::channel("proveedor")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
            Log::channel("proveedor")->info($proveedor);
            return response($proveedor, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("proveedor")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }
    
    public function store(Request $request)
    {
        try{

        $validator0 = Validator::make($request->all(), [ 
            'proveedorNombre' => 'required|min:3|max:50',
        ]);
 
        if($validator0->fails()){
            Log::channel("proveedor")->error("El nombre del proveedor no puede estar vacío y debe tener entre 3 y 50 caracteres");
            return response()->json(['Error'=>'El nombre del proveedor no puede estar vacío y debe tener entre 3 y 50 caracteres.'],
            203);
        }
        //
        $validator1 = Validator::make($request->all(), [ 
            'proveedorNombre' => 'unique:proveedores',
        ]);
 
        if($validator1->fails()){
            Log::channel("proveedor")->error("El nombre del proveedor debe ser único");
            return response()->json(['Error'=>'El nombre del proveedor debe ser único.'], 203);
        }
        //
        $validator2 = Validator::make($request->all(), [ 
            'proveedorNumero' => 'required|starts_with:2,3,7,8,9|min:8|max:8',
        ]);
 
        if($validator2->fails()){
            Log::channel("proveedor")->error("El número del proveedor debe tener 8 dígitos y debe comenzar con 2, 3, 7, 8 o un 9");
            return response()->json(['Error'=>'El número del proveedor debe tener 8 dígitos y debe comenzar con 2, 3, 7, 8 o un 9.'], 203);
        }
        //
        $validator3 = Validator::make($request->all(), [ 
            'proveedorNumero' => 'unique:proveedores',
        ]);
 
        if($validator3->fails()){
            Log::channel("proveedor")->error("El número del proveedor debe ser único");
            return response()->json(['Error'=>'El número del proveedor debe ser único.'], 203);
        }
        //
        $validator4 = Validator::make($request->all(), [ 
            'proveedorCorreo' => 'unique:proveedores',
        ]);
 
        if($validator4->fails()){
            Log::channel("proveedor")->error("El correo del proveedor debe de ser único");
            return response()->json(['Error'=>'El correo del proveedor debe de ser único.'], 203);
        }
        //
        $validator5 = Validator::make($request->all(), [ 
            'proveedorCorreo' => 'required|email|min:10|max:50',
        ]);
 
        if($validator5->fails()){
            Log::channel("proveedor")->error("El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com");
            return response()->json(['Error'=>'El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com'], 203);
        }
        //
        if (!str_contains($request->proveedorCorreo, "@") || !str_contains($request->proveedorCorreo, ".")){
            Log::channel("proveedor")->error("El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com");
            return response()->json(['Error'=>'El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com'], 203);
        }
        //
        $validator6 = Validator::make($request->all(), [ 
            'proveedorEncargado' => 'required|min:4|max:50',
        ]);
 
        if($validator6->fails()){
            Log::channel("proveedor")->error("El encargado debe tener de 4 a 50 caracteres");
            return response()->json(['Error'=>'El encargado debe tener de 4 a 50 caracteres.'], 203);
        }
        //
        $validator7 = Validator::make($request->all(), [ 
            'proveedorRTN' => 'unique:proveedores',
        ]);
 
        if($validator7->fails()){
            Log::channel("proveedor")->error("El RTN debe ser único");
            return response()->json(['Error'=>'El RTN debe ser único.'], 203);
        }
        //
        $validator8 = Validator::make($request->all(), [ 
            'proveedorRTN' => 'required|min:14|max:14',
        ]);
 
        if($validator8->fails()){
            Log::channel("proveedor")->error("El RTN de cada proveedor debe tener 14 caracteres");
            return response()->json(['Error'=>'El RTN de cada proveedor debe tener 14 caracteres.'], 203);
        }

        $validator9 = Validator::make($request->all(), [ 
            'proveedorRTN' => 'starts_with:0,1',
        ]);
 
        if($validator9->fails()){
            Log::channel("proveedor")->error("El RTN debe empezar con 0 o 1");
            return response()->json(['Error'=>'El RTN debe empezar con 0 o 1.'], 203);
        }

            $proveedore = Proveedore::create($request->all());
            Log::channel("proveedor")->info($proveedore);
            return response($proveedore, 200); 

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("proveedor")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    
    public function show($id)
    {
        try{

        $proveedore = Proveedore::find($id);

        if  ($id < 1){
            Log::channel("proveedor")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($proveedore)){
            Log::channel("proveedor")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }
            Log::channel("proveedor")->info($proveedore);
            return response($proveedore, 200);
            
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("proveedor")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function update(Request $request,$id)
    {
        try{

        $proveedore = Proveedore::find($id);

        if  ($id < 1){
            Log::channel("proveedor")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero.'], 203);
        }

        if  (is_null($proveedore)){
            Log::channel("proveedor")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro.'], 203);
        }

        ////
        $validator0 = Validator::make($request->all(), [ 
            'proveedorNombre' => 'required|min:3|max:50',
        ]);
 
        if($validator0->fails()){
            Log::channel("proveedor")->error("El nombre del proveedor no puede estar vacío y debe tener entre 3 y 50 caracteres");
            return response()->json(['Error'=>'El nombre del proveedor no puede estar vacío y debe tener entre 3 y 50 caracteres.'],
            203);
        }
        //
        $validator2 = Validator::make($request->all(), [ 
            'proveedorNumero' => 'required|starts_with:2,3,7,8,9|min:8|max:8',
        ]);
 
        if($validator2->fails()){
            Log::channel("proveedor")->error("El número del proveedor debe tener 8 dígitos y debe comenzar con 2, 3, 7, 8 o 9");
            return response()->json(['Error'=>'El número del proveedor debe tener 8 dígitos y debe comenzar con 2, 3, 7, 8 o 9.'], 203);
        }
        //
        $validator5 = Validator::make($request->all(), [ 
            'proveedorCorreo' => 'required|email|min:10|max:50',
        ]);
 
        if($validator5->fails()){
            Log::channel("proveedor")->error("El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com");
            return response()->json(['Error'=>'El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com.'], 203);
        }
        //
        $validator6 = Validator::make($request->all(), [ 
            'proveedorEncargado' => 'required|min:4|max:50',
        ]);
 
        if($validator6->fails()){
            Log::channel("proveedor")->error("El encargado debe tener de 4 a 50 caracteres");
            return response()->json(['Error'=>'El encargado debe tener de 4 a 50 caracteres.'], 203);
        }
        //
        $validator8 = Validator::make($request->all(), [ 
            'proveedorRTN' => 'required|min:14|max:14',
        ]);
 
        if($validator8->fails()){
            Log::channel("proveedor")->error("El RTN de cada proveedor debe tener 14 caracteres");
            return response()->json(['Error'=>'El RTN de cada proveedor debe tener 14 caracteres.'], 203);
        }

        $validator9 = Validator::make($request->all(), [ 
            'proveedorRTN' => 'starts_with:0,1',
        ]);
 
        if($validator9->fails()){
            Log::channel("proveedor")->error("El RTN debe empezar con 0 o 1");
            return response()->json(['Error'=>'El RTN debe empezar con 0 o 1.'], 203);
        }

            $proveedore->update($request->all());
            Log::channel("proveedor")->info($proveedore);
            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
        
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Log::channel("proveedor")->error("Datos repetidos");
                return response()->json(['Error'=>'Los siguientes datos deben ser únicos: Nombre, Número, Correo y RTN.'], 203);
            }else{
                $errormessage = $e->getMessage();
                Log::channel("proveedor")->error($errormessage);
                return response()->json(['Error'=>$errormessage], 203);
            }
        }

    }

    public function destroy($id)
    {
        $proveedore = Proveedore::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
