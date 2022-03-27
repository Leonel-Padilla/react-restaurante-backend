<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class CompraDetalle
 *
 * @property $id
 * @property $insumoId
 * @property $compraEncabezadoId
 * @property $precio
 * @property $cantidad
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property CompraEncabezado $compraEncabezado
 * @property Insumo $insumo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CompraDetalle extends Model
{
    
    static $rules = [
		'insumoId' => 'required',
		'compraEncabezadoId' => 'required',
		'precio' => 'required',
		'cantidad' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['insumoId','compraEncabezadoId','precio','cantidad','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function compraEncabezado()
    {
        return $this->hasOne('App\Models\CompraEncabezado', 'id', 'compraEncabezadoId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function insumo()
    {
        return $this->hasOne('App\Models\Insumo', 'id', 'insumoId');
    }

    public static function findByCompraEncabezadoId($compraEncabezado){
      
        return $CompraDetalle = DB::table('compra_detalles')->where('compraencabezadoId', $compraEncabezado)->get();
      
      }
    

}
