<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Cargo
 *
 * @property $id
 * @property $cargoNombre
 * @property $cargoDescripcion
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cargo extends Model
{
    
    static $rules = [
		'cargoNombre' => 'required',
		'cargoDescripcion' => 'required',
		'estado' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cargoNombre','cargoDescripcion','estado'];


     //New Collections
     public static function findByCargoNombre($cargoNombre){
        
      return $cargo = DB::table('cargos')->where('cargoNombre', $cargoNombre)->get();

    }


}
