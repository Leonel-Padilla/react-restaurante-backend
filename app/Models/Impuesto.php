<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Impuesto
 *
 * @property $id
 * @property $valorImpuesto
 * @property $nombreImpuesto
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Impuesto extends Model
{
    
    static $rules = [
		'valorImpuesto' => 'required',
		'nombreImpuesto' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['valorImpuesto','nombreImpuesto','estado'];



}
