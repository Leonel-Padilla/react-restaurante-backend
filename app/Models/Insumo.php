<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Insumo
 *
 * @property $id
 * @property $proveedorId
 * @property $insumoNombre
 * @property $insumoDescripcion
 * @property $cantidad
 * @property $cantidadMin
 * @property $cantidadMax
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Proveedore $proveedore
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Insumo extends Model
{
    
    static $rules = [
		'proveedorId' => 'required',
		'insumoNombre' => 'required',
		'insumoDescripcion' => 'required',
		'cantidad' => 'required',
		'cantidadMin' => 'required',
		'cantidadMax' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['proveedorId','insumoNombre','insumoDescripcion','cantidad','cantidadMin','cantidadMax','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proveedore()
    {
        return $this->hasOne('App\Models\Proveedore', 'id', 'proveedorId');
    }
    
    //New Collections
    public static function findByInsumoNombre($insumoNombre){
        
      return $Insumo = DB::table('insumos')->where('insumoNombre', $insumoNombre)->get();
  
    }

}
