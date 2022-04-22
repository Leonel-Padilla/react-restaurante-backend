<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class OrdenDetalle
 *
 * @property $id
 * @property $ordenEncabezadoId
 * @property $productoId
 * @property $precio
 * @property $cantidad
 * @property $descuentoProducto
 * @property $impuestoProducto
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto $producto
 * @property Empleado $empleado
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OrdenDetalle extends Model
{
    
    static $rules = [
		'ordenEncabezadoId' => 'required',
		'productoId' => 'required',
		'precio' => 'required',
		'cantidad' => 'required',
        'descuentoProducto' => 'required',
        'impuestoProducto' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ordenEncabezadoId','productoId','precio','cantidad','descuentoProducto','impuestoProducto','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ordenEncabezado()
    {
        return $this->hasOne('App\Models\OrdenEncabezado', 'id', 'ordenEncabezadoId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'productoId');
    }

    //New Collections
    public static function findByOrdenEncabezadoId($ordenEncabezado){
      
        return $CompraDetalle = DB::table('orden_detalles')->where('ordenEncabezadoId', $ordenEncabezado)->get();
      
    }
    

}
