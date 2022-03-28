<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Producto
 *
 * @property $id
 * @property $productoNombre
 * @property $productoDescripcion
 * @property $precio
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'productoNombre' => 'required',
		'productoDescripcion' => 'required',
		'precio' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['productoNombre','productoDescripcion','precio','estado'];

    //New Collections
    public static function findByProductoNombre($productoNombre){
        
      return $Producto = DB::table('productos')->where('productoNombre', $productoNombre)->get();
  
    }


}
