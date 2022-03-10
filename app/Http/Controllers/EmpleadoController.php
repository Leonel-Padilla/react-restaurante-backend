<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

/**
 * Class EmpleadoController
 * @package App\Http\Controllers
 */
class EmpleadoController extends Controller
{   

    //
    public function getEmpleado(){
        return response()->json(Empleado::all(),200);
    }

    //
    public function getByEmpleadoNombre($nombreEmpleado){

        $empleado = Empleado::findByEmpleadoNombre($nombreEmpleado);

        if(empty($empleado)){
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }

        return response($empleado, 200);
    }

    //
    public function store(Request $request)
    {   
        if (strlen($request->empleadoNombre) === 0){
            return response()->json(['Error'=>'El nombre no puede estar vacio'], 203);
        }
        if (strlen($request->empleadoNumero) < 8 || strlen($request->empleadoNumero) > 8){
            return response()->json(['Error'=>'El numero del empleado tiene que ser igual a 8'], 203);
        }
        if (strlen($request->empleadoDireccion) === 0){
            return response()->json(['Error'=>'La direccion del empleado no puede estar vacio'], 203);
        }
        if (strlen($request->empleadoCorreo) === 0){
            return response()->json(['Error'=>'El Correo del empleado no puede estar vacio'], 203);
        }
        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $empleado = Empleado::create($request->all());

        return response($empleado, 200);
    }

    //
    public function show($id)
    {
        $empleado = Empleado::find($id);

        if  ($id < 1){
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($empleado)){
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
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($empleado)){
            return response()->json(['Error'=>'No existe este registro'], 203);
        }

        //Validaciones Actualizar
        if (strlen($request->empleadoNombre) === 0){
            return response()->json(['Error'=>'El nombre no puede estar vacio'], 203);
        }
        if (strlen($request->empleadoNumero) === 0){
            return response()->json(['Error'=>'El numero del empleado no puede estar vacio'], 203);
        }
        if (strlen($request->empleadoDireccion) === 0){
            return response()->json(['Error'=>'La direccion del empleado no puede estar vacio'], 203);
        }
        if (strlen($request->empleadoCorreo) === 0){
            return response()->json(['Error'=>'El Correo del empleado no puede estar vacio'], 203);
        }
        if ($request->estado > 1|| $request->estado < 0){
            return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
        }

        $empleado->update($request->all());

        return response()->json(['Mensaje'=>'Registro Actualizado con exito'], 200);
    }

    //
    public function destroy($id)
    {
        $empleado = Empleado::find($id)->delete();

        return response()->json(['Mensaje'=>'Eliminado con exito'], 200);
    }
}
