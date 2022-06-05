<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use ESolution\DBEncryption\Traits\EncryptedAttribute;

/**
 * Class Empleado
 *
 * @property $id
 * @property $tipoDocumentoId
 * @property $empleadoNombre
 * @property $empleadoNumero
 * @property $empleadoCorreo
 * @property $empleadoUsuario
 * @property $empleadoContrasenia
 * @property $empleadoDireccion
 * @property $empleadoSueldo
 * @property $cargoActualId
 * @property $fechaContratacion
 * @property $fechaNacimiento
 * @property $sucursalId
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property TipoDocumento $tipoDocumento
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empleado extends Model
{

  use EncryptedAttribute;


    protected $encryptable=[
      'empleadoContrasenia'
    ];
    
    static $rules = [
		'tipoDocumentoId' => 'required',
    'numeroDocumento' => 'required',
		'empleadoNombre' => 'required',
		'empleadoNumero' => 'required',
    'empleadoCorreo' => 'required',
    'empleadoUsuario' => 'required',
    'empleadoContrasenia' => 'required',
		'empleadoDireccion' => 'required',
    'empleadoSueldo' => 'required',
    'cargoActualId' => 'required',
    'fechaContratacion' => 'required',
    'fechaNacimiento' => 'required',
    'fechaBloqueo' => 'nullable',
    'sucursalId' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipoDocumentoId','numeroDocumento','empleadoNombre','empleadoNumero', 'empleadoCorreo',
    'empleadoUsuario','empleadoContrasenia','empleadoDireccion','empleadoSueldo','cargoActualId','fechaContratacion','fechaNacimiento',
    'fechaBloqueo','sucursalId','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoDocumento()
    {
        return $this->hasOne('App\Models\TipoDocumento', 'id', 'tipoDocumentoId');
    }

    public function sucursal()
    {
        return $this->hasOne('App\Models\Sucursal', 'id', 'sucursalId');
    }
    

    //New Collections
    public static function findByEmpleadoNombre($empleadoNombre){
        
      return $Empleado = DB::table('empleados')->where('empleadoNombre','LIKE', "%$empleadoNombre%")->get();

    }

    public static function findByEmpleadoUsuario($empleadoUsuario){
      
        
      return $Empleado = DB::table('empleados')->where('empleadoUsuario','LIKE', "%$empleadoUsuario%")->get();
    
    }

    public static function findByNumeroDocumento($numeroDocumento){

      return $Empleado = DB::table('empleados')->where('numeroDocumento','LIKE', "%$numeroDocumento%")->get();

    }

    public static function findByNumeroEmpleado($empleadoNumero){

      return $Empleado = DB::table('empleados')->where('empleadoNumero','LIKE', "%$empleadoNumero%")->get();

    }

    public static function findByCorreoEmpleado($empleadoCorreo){

      return $Empleado = DB::table('empleados')->where('empleadoCorreo','LIKE', "%$empleadoCorreo%")->get();

    }



}
