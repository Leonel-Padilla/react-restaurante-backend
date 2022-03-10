<?php

namespace App\Http\Controllers;

use App\Models\Proveedore;
use Illuminate\Http\Request;


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
        
        if (strlen($request->proveedorNombre) === 0){
            return response()->json(['Error'=>'El nombre del proveedor no puede estar vacio'], 203);
        }
        if (strlen($request->proveedorEncargado) === 0){
            return response()->json(['Error'=>'El encargado no puede estar vacio'], 203);
        }
        if (strlen($request->proveedorNumero) < 8 || strlen($request->proveedorNumero) > 8){
            return response()->json(['Error'=>'El numero del proveedor tiene que ser igual a 8'], 203);
        }
        if (strlen($request->proveedorRTN) > 14 || strlen($request->proveedorRTN) < 14 ){
            return response()->json(['Error'=>'El RTN del proveedor tiene que ser igual a 14 digitos'], 203);
        }
        if (strlen($request->proveedorCorreo) === 0){
            return response()->json(['Error'=>'El Correo del proveedor no puede estar vacio'], 203);
        }
        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
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
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($proveedore)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }


        if (strlen($request->proveedorNombre) === 0){
            return response()->json(['Error'=>'El nombre del proveedor no puede estar vacio'], 203);
        }
        if (strlen($request->proveedorEncargado) === 0){
            return response()->json(['Error'=>'El encargado no puede estar vacio'], 203);
        }
        if (strlen($request->proveedorNumero) < 8 || strlen($request->proveedorNumero) > 8){
            return response()->json(['Error'=>'El numero del proveedor tiene que ser igual a 8'], 203);
        }
        if (strlen($request->proveedorRTN) > 14 || strlen($request->proveedorRTN) < 14 ){
            return response()->json(['Error'=>'El RTN del proveedor tiene que ser igual a 14 digitos'], 203);
        }
        if (strlen($request->proveedorCorreo) === 0){
            return response()->json(['Error'=>'El Correo del proveedor no puede estar vacio'], 203);
        }
        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $proveedore->update($request->all());

        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
    }

    public function destroy($id)
    {
        $proveedore = Proveedore::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
