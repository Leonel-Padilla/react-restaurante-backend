<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Delivery
 *
 * @property $id
 * @property $clienteId
 * @property $empleadoId
 * @property $ordenEncabezadoId
 * @property $fechaEntrega
 * @property $comentario
 * @property $horaDespacho
 * @property $horaEntrega
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @property Empleado $empleado
 * @property OrdenEncabezado $ordenEncabezado
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Delivery extends Model
{
    
    static $rules = [
		'clienteId' => 'required',
		'empleadoId' => 'required',
		'ordenEncabezadoId' => 'required',
		'fechaEntrega' => 'required',
		'comentario' => 'required',
		'horaDespacho' => 'required',
		'horaEntrega' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['clienteId','empleadoId','ordenEncabezadoId','fechaEntrega','comentario','horaDespacho','horaEntrega','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'clienteId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'empleadoId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ordenEncabezado()
    {
        return $this->hasOne('App\Models\OrdenEncabezado', 'id', 'ordenEncabezadoId');
    }
    
    //New Collections
    public static function findByCliente($clienteId){
        
        return $Delivery = DB::table('deliveries')->where('clienteId', $clienteId)->get();
      
    }

}
