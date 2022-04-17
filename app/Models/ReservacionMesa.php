<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class ReservacionMesa
 *
 * @property $id
 * @property $reservacionId
 * @property $mesaId
 * @property $fecha
 * @property $horaInicio
 * @property $horaFinal
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Mesa $mesa
 * @property Reservacione $reservacione
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ReservacionMesa extends Model
{
    
    static $rules = [
		'reservacionId' => 'required',
		'mesaId' => 'required',
		'fecha' => 'required',
		'horaInicio' => 'required',
		'horaFinal' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['reservacionId','mesaId','fecha','horaInicio','horaFinal','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mesa()
    {
        return $this->hasOne('App\Models\Mesa', 'id', 'mesaId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reservacione()
    {
        return $this->hasOne('App\Models\Reservacione', 'id', 'reservacionId');
    }

    //New Collections
    public static function findByReservacionId($reservacionId){
        
        return $ReservacionMesa = DB::table('reservacion_mesas')->where('reservacionId', $reservacionId)->get();
        
    }

    public static function findByMesaId($mesaId){
        
        return $ReservacionMesa = DB::table('reservacion_mesas')->where('mesaId', $mesaId)->get();
        
    }
}
