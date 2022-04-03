<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class CompraEncabezado
 *
 * @property $id
 * @property $proveedorId 
 * @property $empleadoId
 * @property $fechaSolicitud
 * @property $fechaEntregaCompra
 * @property $fechaPagoCompra
 * @property $estadoCompra
 * @property $numeroFactura
 * @property $cai
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Proveedore $proveedore
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CompraEncabezado extends Model
{
    
    static $rules = [
		'proveedorId' => 'required',
    'empleadoId' => 'required',
		'fechaSolicitud' => 'required',
		'estadoCompra' => 'required',
		'numeroFactura' => 'required',
		'cai' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['proveedorId','empleadoId','fechaSolicitud','fechaEntregaCompra','fechaPagoCompra','estadoCompra','numeroFactura','cai','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proveedore()
    {
        return $this->hasOne('App\Models\Proveedore', 'id', 'proveedorId');
    }

    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'empleadoId');
    }

    //New Collections
    public static function findByProveedor($proveedorId){
      
      return $CompraEncabezado = DB::table('compra_encabezados')->where('proveedorId', $proveedorId)->get();
    
    }

    public static function findByEstadoCompra($estadoCompra){
      
      return $CompraEncabezado = DB::table('compra_encabezados')->where('estadoCompra', $estadoCompra)->get();
    
    }
    

}
