<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedore
 *
 * @property $id
 * @property $proveedorNombre
 * @property $proveedorNumero
 * @property $proveedorCorreo
 * @property $proveedorEncargado
 * @property $proveedorRTN
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proveedore extends Model
{
    
    static $rules = [
		'proveedorNombre' => 'required',
		'proveedorNumero' => 'required',
		'proveedorCorreo' => 'required',
		'proveedorEncargado' => 'required',
		'proveedorRTN' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['proveedorNombre','proveedorNumero','proveedorCorreo','proveedorEncargado','proveedorRTN','estado'];

    
    //New Collections
    public static function findByProveedorNombre($ProveedorNombre){
        
      return $Proveedor = DB::table('proveedores')->where('proveedorNombre', $ProveedorNombre)->get();

    }


}
