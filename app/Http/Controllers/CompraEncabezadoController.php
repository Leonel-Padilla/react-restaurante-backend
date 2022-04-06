<?php

namespace App\Http\Controllers;

use App\Models\CompraEncabezado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class CompraEncabezadoController
 * @package App\Http\Controllers
 */
class CompraEncabezadoController extends Controller
{

    public function getCompraEncabezado(){
        return response()->json(CompraEncabezado::all(),200);
    }

    public function getByProveedor($proveedorId){

        $compraEncabezado = CompraEncabezado::findByProveedor($proveedorId);

        if(empty($compraEncabezado)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }

        return response($compraEncabezado, 200);
    }

    public function getByEstadoCompra($estadoCompra){

        $compraEncabezado = CompraEncabezado::findByEstadoCompra($estadoCompra);

        if(empty($compraEncabezado)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }

        return response($compraEncabezado, 200);
    }


    public function store(Request $request)
    {
        $validator0 = Validator::make($request->all(), [ 
            'proveedorId' => 'required',
        ]);

        if($validator0->fails()){
            return response()->json(['Error'=>'El proveedor no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'empleadoId' => 'required',
        ]);
 
        if($validator1->fails()){
            return response()->json(['Error'=>'El empleado no puede estar vacío.'], 203);
        }

        $validator2 = Validator::make($request->all(), [ 
            'fechaSolicitud' => 'required',
        ]);
 
        if($validator2->fails()){
            return response()->json(['Error'=>'La fecha de solicitud no estar vacío.'], 203);
        }

        if ($request->fechaEntregaCompra !== null){

            $validator3 = Validator::make($request->all(), [ 
                'fechaSolicitud' => 'date|before:fechaEntregaCompra',
            ]);
     
            if($validator3->fails()){
                return response()->json(['Error'=>'La fecha de solicitud no puede ser después de la fecha de entrega.'], 203);
            }
        }

        if ($request->fechaPagoCompra !== null){

            $validator4 = Validator::make($request->all(), [ 
                'fechaSolicitud' => 'date|before:fechaPagoCompra',
            ]);
     
            if($validator4->fails()){
                return response()->json(['Error'=>'La fecha de solicitud no puede ser después de la fecha de pago.'], 203);
            }
    
        }

        $validator5 = Validator::make($request->all(), [ 
            'estadoCompra' => 'required|min:3|max:20',
        ]);
 
        if($validator5->fails()){
            return response()->json(['Error'=>'El estado de compra no puede estar vacío y debe tener entre 3 a 20 caracteres.'], 203);
        }

        $validator6 = Validator::make($request->all(), [ 
            'numeroFactura' => 'required|min:16|max:16',
        ]);
 
        if($validator6->fails()){
            return response()->json(['Error'=>'El número de factura no puede estar vacío y debe de tener 16 caracteres.'], 203);
        }

        $validator7 = Validator::make($request->all(), [ 
            'cai' => 'required|min:32|max:32',
        ]);
 
        if($validator7->fails()){
            return response()->json(['Error'=>'El CAI no puede estar vacío y debe de tener 32 caracteres.'], 203);
        }
        //

        $validator8 = Validator::make($request->all(), [ 
            'numeroFacturaCai' => 'required|min:49|max:49',
        ]);
 
        if($validator8->fails()){
            return response()->json(['Error'=>'Debe ingresar los datos del número de factura y el CAI.'], 203);
        }

        $validator9 = Validator::make($request->all(), [ 
            'numeroFacturaCai' => 'unique:compra_encabezados',
        ]);
 
        if($validator9->fails()){
            return response()->json(['Error'=>'La combinación del número de factura y CAI deben ser únicos.'], 203);
        }

        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $compraEncabezado = CompraEncabezado::create($request->all());

        return response($compraEncabezado, 200);
    }

    public function show($id)
    {
        $compraEncabezado = CompraEncabezado::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($compraEncabezado)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        return response($compraEncabezado, 200);
    }

    public function update(Request $request, $id)
    {
        $compraEncabezado = CompraEncabezado::find($id);
        //Validaciones Busqueda
        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($compraEncabezado)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        $validator0 = Validator::make($request->all(), [ 
            'proveedorId' => 'required',
        ]);
 
        if($validator0->fails()){
            return response()->json(['Error'=>'El proveedor no puede estar vacío.'], 203);
        }

        $validator1 = Validator::make($request->all(), [ 
            'empleadoId' => 'required',
        ]);

        if($validator1->fails()){
            return response()->json(['Error'=>'El empleado no puede estar vacío.'], 203);
        }


        $validator2 = Validator::make($request->all(), [ 
            'fechaSolicitud' => 'required',
        ]);
 
        if($validator2->fails()){
            return response()->json(['Error'=>'La fecha de solicitud no estar vacío.'], 203);
        }

        if ($request->fechaEntregaCompra !== null){

            $validator3 = Validator::make($request->all(), [ 
                'fechaSolicitud' => 'date|before:fechaEntregaCompra',
            ]);
     
            if($validator3->fails()){
                return response()->json(['Error'=>'La fecha de solicitud no puede ser después de la fecha de entrega.'], 203);
            }
        }

        if ($request->fechaPagoCompra !== null){

            $validator4 = Validator::make($request->all(), [ 
                'fechaSolicitud' => 'date|before:fechaPagoCompra',
            ]);
     
            if($validator4->fails()){
                return response()->json(['Error'=>'La fecha de solicitud no puede ser después de la fecha de pago.'], 203);
            }
    
        }


        $validator5 = Validator::make($request->all(), [ 
            'estadoCompra' => 'required|min:3|max:20',
        ]);
 
        if($validator5->fails()){
            return response()->json(['Error'=>'El estado de compra no puede estar vacío y debe tener entre 3 a 20 caracteres.'], 203);
        }

        $validator6 = Validator::make($request->all(), [ 
            'numeroFactura' => 'required|min:16|max:16',
        ]);
 
        if($validator6->fails()){
            return response()->json(['Error'=>'El número de factura no puede estar vacío y debe de tener 16 caracteres.'], 203);
        }

        $validator7 = Validator::make($request->all(), [ 
            'cai' => 'required|min:32|max:32',
        ]);
 
        if($validator7->fails()){
            return response()->json(['Error'=>'El CAI no puede estar vacío y debe de tener 32 caracteres.'], 203);
        }

        $validator8 = Validator::make($request->all(), [ 
            'numeroFacturaCai' => 'required|min:49|max:49',
        ]);
 
        if($validator8->fails()){
            return response()->json(['Error'=>'Debe ingresar los datos del número de factura y el CAI.'], 203);
        }


        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        try {

            $compraEncabezado->update($request->all());

            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
        
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return response()->json(['Error'=>'Los siguientes datos deben ser únicos: Combinación de Número de factura y CAI.'], 203);
            }
        }

    }

    public function destroy($id)
    {
        $compraEncabezado = CompraEncabezado::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
