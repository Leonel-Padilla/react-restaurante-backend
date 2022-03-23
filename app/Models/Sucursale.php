<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Sucursale
 *
 * @property $id
 * @property $empleadoId
 * @property $sucursalNombre
 * @property $sucursalDireccion
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class Sucursale extends Model
{
    
    static $rules = [
		'empleadoId' => 'required',
    'sucursalNombre' => 'required',
		'sucursalDireccion' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['empleadoId', 'sucursalNombre', 'sucursalDireccion','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'empleadoId');
    }
    
    //New Collections
    public static function findBySucursalNombre($sucursalNombre){
        
      return $Sucursal = DB::table('sucursales')->where('sucursalNombre', $sucursalNombre)->get();

    }

    public static function findBySucursalEncargado($empleadoId){
        
      return $Sucursal = DB::table('sucursales')->where('empleadoId', $empleadoId)->get();

    }


}
