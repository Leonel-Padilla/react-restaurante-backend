<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Comentario
 *
 * @property $id
 * @property $sucursalId
 * @property $descripcion
 * @property $telCliente
 * @property $correoCliente
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Sucursale $sucursale
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Comentario extends Model
{
    
    static $rules = [
		'sucursalId' => 'required',
		'descripcion' => 'required',
		'telCliente' => 'required',
		'correoCliente' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['sucursalId','descripcion','telCliente','correoCliente','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sucursale()
    {
        return $this->hasOne('App\Models\Sucursale', 'id', 'sucursalId');
    }

    //New Collections
    public static function findBySucursalId($sucursalId){
        
      return $Comentario = DB::table('comentarios')->where('sucursalId', $sucursalId)->get();
      
    }
    

}
