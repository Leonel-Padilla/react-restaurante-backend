<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{

    public function getProducto(){
        return response()->json(Producto::all(),200);
    }

    public function getByProductoNombre($productoNombre){


        $Producto = Producto::findByProductoNombre($productoNombre);

        if(empty($Producto)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
        return response($Producto, 200);
    }
    
    public function store(Request $request)
    {
        $validator0 = Validator::make($request->all(), [ 
            'productoNombre' => 'required|min:4|max:50',
        ]);
 
        if($validator0->fails()){
            return response()->json(['Error'=>'El nombre del producto no puede estar vacío y debe tener entre 4 y 50 caracteres.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'productoNombre' => 'unique:productos',
        ]);
 
        if($validator1->fails()){
            return response()->json(['Error'=>'El nombre del producto debe ser único.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'productoDescripcion' => 'required|min:10|max:100',
        ]);
 
        if($validator2->fails()){
            return response()->json(['Error'=>'La descripción del producto no puede estar vacío y debe tener entre 10 y 100 caracteres.'], 203);
        }

        $validator3 = Validator::make($request->all(), [ 
            'precio' => 'required|min:1|max:5',
        ]);
 
        if($validator3->fails()){
            return response()->json(['Error'=>'El precio del producto no puede estar vacío y debe tener entre 1 y 5 dígitos.'], 203);
        }

        if ($request->precio > 20000 || $request->precio < 100){
            return response()->json(['Error'=>'El precio debe estar entre L.100 y L.20,000.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $producto = Producto::create($request->all());

        return response($producto, 200);
    }

    public function show($id)
    {
        $producto = Producto::find($id);
        
        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero.'], 203);
        }

        if  (is_null($producto)){
            return response()->json(['Error'=>'No existe este registro.'], 203);
        }

        return response($producto, 200); 
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        
        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero.'], 203);
        }

        if  (is_null($producto)){
            return response()->json(['Error'=>'No existe este registro.'], 203);
        }

        $validator0 = Validator::make($request->all(), [ 
            'productoNombre' => 'required|min:4|max:50',
        ]);
 
        if($validator0->fails()){
            return response()->json(['Error'=>'El nombre del producto no puede estar vacío y debe tener entre 4 y 50 caracteres.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'productoDescripcion' => 'required|min:10|max:100',
        ]);
 
        if($validator1->fails()){
            return response()->json(['Error'=>'La descripción del producto no puede estar vacío y debe tener entre 10 y 100 caracteres.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'precio' => 'required|min:1|max:5',
        ]);
 
        if($validator2->fails()){
            return response()->json(['Error'=>'El precio del producto no puede estar vacío y debe tener entre 1 y 5 dígitos.'], 203);
        }

        if ($request->precio > 20000 || $request->precio < 100){
            return response()->json(['Error'=>'El precio debe estar entre L.100 y L.20,000.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        try {

            $producto->update($request->all());

            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
        
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return response()->json(['Error'=>'Los siguientes datos deben ser únicos: Nombre del Producto.'], 203);
            }
        }

    }

    public function destroy($id)
    {
        $producto = Producto::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
