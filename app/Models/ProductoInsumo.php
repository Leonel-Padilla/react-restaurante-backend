<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductoInsumo
 *
 * @property $id
 * @property $insumoId
 * @property $productoId
 * @property $cantidad
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Insumo $insumo
 * @property Producto $producto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProductoInsumo extends Model
{
    
    static $rules = [
		'insumoId' => 'required',
		'productoId' => 'required',
        'cantidad' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['insumoId','productoId','cantidad','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function insumo()
    {
        return $this->hasOne('App\Models\Insumo', 'id', 'insumoId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'productoId');
    }

    //New Collections
    public static function findByInsumoId($insumoId){
        
        return $ProductoInsumo = DB::table('producto_insumos')->where('insumoId', $insumoId)->get();
        
    }

    public static function findByProductoId($productoId){
        
        return $ProductoInsumo = DB::table('producto_insumos')->where('productoId', $productoId)->get();
        
    }
    

}
