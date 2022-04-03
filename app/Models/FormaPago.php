<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FormaPago
 *
 * @property $id
 * @property $nombreFormaPago
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class FormaPago extends Model
{
    
    static $rules = [
		'nombreFormaPago' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombreFormaPago','estado'];



}
