<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Mesa
 *
 * @property $id
 * @property $sucursalId
 * @property $cantidadAsientos
 * @property $descripcion
 * @property $precio
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Sucursale $sucursale
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Mesa extends Model
{
    
    static $rules = [
		'sucursalId' => 'required',
		'cantidadAsientos' => 'required',
    'descripcion' => 'required',
    'numero' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['sucursalId','cantidadAsientos','descripcion','numero','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sucursale()
    {
        return $this->hasOne('App\Models\Sucursale', 'id', 'sucursalId');
    }

    //New Collections
    public static function findBySucursalId($sucursalId){
        
      return $Mesa = DB::table('mesas')->where('sucursalId', $sucursalId)->get();
        
    }
    

}
