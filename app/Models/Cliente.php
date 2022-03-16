<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $clienteNombre
 * @property $clienteNumero
 * @property $clienteCorreo
 * @property $clienteRTN
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    
    static $rules = [
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
    protected $fillable = ['clienteNombre','clienteNumero','clienteCorreo','clienteRTN','estado'];


    public static function findByClienteNombre($clienteNombre){
        
      return $cliente = DB::table('clientes')->where('clienteNombre', $clienteNombre)->get();

    }

}
