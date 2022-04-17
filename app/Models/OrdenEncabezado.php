<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class OrdenEncabezado
 *
 * @property $id
 * @property $clienteId
 * @property $empleadoMeseroId
 * @property $empleadoCocinaId
 * @property $tipoEntregaId
 * @property $fechaHora
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @property Empleado $empleado
 * @property Empleado $empleado
 * @property TipoEntrega $tipoEntrega
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OrdenEncabezado extends Model
{
    
    static $rules = [
		'clienteId' => 'required',
		'empleadoMeseroId' => 'required',
		'empleadoCocinaId' => 'required',
		'tipoEntregaId' => 'required',
		'fechaHora' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['clienteId','empleadoMeseroId','empleadoCocinaId','tipoEntregaId','fechaHora','estadoOrden','estado'];


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
        return $this->hasOne('App\Models\Empleado', 'id', 'empleadoCocinaId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado2()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'empleadoMeseroId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoEntrega()
    {
        return $this->hasOne('App\Models\TipoEntrega', 'id', 'tipoEntregaId');
    }
    
    //New Collections
    public static function findByCliente($clienteId){
      
      return $OrdenEncabezado = DB::table('orden_encabezados')->where('clienteId', $clienteId)->get();
      
    }

    public static function findByEmpleadoMesero($empleadoMeseroId){
      
      return $OrdenEncabezado = DB::table('orden_encabezados')->where('empleadoMeseroId', $empleadoMeseroId)->get();
      
    }

    public static function findByEmpleadoCocina($empleadoCocinaId){
      
      return $OrdenEncabezado = DB::table('orden_encabezados')->where('empleadoCocinaId', $empleadoCocinaId)->get();
      
    } 

    public static function findByTipoEntrega($tipoEntregaId){
      
      return $OrdenEncabezado = DB::table('orden_encabezados')->where('tipoEntregaId', $tipoEntregaId)->get();
      
    } 

}
