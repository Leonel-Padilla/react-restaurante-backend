<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Producto
 *
 * @property $id
 * @property $impuestoId
 * @property $productoNombre
 * @property $productoDescripcion
 * @property $precio
 * @property $descuento
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
    'impuestoId' => 'required',
		'productoNombre' => 'required',
		'productoDescripcion' => 'required',
		'precio' => 'required',
    'descuento' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['impuestoId','productoNombre','productoDescripcion','precio','descuento','estado'];


     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function impuesto()
    {
        return $this->hasOne('App\Models\Impuesto', 'id', 'impuestoId');
    }
    //New Collections
    public static function findByProductoNombre($productoNombre){
        
      return $Producto = DB::table('productos')->where('productoNombre','LIKE', "%$productoNombre%")->get();
  
    }


}
