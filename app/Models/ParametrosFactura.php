<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ParametrosFactura
 *
 * @property $id
 * @property $cai_Restaurante
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
		'cai_Restaurante' => 'required',
		'rtn_Restaurante' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cai_Restaurante','rtn_Restaurante','estado'];



}
