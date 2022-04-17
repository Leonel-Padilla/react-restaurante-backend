<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Reservacione
 *
 * @property $id
 * @property $clienteId
 * @property $sucursalId
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @property Sucursale $sucursale
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Reservacione extends Model
{
    
    static $rules = [
		'clienteId' => 'required',
		'sucursalId' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['clienteId','sucursalId','estado'];


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
    public function sucursale()
    {
        return $this->hasOne('App\Models\Sucursale', 'id', 'sucursalId');
    }
    
    //New Collections
    public static function findByCliente($clienteId){
        
        return $Reservacion = DB::table('reservaciones')->where('clienteId', $clienteId)->get();
      
    }
}
