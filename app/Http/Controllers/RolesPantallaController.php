<?php

namespace App\Http\Controllers;

use App\Models\RolesPantalla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

/**
 * Class RolesPantallaController
 * @package App\Http\Controllers
 */
class RolesPantallaController extends Controller
{
    public function getRolPantalla(){
        try{
            return response()->json(RolesPantalla::all(),200);
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("rolPantalla")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function getByPantallaId($pantallaId){
        try{

        $rolesPantalla = RolesPantalla::findByPantallaId($pantallaId);

        if(empty($rolesPantalla)){
            Log::channel("rolPantalla")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
            Log::channel("rolPantalla")->info($rolesPantalla);
            return response($rolesPantalla, 200);

        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("rolPantalla")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function getByRolesId($rolesId){
        try{

        $rolesPantalla = RolesPantalla::findByRolesId($rolesId);

        if(empty($rolesPantalla)){
            Log::channel("rolPantalla")->error("Registro no encontrado");
            return response()->json(['Mensaje' => 'Registro no encontrado'], 203);
        }
            Log::channel("rolPantalla")->info($rolesPantalla);
            return response($rolesPantalla, 200);
        }catch(\Illuminate\Database\QueryException $e){
            $errormessage = $e->getMessage();
            Log::channel("rolPantalla")->error($errormessage);
            return response()->json(['Error'=>$errormessage], 203);
        }
    }

    public function store(Request $request)
    {
        try{
            
            $validator1 = Validator::make($request->all(), [ 
                'rolesId' => 'required',
            ]);
     
            if($validator1->fails()){
                Log::channel("rolPantalla")->error("El id del rol no puede estar vacio");
                return response()->json(['Error'=>'El id del rol no puede estar vacio'], 203);
            }

            $validator2 = Validator::make($request->all(), [ 
                'pantallaId' => 'required',
            ]);
     
            if($validator2->fails()){
                Log::channel("rolPantalla")->error("El id de la pantalla no puede estar vacio");
                return response()->json(['Error'=>'El id de la pantalla no puede estar vacio'], 203);
            }
            
            $validator3 = Validator::make($request->all(), [ 
                'buscar' => 'required',
            ]);
     
            if($validator3->fails()){
                Log::channel("rolPantalla")->error("La validación de buscar no puede estar vacio");
                return response()->json(['Error'=>'La validación de buscar no puede estar vacio'], 203);
            }

            $validator4 = Validator::make($request->all(), [ 
                'actualizar' => 'required',
            ]);
     
            if($validator4->fails()){
                Log::channel("rolPantalla")->error("La validación de actualizar no puede estar vacio");
                return response()->json(['Error'=>'La validación de actualizar no puede estar vacio'], 203);
            }

            $validator5 = Validator::make($request->all(), [ 
                'registrar' => 'required',
            ]);
     
            if($validator5->fails()){
                Log::channel("rolPantalla")->error("La validación de registrar no puede estar vacio");
                return response()->json(['Error'=>'La validación de registrar no puede estar vacio'], 203);
            }

            $validator6 = Validator::make($request->all(), [ 
                'imprimirReportes' => 'required',
            ]);
     
            if($validator6->fails()){
                Log::channel("rolPantalla")->error("La validación de imprimir reportes no puede estar vacio");
                return response()->json(['Error'=>'La validación de imprimir reportes no puede estar vacio'], 203);
            }

            // $validator7 = Validator::make($request->all(), [ 
            //     'reimprimir' => 'required',
            // ]);
     
            // if($validator7->fails()){
            //     Log::channel("rolPantalla")->error("La validación de reimprimir no puede estar vacio");
            //     return response()->json(['Error'=>'La validación de reimprimir no puede estar vacio'], 203);
            // }

            // $validator8 = Validator::make($request->all(), [ 
            //     'detalles' => 'required',
            // ]);
     
            // if($validator8->fails()){
            //     Log::channel("rolPantalla")->error("La validación de detalles no puede estar vacio");
            //     return response()->json(['Error'=>'La validación de detalles no puede estar vacio'], 203);
            // }

            if ($request->estado > 1|| $request->estado < 0){
                Log::channel("rolPantalla")->error("El estado solo puede ser 1 o 0");
                return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
            }

            $rolesPantalla = RolesPantalla::create($request->all());
            Log::channel("rolPantalla")->info($rolesPantalla);
            return response($rolesPantalla, 200);
        
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->getMessage();
            Log::channel("rolPantalla")->error($errorCode);
            return response()->json(['Error'=>$errorCode], 203);
        }
    }

    public function show($id)
    {
        $rolesPantalla = RolesPantalla::find($id);

        if  ($id < 1){
            Log::channel("rolPantalla")->error("El Id no puede ser menor o igual a cero");
            return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
        }

        if  (is_null($role)){
            Log::channel("rolPantalla")->error("No existe este registro");
            return response()->json(['Error'=>'No existe este registro'], 203);
        }
    }

    public function update(Request $request, $id)
    {
        try{

            $rolesPantalla = RolesPantalla::find($id);

            if  ($id < 1){
                Log::channel("rolPantalla")->error("El Id no puede ser menor o igual a cero");
                return response()->json(['Error'=>'El Id no puede ser menor o igual a cero'], 203);
            }
    
            if  (is_null($role)){
                Log::channel("rolPantalla")->error("No existe este registro");
                return response()->json(['Error'=>'No existe este registro'], 203);
            }
            
            $validator1 = Validator::make($request->all(), [ 
                'rolesId' => 'required',
            ]);
     
            if($validator1->fails()){
                Log::channel("rolPantalla")->error("El id del rol no puede estar vacio");
                return response()->json(['Error'=>'El id del rol no puede estar vacio'], 203);
            }

            $validator2 = Validator::make($request->all(), [ 
                'pantallaId' => 'required',
            ]);
     
            if($validator2->fails()){
                Log::channel("rolPantalla")->error("El id de la pantalla no puede estar vacio");
                return response()->json(['Error'=>'El id de la pantalla no puede estar vacio'], 203);
            }
            
            $validator3 = Validator::make($request->all(), [ 
                'buscar' => 'required',
            ]);
     
            if($validator3->fails()){
                Log::channel("rolPantalla")->error("La validación de buscar no puede estar vacio");
                return response()->json(['Error'=>'La validación de buscar no puede estar vacio'], 203);
            }

            $validator4 = Validator::make($request->all(), [ 
                'actualizar' => 'required',
            ]);
     
            if($validator4->fails()){
                Log::channel("rolPantalla")->error("La validación de actualizar no puede estar vacio");
                return response()->json(['Error'=>'La validación de actualizar no puede estar vacio'], 203);
            }

            $validator5 = Validator::make($request->all(), [ 
                'registrar' => 'required',
            ]);
     
            if($validator5->fails()){
                Log::channel("rolPantalla")->error("La validación de registrar no puede estar vacio");
                return response()->json(['Error'=>'La validación de registrar no puede estar vacio'], 203);
            }

            $validator6 = Validator::make($request->all(), [ 
                'imprimirReportes' => 'required',
            ]);
     
            if($validator6->fails()){
                Log::channel("rolPantalla")->error("La validación de imprimir reportes no puede estar vacio");
                return response()->json(['Error'=>'La validación de imprimir reportes no puede estar vacio'], 203);
            }

            // $validator7 = Validator::make($request->all(), [ 
            //     'reimprimir' => 'required',
            // ]);
     
            // if($validator7->fails()){
            //     Log::channel("rolPantalla")->error("La validación de reimprimir no puede estar vacio");
            //     return response()->json(['Error'=>'La validación de reimprimir no puede estar vacio'], 203);
            // }

            // $validator8 = Validator::make($request->all(), [ 
            //     'detalles' => 'required',
            // ]);
     
            // if($validator8->fails()){
            //     Log::channel("rolPantalla")->error("La validación de detalles no puede estar vacio");
            //     return response()->json(['Error'=>'La validación de detalles no puede estar vacio'], 203);
            // }

            if ($request->estado > 1|| $request->estado < 0){
                Log::channel("rolPantalla")->error("El estado solo puede ser 1 o 0");
                return response()->json(['Error'=>'El estado solo puede ser 1 o 0'], 203);
            }

            $rolesPantalla->update($request->all());
            Log::channel("rolPantalla")->info($rolesPantalla);
            return response($rolesPantalla, 200);

            }catch(\Illuminate\Database\QueryException $e){
                $errorCode = $e->getMessage();
                Log::channel("rol")->error($errorCode);
                return response()->json(['Error'=>$errorCode], 203);
            }
    }

    public function destroy($id)
    {
        $rolesPantalla = RolesPantalla::find($id)->delete();

        return redirect()->route('roles-pantallas.index')
            ->with('success', 'RolesPantalla deleted successfully');
    }
}
