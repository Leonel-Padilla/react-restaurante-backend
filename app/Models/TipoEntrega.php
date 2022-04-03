<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoEntrega
 *
 * @property $id
 * @property $nombreTipoEntrega
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoEntrega extends Model
{
    
    static $rules = [
		'nombreTipoEntrega' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombreTipoEntrega','estado'];



}
