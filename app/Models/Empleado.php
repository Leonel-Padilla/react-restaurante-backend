<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
		'empleadoNombre' => 'required',
		'empleadoNumero' => 'required',
		'empleadoDireccion' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipoDocumentoId','empleadoNombre','empleadoNumero','empleadoDireccion', 'empleadoCorreo','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoDocumento()
    {
        return $this->hasOne('App\Models\TipoDocumento', 'id', 'tipoDocumentoId');
    }
    

}
