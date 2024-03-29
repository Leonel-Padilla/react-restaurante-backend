<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{

    public function getProducto(){
        try{
            return response()->json(Producto::all(),200);
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("producto")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function getByProductoNombre($productoNombre){
        try{

        $Producto = Producto::findByProductoNombre($productoNombre);

        if(empty($Producto)){
            Log::channel("producto")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
            Log::channel("producto")->info($Producto);
            return response($Producto, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("producto")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }
    
    public function store(Request $request)
    {
        try{

        $validator0 = Validator::make($request->all(), [ 
            'impuestoId' => 'required',
        ]);
 
        if($validator0->fails()){
            Log::channel("producto")->error("El impuesto no puede estar vacío");
            return response()->json(['Error'=>'El impuesto no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'productoNombre' => 'required|min:4|max:50',
        ]);
 
        if($validator1->fails()){
            Log::channel("producto")->error("El nombre del producto no puede estar vacío y debe tener entre 4 y 50 caracteres");
            return response()->json(['Error'=>'El nombre del producto no puede estar vacío y debe tener entre 4 y 50 caracteres.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'productoNombre' => 'unique:productos',
        ]);
 
        if($validator2->fails()){
            Log::channel("producto")->error("El nombre del producto debe ser único");
            return response()->json(['Error'=>'El nombre del producto debe ser único.'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'productoDescripcion' => 'required|min:10|max:100',
        ]);
 
        if($validator3->fails()){
            Log::channel("producto")->error("La descripción del producto no puede estar vacío y debe tener entre 10 y 100 caracteres");
            return response()->json(['Error'=>'La descripción del producto no puede estar vacío y debe tener entre 10 y 100 caracteres.'], 203);
        }

        $validator4 = Validator::make($request->all(), [ 
            'precio' => 'required|min:1|max:5',
        ]);
 
        if($validator4->fails()){
            Log::channel("producto")->error("El precio del producto no puede estar vacío y debe tener entre 1 y 5 dígitos");
            return response()->json(['Error'=>'El precio del producto no puede estar vacío y debe tener entre 1 y 5 dígitos.'], 203);
        }

        $validator5 = Validator::make($request->all(), [ 
            'descuento' => 'min:1|max:3',
        ]);
 
        if($validator5->fails()){
            Log::channel("producto")->error("El descuento debe tener entre 1 y 3 dígitos");
            return response()->json(['Error'=>'El descuento debe tener entre 1 y 3 dígitos.'], 203);
        }


        if ($request->precio > 20000 || $request->precio < 10){
            Log::channel("producto")->error("El precio debe estar entre L.10 y L.20,000");
            return response()->json(['Error'=>'El precio debe estar entre L.10 y L.20,000.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("producto")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

            $producto = Producto::create($request->all());
            Log::channel("producto")->info($producto);
            return response($producto, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("producto")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function show($id)
    {
        try{

        $producto = Producto::find($id);
        
        if  ($id < 1){
            Log::channel("producto")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero.'], 203);
        }

        if  (is_null($producto)){
            Log::channel("producto")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro.'], 203);
        }
            Log::channel("producto")->info($producto);
            return response($producto, 200);
            
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("producto")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function update(Request $request, $id)
    {
        try{

        $producto = Producto::find($id);
        
        if  ($id < 1){
            Log::channel("producto")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero.'], 203);
        }

        if  (is_null($producto)){
            Log::channel("producto")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro.'], 203);
        }

        $validator0 = Validator::make($request->all(), [ 
            'impuestoId' => 'required',
        ]);
 
        if($validator0->fails()){
            Log::channel("producto")->error("El impuesto no puede estar vacío");
            return response()->json(['Error'=>'El impuesto no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'productoNombre' => 'required|min:4|max:50',
        ]);
 
        if($validator1->fails()){
            Log::channel("producto")->error("El nombre del producto no puede estar vacío y debe tener entre 4 y 50 caracteres");
            return response()->json(['Error'=>'El nombre del producto no puede estar vacío y debe tener entre 4 y 50 caracteres.'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'productoDescripcion' => 'required|min:10|max:100',
        ]);
 
        if($validator3->fails()){
            Log::channel("producto")->error("La descripción del producto no puede estar vacío y debe tener entre 10 y 100 caracteres");
            return response()->json(['Error'=>'La descripción del producto no puede estar vacío y debe tener entre 10 y 100 caracteres.'], 203);
        }

        $validator4 = Validator::make($request->all(), [ 
            'precio' => 'required|min:1|max:5',
        ]);
 
        if($validator4->fails()){
            Log::channel("producto")->error("El precio del producto no puede estar vacío y debe tener entre 1 y 5 dígitos");
            return response()->json(['Error'=>'El precio del producto no puede estar vacío y debe tener entre 1 y 5 dígitos.'], 203);
        }

        $validator5 = Validator::make($request->all(), [ 
            'descuento' => 'min:1|max:3',
        ]);
 
        if($validator5->fails()){
            Log::channel("producto")->error("El descuento debe tener entre 1 y 3 dígitos");
            return response()->json(['Error'=>'El descuento debe tener entre 1 y 3 dígitos.'], 203);
        }

        if ($request->precio > 20000 || $request->precio < 10){
            Log::channel("producto")->error("El precio debe estar entre L.10 y L.20,000");
            return response()->json(['Error'=>'El precio debe estar entre L.10 y L.20,000.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            Log::channel("producto")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

            $producto->update($request->all());
            Log::channel("producto")->info($producto);
            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
        
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Log::channel("producto")->error("Datos repetidos");
                return response()->json(['Error'=>'Los siguientes datos deben ser únicos: Nombre del Producto.'], 203);
            }else{
                $errormessage = $e->getMessage();
                Log::channel("producto")->error($errormessage);
                return response()->json(['Error'=>$errormessage], 203);
            }
        }

    }

    public function destroy($id)
    {
        $producto = Producto::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
