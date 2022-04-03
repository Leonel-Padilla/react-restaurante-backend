<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Cliente
 *
 * @property $id
 * @property $tipoDocumentoId
 * @property $numeroDocumento
 * @property $clienteNombre
 * @property $clienteNumero
 * @property $clienteCorreo
 * @property $clienteRTN
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property TipoDocumento $tipoDocumento
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    
    static $rules = [
    'tipoDocumentoId' => 'required',
    'numeroDocumento' => 'required',
		'clienteNombre' => 'required',
		'clienteNumero' => 'required',
		'clienteCorreo' => 'required',
		'clienteRTN' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipoDocumentoId','numeroDocumento','clienteNombre','clienteNumero','clienteCorreo','clienteRTN','estado'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoDocumento()
    {
        return $this->hasOne('App\Models\TipoDocumento', 'id', 'tipoDocumentoId');
    }
    
    
    public static function findByClienteNombre($clienteNombre){
        
      return $cliente = DB::table('clientes')->where('clienteNombre', $clienteNombre)->get();

    }

}
