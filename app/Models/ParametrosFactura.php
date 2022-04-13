<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ParametrosFactura
 *
 * @property $id
 * @property $sucursalId
 * @property $numeroCAI
 * @property $fechaDesde
 * @property $fechaHasta
 * @property $rangoInicial
 * @property $rangoFinal
 * @property $numeroFacturaActual
 * @property $puntoEmision
 * @property $establecimiento
 * @property $tipoDocumento
 * @property $rtn_Restaurante
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ParametrosFactura extends Model
{
    
    static $rules = [
    'sucursalId' => 'required',
		'numeroCAI' => 'required',
    'fechaDesde' => 'required',
    'fechaHasta' => 'required',
    'rangoInicial' => 'required',
    'rangoFinal' => 'required',
    'numeroFacturaActual' => 'required',
    'puntoEmision' => 'required',
    'establecimiento' => 'required',
    'tipoDocumento' => 'required',
		'rtn_Restaurante' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['sucursalId','numeroCAI','fechaDesde','fechaHasta','rangoInicial','rangoFinal','numeroFacturaActual','puntoEmision','establecimiento','tipoDocumento','rtn_Restaurante','estado'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sucursal()
    {
        return $this->hasOne('App\Models\Sucursal', 'id', 'sucursalId');
    }

}
