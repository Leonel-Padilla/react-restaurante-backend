<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SueldoHistorial
 *
 * @property $id
 * @property $empleadoId
 * @property $sueldo
 * @property $fechaInicio
 * @property $fechaFinal
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SueldoHistorial extends Model
{
    
    static $rules = [
		'empleadoId' => 'required',
    'sueldo' => 'required',
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
    protected $fillable = ['empleadoId','sueldo','fechaInicio','fechaFinal','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'empleadoId');
    }
    

}
