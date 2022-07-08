<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Class RoleController
 * @package App\Http\Controllers
 */
class RoleController extends Controller
{
    
    public function getRol(){
        try{
            return response()->json(Role::all(),200);
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("rol")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function getByRolNombre($nombre){
        try{
            $role = Role::findByRolNombre($nombre);
            if(empty($role)){
                Log::channel("rol")->error("Registro no encontrado");
                return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
            }
            Log::channel("rol")->info($role);
            return response($role, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("rol")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function store(Request $request)
    {
        try{
            
            $validator1 = Validator::make($request->all(), [ 
                'nombre' => 'unique:roles',
            ]);
     
            if($validator1->fails()){
                Log::channel("rol")->error("No se puede repetir el nombre del rol");
                return response()->json(['Error'=>'No se puede repetir el nombre del rol'], 203);
            }

            $validator2 = Validator::make($request->all(), [ 
                'nombre' => 'required',
            ]);
     
            if($validator2->fails()){
                Log::channel("rol")->error("El nombre del rol no puede estar vacío");
                return response()->json(['Error'=>'El nombre del rol no puede estar vacío"'], 203);
            }

            if ($request->estado > 1|| $request->estado < 0){
                Log::channel("rol")->error("El estado solo puede ser 1 o 0");
                return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
            }

            $role = Role::create($request->all());
            Log::channel("rol")->info($role);
            return response($role, 200);
        
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->getMessage();
            Log::channel("rol")->error($errorCode);
            return response()->json(['Error'=>$errorCode], 203);
        }
    }

   
    public function show($id)
    {
        $role = Role::find($id);

        if  ($id < 1){
            Log::channel("rol")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
         }

        if  (is_null($role)){
            Log::channel("rol")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
         }

    }

    public function update(Request $request, $id)
    {
        try{

            $role = Role::find($id);

            //Validaciones Busqueda
           if  ($id < 1){
               Log::channel("rol")->error("El Id no puede ser menor o igual a cero");
               return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
            }
   
           if  (is_null($role)){
               Log::channel("rol")->error("No existe este registro");
               return response()->json(['Error'=>'No existe este registro'], 203);
            }
            
            $validator1 = Validator::make($request->all(), [ 
                'nombre' => 'unique:roles',
            ]);
     
            if($validator1->fails()){
                Log::channel("rol")->error("No se puede repetir el nombre del rol");
                return response()->json(['Error'=>'No se puede repetir el nombre del rol'], 203);
            }

            $validator2 = Validator::make($request->all(), [ 
                'nombre' => 'required',
            ]);
     
            if($validator2->fails()){
                Log::channel("rol")->error("El nombre del rol no puede estar vacío");
                return response()->json(['Error'=>'El nombre del rol no puede estar vacío"'], 203);
            }

            if ($request->estado > 1|| $request->estado < 0){
                Log::channel("rol")->error("El estado solo puede ser 1 o 0");
                return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
            }
            
            $role = Role::update($request->all());
            Log::channel("rol")->info($role);
            return response($role, 200);
        
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Log::channel("rol")->error("Datos repetidos");
                return response()->json(['Error'=>'Los siguientes datos deben ser únicos: Nombre.'], 203);
            }else{
                $errorCode = $e->getMessage();
                Log::channel("rol")->error($errorCode);
                return response()->json(['Error'=>$errorCode], 203);
            }
        }
    }


    public function destroy($id)
    {
        $role = Role::find($id)->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }
}
