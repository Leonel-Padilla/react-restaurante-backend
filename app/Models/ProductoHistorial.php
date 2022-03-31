<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductoHistorial
 *
 * @property $id
 * @property $productoId
 * @property $precio
 * @property $fechaInicio
 * @property $fechaFinal
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto $producto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProductoHistorial extends Model
{
    
    static $rules = [
		'productoId' => 'required',
		'precio' => 'required',
		'fechaInicio' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['productoId','precio','fechaInicio','fechaFinal','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'productoId');
    }

    //New Collections
    public static function findByProductoId($productoId){
        
      return $Producto = DB::table('producto_historials')->where('productoId', $productoId)->get();
    
    }
    

}
