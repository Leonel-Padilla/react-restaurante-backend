<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Pantalla
 *
 * @property $id
 * @property $nombrePantalla
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pantalla extends Model
{
    
    static $rules = [
		'nombrePantalla' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombrePantalla','estado'];

    //New Collections
    public static function findByPantallaNombre($nombrePantalla){
        
      return $pantalla = DB::table('pantallas')->where('nombrePantalla', $nombrePantalla)->get();

    }

}
