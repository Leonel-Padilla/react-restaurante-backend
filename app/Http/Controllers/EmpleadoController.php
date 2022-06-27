<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Class EmpleadoController
 * @package App\Http\Controllers
 */
class EmpleadoController extends Controller
{   

    //
    public function getEmpleado(){
        Log::channel("empleado")->info("Registros encontrado");
        return response()->json(Empleado::all(),200);
    }

    //
    public function getByEmpleadoUsuario($empleadoUsuario){

        $empleado = Empleado::findByEmpleadoUsuario($empleadoUsuario);

        if(empty($empleado)){
            Log::channel("empleado")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
        Log::channel("empleado")->info($empleado);
        return response($empleado, 200);
    }

    //
    public function getByEmpleadoNombre($nombreEmpleado){

        $empleado = Empleado::findByEmpleadoNombre($nombreEmpleado);

        if(empty($empleado)){
            Log::channel("empleado")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
        Log::channel("empleado")->info($empleado);
        return response($empleado, 200);
    }

    public function getByNumeroDocumento($numeroDocumento){

        $empleado = Empleado::findByNumeroDocumento($numeroDocumento);

        if(empty($empleado)){
            Log::channel("empleado")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
        Log::channel("empleado")->info($empleado);
        return response($empleado, 200);
    }

    public function getByNumeroEmpleado($empleadoNumero){

        $empleado = Empleado::findByNumeroEmpleado($empleadoNumero);

        if(empty($empleado)){
            Log::channel("empleado")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
        Log::channel("empleado")->info($empleado);
        return response($empleado, 200);
    }

    public function getByCorreoEmpleado($empleadoCorreo){

        $empleado = Empleado::findByCorreoEmpleado($empleadoCorreo);

        if(empty($empleado)){
            Log::channel("empleado")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
        Log::channel("empleado")->info($empleado);
        return response($empleado, 200);
    }

    //
    public function store(Request $request)
    {   
        //
        $validator0 = Validator::make($request->all(), [ 
            'numeroDocumento' => 'unique:empleados',
        ]);
 
        if($validator0->fails()){
            Log::channel("empleado")->error("El número de documento de empleado debe ser único");
            return response()->json(['Error'=>'El número de documento de empleado debe ser único.'], 203);
        }
        //
        $validator1 = Validator::make($request->all(), [ 
            'numeroDocumento' => 'required',
        ]);
 
        if($validator1->fails()){
            Log::channel("empleado")->error("El número de documento no puede estar vacío");
            return response()->json(['Error'=>'El número de documento no puede estar vacío.'], 203);
        }
        //
        $validator2 = Validator::make($request->all(), [ 
            'empleadoNombre' => 'required|min:4|max:50',
        ]);
 
        if($validator2->fails()){
            Log::channel("empleado")->error("El nombre del empleado no puede estar vacío");
            return response()->json(['Error'=>'El nombre del empleado no puede estar vacío.'], 203);
        }
        //
        $validator3 = Validator::make($request->all(), [ 
            'empleadoNumero' => 'unique:empleados',
        ]);
 
        if($validator3->fails()){
            Log::channel("empleado")->error("El número del empleado debe ser único");
            return response()->json(['Error'=>'El número del empleado debe ser único.'], 203);
        }
        //
        $validator4 = Validator::make($request->all(), [ 
            'empleadoNumero' => 'required|starts_with:2,3,7,8,9|min:8|max:8',
        ]);
 
        if($validator4->fails()){
            Log::channel("empleado")->error("El numero del empleado debe tener 8 dígitos y debe comenzar con 2, 3, 7, 8 o un 9");
            return response()->json(['Error'=>'El numero del empleado debe tener 8 dígitos y debe comenzar con 2, 3, 7, 8 o un 9.'], 203);
        }
        //
        $validator5 = Validator::make($request->all(), [ 
            'empleadoCorreo' => 'unique:empleados',
        ]);
 
        if($validator5->fails()){
            Log::channel("empleado")->error("El correo del empleado debe ser único");
            return response()->json(['Error'=>'El correo del empleado debe ser único.'], 203);
        }
        //
        $validator6 = Validator::make($request->all(), [ 
            'empleadoCorreo' => 'required|email|min:10|max:50',
        ]);
 
        if($validator6->fails()){
            Log::channel("empleado")->error("El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com");
            return response()->json(['Error'=>'El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com'], 203);
        }
        //
        if (!str_contains($request->empleadoCorreo, "@") || !str_contains($request->empleadoCorreo, ".")){
            Log::channel("empleado")->error("El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com");
            return response()->json(['Error'=>'El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com'], 203);
        }
        //
        $validator7 = Validator::make($request->all(), [ 
            'empleadoUsuario' => 'unique:empleados',
        ]);
 
        if($validator7->fails()){
            Log::channel("empleado")->error("El usuario del empleado debe ser único");
            return response()->json(['Error'=>'El usuario del empleado debe ser único.'], 203);
        }
        //
        $validator8 = Validator::make($request->all(), [ 
            'empleadoUsuario' => 'required|min:4|max:20',
        ]);
 
        if($validator8->fails()){
            Log::channel("empleado")->error("El usuario del empleado debe tener de 4 a 20 caractes");
            return response()->json(['Error'=>'El usuario del empleado debe tener de 4 a 20 caractes'], 203);
        }
        //
        $validator9 = Validator::make($request->all(), [ 
            'empleadoContrasenia' => 'required|min:5|max:16',
        ]);
 
        if($validator9->fails()){
            Log::channel("empleado")->error("El contraseña del empleado debe tener de 5 a 16 caracteres");
            return response()->json(['Error'=>'El contraseña del empleado debe tener de 5 a 16 caracteres.'], 203);
        }
        //
        $validator10 = Validator::make($request->all(), [ 
            'empleadoDireccion' => 'required|min:10|max:50',
        ]);

        if($validator10->fails()){
            Log::channel("empleado")->error("La dirección del empleado debe tener de 10 a 50 caracteres");
            return response()->json(['Error'=>'La dirección del empleado debe tener de 10 a 50 caracteres.'], 203);
        }
        //
        $validator11 = Validator::make($request->all(), [ 
            'empleadoSueldo' => 'required|min:4|max:6',
        ]);

        if($validator11->fails()){
            Log::channel("empleado")->error("El sueldo no puede estar vacío y debe tener de 4 a 6 dígitos");
            return response()->json(['Error'=>'El sueldo no puede estar vacío y debe tener de 4 a 6 dígitos.'], 203);
        }
        //
        $validator12 = Validator::make($request->all(), [ 
            'fechaContratacion' => 'required',
        ]);

        if($validator12->fails()){
            Log::channel("empleado")->error("Debe ingresar una fecha de contratación");
            return response()->json(['Error'=>'Debe ingresar una fecha de contratación.'], 203);
        }
        //
        $validator13 = Validator::make($request->all(), [ 
            'fechaNacimiento' => 'required',
        ]);

        if($validator13->fails()){
            Log::channel("empleado")->error("Debe ingresar una fecha de de nacimiento");
            return response()->json(['Error'=>'Debe ingresar una fecha de de nacimiento.'], 203);
        }
        //
        $validator14 = Validator::make($request->all(), [ 
            'sucursalId' => 'required',
        ]);

        if($validator14->fails()){
            Log::channel("empleado")->error("La sucursal no puede estar vacío");
            return response()->json(['Error'=>'La sucursal no puede estar vacío.'], 203);
        }
        //
        if ($request->empleadoSueldo > 100000|| $request->empleadoSueldo < 5000 ){
            Log::channel("empleado")->error("El sueldo debe tener un minímo de L.5000 y un máximo de L.100,000");
            return response()->json(['Error'=>'El sueldo debe tener un minímo de L.5000 y un máximo de L.100,000'], 203);
        }


        $empleado = Empleado::create($request->all());
        Log::channel("empleado")->info($empleado);
        return response($empleado, 200);
    }

    //
    public function show($id)
    {
        $empleado = Empleado::find($id);

        if  ($id < 1){
            Log::channel("empleado")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($empleado)){
            Log::channel("empleado")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        return response($empleado, 200);
    }

    //
    public function update(Request $request, $id)
    {
        $empleado = Empleado::find($id);
        //Validaciones Busqueda
        if  ($id < 1){
            Log::channel("empleado")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($empleado)){
            Log::channel("empleado")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        
        /////////
        $validator1 = Validator::make($request->all(), [ 
            'numeroDocumento' => 'required',
        ]);
 
        if($validator1->fails()){
            Log::channel("empleado")->error("El número de documento no puede estar vacío");
            return response()->json(['Error'=>'El número de documento no puede estar vacío.'], 203);
        }
        //
        $validator2 = Validator::make($request->all(), [ 
            'empleadoNombre' => 'required|min:4|max:50',
        ]);
 
        if($validator2->fails()){
            Log::channel("empleado")->error("El nombre del empleado no puede estar vacío");
            return response()->json(['Error'=>'El nombre del empleado no puede estar vacío.'], 203);
        }
        //
        $validator4 = Validator::make($request->all(), [ 
            'empleadoNumero' => 'required|starts_with:2,3,7,8,9|min:8|max:8',
        ]);
 
        if($validator4->fails()){
            Log::channel("empleado")->error("El número del empleado debe tener 8 dígitos y debe comenzar con 2, 3, 7, 8 o un 9");
            return response()->json(['Error'=>'El número del empleado debe tener 8 dígitos y debe comenzar con 2, 3, 7, 8 o un 9.'], 203);
        }
        //
        $validator6 = Validator::make($request->all(), [ 
            'empleadoCorreo' => 'required|email|min:10|max:50',
        ]);
 
        if($validator6->fails()){
            Log::channel("empleado")->error("El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com");
            return response()->json(['Error'=>'El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com'], 203);
        }
        //
        if (!str_contains($request->empleadoCorreo, "@") || !str_contains($request->empleadoCorreo, ".")){
            Log::channel("empleado")->error("El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com");
            return response()->json(['Error'=>'El correo debe tener de 10 a 50 caracteres y un formato válido ejemplo@gmail.com'], 203);
        }
        //
        $validator8 = Validator::make($request->all(), [ 
            'empleadoUsuario' => 'required|min:4|max:20',
        ]);
 
        if($validator8->fails()){
            Log::channel("empleado")->error("El usuario del empleado debe tener de 4 a 20 caracteres");
            return response()->json(['Error'=>'El usuario del empleado debe tener de 4 a 20 caracteres'], 203);
        }
        //
        $validator9 = Validator::make($request->all(), [ 
            'empleadoContrasenia' => 'required|min:5|max:16',
        ]);
 
        if($validator9->fails()){
            Log::channel("empleado")->error("El contraseña del empleado debe tener de 5 a 16 caracteres");
            return response()->json(['Error'=>'El contraseña del empleado debe tener de 5 a 16 caracteres.'], 203);
        }
        //
        $validator10 = Validator::make($request->all(), [ 
            'empleadoDireccion' => 'required|min:10|max:50',
        ]);

        if($validator10->fails()){
            Log::channel("empleado")->error("La dirección del empleado debe tener de 10 a 50 caracteres");
            return response()->json(['Error'=>'La dirección del empleado debe tener de 10 a 50 caracteres.'], 203);
        }
        //
        $validator11 = Validator::make($request->all(), [ 
            'empleadoSueldo' => 'required|min:1|max:6',
        ]);

        if($validator11->fails()){
            Log::channel("empleado")->error("El sueldo no puede estar vacío y debe tener de 4 a 6 dígitos");
            return response()->json(['Error'=>'El sueldo no puede estar vacío y debe tener de 4 a 6 dígitos.'], 203);
        }
        //
        $validator12 = Validator::make($request->all(), [ 
            'fechaContratacion' => 'required',
        ]);

        if($validator12->fails()){
            Log::channel("empleado")->error("Debe ingresar una fecha de contratación");
            return response()->json(['Error'=>'Debe ingresar una fecha de contratación.'], 203);
        }
        //
        $validator13 = Validator::make($request->all(), [ 
            'fechaNacimiento' => 'required',
        ]);

        if($validator13->fails()){
            Log::channel("empleado")->error("Debe ingresar una fecha de nacimiento");
            return response()->json(['Error'=>'Debe ingresar una fecha de de nacimiento.'], 203);
        }
        //
        $validator14 = Validator::make($request->all(), [ 
            'sucursalId' => 'required',
        ]);

        if($validator14->fails()){
            Log::channel("empleado")->error("La sucursal no puede estar vacío");
            return response()->json(['Error'=>'La sucursal no puede estar vacío.'], 203);
        }
        //
        if ($request->empleadoSueldo > 100000|| $request->empleadoSueldo < 5000 ){
            Log::channel("empleado")->error("El sueldo debe tener un minímo de 5000 y un máximo de 100,000");
            return response()->json(['Error'=>'El sueldo debe tener un minímo de 5000 y un máximo de 100,000'], 203);
        }

        try {

            $empleado->update($request->all());
            Log::channel("empleado")->info($empleado);
            return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
        
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Log::channel("empleado")->error("Datos repetidos");
                return response()->json(['Error'=>'Los siguientes datos deben ser únicos: Número Documento, Número Empleado,
                Correo Empleado y el Usuario del Empleado.'], 203);
            }
        }

    }

    //
    public function destroy($id)
    {
        $empleado = Empleado::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
