<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class CargoHistorial
 *
 * @property $id
 * @property $empleadoId
 * @property $cargoId
 * @property $fechaInicio
 * @property $fechaFinal
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @property Cargo $cargo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CargoHistorial extends Model
{
    
    static $rules = [
		'empleadoId' => 'required',
    'cargoId' => 'required',
		'fechaInicio' => 'required',
		'fechaFinal' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['empleadoId','cargoId','fechaInicio','fechaFinal','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'empleadoId');
    }

    public function cargo()
    {
        return $this->hasOne('App\Models\Cargo', 'id', 'cargoId');
    }
    

        //New Collections
        public static function findByEmpleadoId($empleadoId){
        
          return $Empleado = DB::table('cargo_historials')->where('empleadoId', $empleadoId)->get();
    
        }
}
