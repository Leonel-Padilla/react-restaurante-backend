<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class ImpuestoHistorial
 *
 * @property $id
 * @property $impuestoId
 * @property $valorImpuesto
 * @property $fechaInicio
 * @property $fechaFinal
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Impuesto $impuesto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ImpuestoHistorial extends Model
{
    
    static $rules = [
		'impuestoId' => 'required',
		'valorImpuesto' => 'required',
		'fechaInicio' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['impuestoId','valorImpuesto','fechaInicio','fechaFinal','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function impuesto()
    {
        return $this->hasOne('App\Models\Impuesto', 'id', 'impuestoId');
    }

    //New Collections
    public static function findByImpuestoId($impuestoId){
        
      return $Impuesto = DB::table('impuesto_historials')->where('impuestoId', $impuestoId)->get();
        
    }
    

}
