<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoDocumento
 *
 * @property $id
 * @property $nombreDocumento
 * @property $numeroDocumento
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoDocumento extends Model
{
    
    static $rules = [
		'nombreDocumento' => 'required',
		'numeroDocumento' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombreDocumento','numeroDocumento','estado'];



}
