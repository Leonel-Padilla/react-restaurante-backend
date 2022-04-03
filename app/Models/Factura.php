<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Factura
 *
 * @property $id
 * @property $ordenEncabezadoId
 * @property $empleadoCajeroId
 * @property $parametroFacturaId
 * @property $formaPagosId
 * @property $numeroFactura
 * @property $impuesto
 * @property $subTotal
 * @property $total
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @property FormaPago $formaPago
 * @property OrdenEncabezado $ordenEncabezado
 * @property ParametrosFactura $parametrosFactura
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Factura extends Model
{
    
    static $rules = [
		'ordenEncabezadoId' => 'required',
		'empleadoCajeroId' => 'required',
		'parametroFacturaId' => 'required',
		'formaPagosId' => 'required',
		'numeroFactura' => 'required',
		'impuesto' => 'required',
		'subTotal' => 'required',
		'total' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ordenEncabezadoId','empleadoCajeroId','parametroFacturaId','formaPagosId','numeroFactura','impuesto','subTotal','total','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'empleadoCajeroId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function formaPago()
    {
        return $this->hasOne('App\Models\FormaPago', 'id', 'formaPagosId');
    }
    
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
    public function parametrosFactura()
    {
        return $this->hasOne('App\Models\ParametrosFactura', 'id', 'parametroFacturaId');
    }

    //New Collections
    public static function findByEmpleadoCajeroId($empleadoCajeroId){
      
        return $Factura = DB::table('facturas')->where('empleadoCajeroId', $empleadoCajeroId)->get();
      
      }
    

}
