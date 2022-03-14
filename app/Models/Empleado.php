<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Empleado
 *
 * @property $id
 * @property $tipoDocumentoId
 * @property $empleadoNombre
 * @property $empleadoNumero
 * @property $empleadoDireccion
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
    
    static $rules = [
		'tipoDocumentoId' => 'required',
    'numeroDocumento' => 'required',
		'empleadoNombre' => 'required',
		'empleadoNumero' => 'required',
    'empleadoCorreo' => 'required',
    'empleadoUsuario' => 'required',
    'empleadoContrasenia' => 'required',
		'empleadoDireccion' => 'required',
    'fechaContratacion' => 'required',
    'fechaNacimiento' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipoDocumentoId','numeroDocumento','empleadoNombre','empleadoNumero', 'empleadoCorreo',
    'empleadoUsuario','empleadoContrasenia','empleadoDireccion','fechaContratacion','fechaNacimiento','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoDocumento()
    {
        return $this->hasOne('App\Models\TipoDocumento', 'id', 'tipoDocumentoId');
    }
    

    //New Collections
    public static function findByEmpleadoNombre($empleadoNombre){
        
      return $Empleado = DB::table('empleados')->where('empleadoNombre', $empleadoNombre)->get();

    }

}
