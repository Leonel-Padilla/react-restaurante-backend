<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class TipoDocumento
 *
 * @property $id
 * @property $nombreDocumento
 * @property $numeroDocumento
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoDocumento extends Model
{
    
    static $rules = [
		'nombreDocumento' => 'required',
		'numeroDocumento' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombreDocumento','numeroDocumento','estado'];


    //New Collections
    public static function findByNumeroDocumento($numeroDocumento){
        
      #return $tipoDocumento = DB::table('tipo_documentos')->where('numeroDocumento', $numeroDocumento)->get();

      return $tipoDocumento = TipoDocumento::firstWhere('numeroDocumento', $numeroDocumento);
    }

}
