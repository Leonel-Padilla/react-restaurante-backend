<?php

namespace App\Http\Controllers;

use App\Models\Proveedore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProveedoreController extends Controller
{
    public function getProveedor(){
        return response()->json(Proveedore::all(),200);
    }

    //
    public function getByProveedorNombre($nombreProveedor){

        $proveedor = Proveedore::findByProveedorNombre($nombreProveedor);

        if(empty($proveedor)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
        return response($proveedor, 200);
    }
    
    public function store(Request $request)
    {
        
        $validator0 = Validator::make($request->all(), [ 
            'proveedorNombre' => 'required|min:3|max:50',
        ]);
 
        if($validator0->fails()){
            return response()->json(['Error'=>'El nombre del proveedor no puede estar vacío y debe tener entre 3 y 50 caracteres.'],
            203);
        }
        //
        $validator1 = Validator::make($request->all(), [ 
            'proveedorNombre' => 'unique:proveedores',
        ]);
 
        if($validator1->fails()){
            return response()->json(['Error'=>'El nombre del proveedor debe ser único.'], 203);
        }
        //
        $validator2 = Validator::make($request->all(), [ 
            'proveedorNumero' => 'required|starts_with:2,3,7,8,9|min:8|max:8',
        ]);
 
        if($validator2->fails()){
            return response()->json(['Error'=>'El número del proveedor debe tener 8 dígitos y debe comenzar con 2, 3, 7, 8 o un 9.'], 203);
        }
        //
        $validator3 = Validator::make($request->all(), [ 
            'proveedorNumero' => 'unique:proveedores',
        ]);
 
        if($validator3->fails()){
            return response()->json(['Error'=>'El número del proveedor debe ser único.'], 203);
        }
        //
        $validator4 = Validator::make($request->all(), [ 
            'proveedorCorreo' => 'unique:proveedores',
        ]);
 
        if($validator4->fails()){
            return response()->json(['Error'=>'El correo del proveedor debe de ser único.'], 203);
        }
        //
        $validator5 = Validator::make($request->all(), [ 
            'proveedorCorreo' => 'required|email|min:10|max:50',
        ]);
 
        if($validator5->fails()){
            return response()->json(['Error'=>'El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com'], 203);
        }
        //
        if (!str_contains($request->proveedorCorreo, "@") || !str_contains($request->proveedorCorreo, ".")){
            return response()->json(['Error'=>'El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com'], 203);
        }
        //
        $validator6 = Validator::make($request->all(), [ 
            'proveedorEncargado' => 'required|min:4|max:50',
        ]);
 
        if($validator6->fails()){
            return response()->json(['Error'=>'El encargado debe tener de 4 a 50 caracteres.'], 203);
        }
        //
        $validator7 = Validator::make($request->all(), [ 
            'proveedorRTN' => 'unique:proveedores',
        ]);
 
        if($validator7->fails()){
            return response()->json(['Error'=>'El RTN debe ser único.'], 203);
        }
        //
        $validator8 = Validator::make($request->all(), [ 
            'proveedorRTN' => 'required|min:14|max:14',
        ]);
 
        if($validator8->fails()){
            return response()->json(['Error'=>'El RTN de cada proveedor debe tener 14 caracteres.'], 203);
        }

        $validator9 = Validator::make($request->all(), [ 
            'proveedorRTN' => 'starts_with:0,1',
        ]);
 
        if($validator9->fails()){
            return response()->json(['Error'=>'El RTN debe empezar con 0 o 1.'], 203);
        }


        $proveedore = Proveedore::create($request->all());

        return response($proveedore, 200); 
    }

    
    public function show($id)
    {
        $proveedore = Proveedore::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($proveedore)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        return response($proveedore, 200); 
    }

    public function update(Request $request,$id)
    {
        $proveedore = Proveedore::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero.'], 203);
        }

        if  (is_null($proveedore)){
            return response()->json(['Error'=>'No existe este registro.'], 203);
        }

        ////
        $validator0 = Validator::make($request->all(), [ 
            'proveedorNombre' => 'required|min:3|max:50',
        ]);
 
        if($validator0->fails()){
            return response()->json(['Error'=>'El nombre del proveedor no puede estar vacío y debe tener entre 3 y 50 caracteres.'],
            203);
        }
        //
        $validator2 = Validator::make($request->all(), [ 
            'proveedorNumero' => 'required|starts_with:2,3,7,8,9|min:8|max:8',
        ]);
 
        if($validator2->fails()){
            return response()->json(['Error'=>'El número del proveedor debe tener 8 dígitos y debe comenzar con 2, 3, 7, 8 o 9.'], 203);
        }
        //
        $validator5 = Validator::make($request->all(), [ 
            'proveedorCorreo' => 'required|email|min:10|max:50',
        ]);
 
        if($validator5->fails()){
            return response()->json(['Error'=>'El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com.'], 203);
        }
        //
        $validator6 = Validator::make($request->all(), [ 
            'proveedorEncargado' => 'required|min:4|max:50',
        ]);
 
        if($validator6->fails()){
            return response()->json(['Error'=>'El encargado debe tener de 4 a 50 caracteres.'], 203);
        }
        //
        $validator8 = Validator::make($request->all(), [ 
            'proveedorRTN' => 'required|min:14|max:14',
        ]);
 
        if($validator8->fails()){
            return response()->json(['Error'=>'El RTN de cada proveedor debe tener 14 caracteres.'], 203);
        }

        $validator9 = Validator::make($request->all(), [ 
            'proveedorRTN' => 'starts_with:0,1',
        ]);
 
        if($validator9->fails()){
            return response()->json(['Error'=>'El RTN debe empezar con 0 o 1.'], 203);
        }

        try {

            $proveedore->update($request->all());

            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
        
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return response()->json(['Error'=>'Los siguientes datos deben ser únicos: Nombre, Número, Correo y RTN.'], 203);
            }
        }

    }

    public function destroy($id)
    {
        $proveedore = Proveedore::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
