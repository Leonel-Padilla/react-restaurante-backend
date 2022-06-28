<?php

namespace App\Http\Controllers;

use App\Models\CompraDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Class CompraDetalleController
 * @package App\Http\Controllers
 */
class CompraDetalleController extends Controller
{

    public function getCompraDetalle(){
        try{
            return response()->json(CompraDetalle::all(),200);
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("compradetalle")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function getByCompraEncabezadoId($compraEncabezado){
        try{
            $compraEncabezado = CompraDetalle::findByCompraEncabezadoId($compraEncabezado);

            if(empty($compraEncabezado)){
                Log::channel("compradetalle")->error("Registro no encontrado");
                return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
            }
            Log::channel("compradetalle")->info($compraEncabezado);
            return response($compraEncabezado, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("compradetalle")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }
   
    public function store(Request $request)
    {
        try{
        $validator0 = Validator::make($request->all(), [ 
            'insumoId' => 'required',
        ]);
 
        if($validator0->fails()){
            Log::channel("compradetalle")->error("El insumo no puede estar vacío");
            return response()->json(['Error'=>'El insumo no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'compraEncabezadoId' => 'required',
        ]);
 
        if($validator1->fails()){
            Log::channel("compradetalle")->error("La compra del encabezado no puede estar vacío");
            return response()->json(['Error'=>'La compra del encabezado no puede estar vacío.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'precio' => 'required',
        ]);
 
        if($validator2->fails()){
            Log::channel("compradetalle")->error("El precio no puede estar vacío");
            return response()->json(['Error'=>'El precio no puede estar vacío.'], 203);
        }
        
        $validator3 = Validator::make($request->all(), [ 
            'cantidad' => 'required',
        ]);
 
        if($validator3->fails()){
            Log::channel("compradetalle")->error("La cantidad no puede estar vacía");
            return response()->json(['Error'=>'La cantidad no puede estar vacía.'], 203);
        }

        if ($request->precio < 0 || $request->precio > 50000){
            Log::channel("compradetalle")->error("El precio tiene que estar entre 0 a 50,000");
            return response()->json(['Error'=>'El precio tiene que estar entre 0 a 50,000.'], 203);
        }

        if ($request->cantidad < 0 || $request->cantidad > 999){
            Log::channel("compradetalle")->error("La cantidad excede lo permitido, debe estar entre 0 a 999");
            return response()->json(['Error'=>'La cantidad excede lo permitido, debe estar entre 0 a 999.'], 203);
        }

        if ($request->estado > 1 || $request->estado < 0){
            Log::channel("compradetalle")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

            $compraDetalle = CompraDetalle::create($request->all());
            Log::channel("compradetalle")->info($compraDetalle);
            return response($compraDetalle, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("compradetalle")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

   
    public function show($id)
    {
        try{

        $compraDetalle = CompraDetalle::find($id);

        if  ($id < 1){
            Log::channel("compradetalle")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($compraDetalle)){
            Log::channel("compradetalle")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

            return response($compraDetalle, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("compradetalle")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function update(Request $request, $id)
    {
        try{
        $compraDetalle = CompraDetalle::find($id);
        //Validaciones Busqueda
        if  ($id < 1){
            Log::channel("compradetalle")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($compraDetalle)){
            Log::channel("compradetalle")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [ 
            'insumoId' => 'required',
        ]);
 
        if($validator0->fails()){
            Log::channel("compradetalle")->error("El insumo no puede estar vacío");
            return response()->json(['Error'=>'El insumo no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'compraEncabezadoId' => 'required',
        ]);
 
        if($validator1->fails()){
            Log::channel("compradetalle")->error("La compra del encabezado no puede estar vacío");
            return response()->json(['Error'=>'La compra del encabezado no puede estar vacío.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'precio' => 'required',
        ]);
 
        if($validator2->fails()){
            Log::channel("compradetalle")->error("El precio no puede estar vacío");
            return response()->json(['Error'=>'El precio no puede estar vacío.'], 203);
        }
        
        $validator3 = Validator::make($request->all(), [ 
            'cantidad' => 'required',
        ]);
 
        if($validator3->fails()){
            Log::channel("compradetalle")->error("La cantidad no puede estar vacía");
            return response()->json(['Error'=>'La cantidad no puede estar vacía.'], 203);
        }

        if ($request->precio < 0 || $request->precio > 50000){
            Log::channel("compradetalle")->error("El precio tiene que estar entre 0 a 50,000");
            return response()->json(['Error'=>'El precio tiene que estar entre 0 a 50,000.'], 203);
        }

        if ($request->cantidad < 0 || $request->cantidad > 999){
            Log::channel("compradetalle")->error("La cantidad excede lo permitido, debe estar entre 0 a 999");
            return response()->json(['Error'=>'La cantidad excede lo permitido, debe estar entre 0 a 999.'], 203);
        }

        if ($request->estado > 1 || $request->estado < 0){
            Log::channel("compradetalle")->error("El estado solo puede ser 1 o 0");
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }
    
            $compraDetalle->update($request->all());
            Log::channel("compradetalle")->info($compraDetalle);
            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("compradetalle")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function destroy($id)
    {
        $compraDetalle = CompraDetalle::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
