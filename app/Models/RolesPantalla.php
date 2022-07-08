<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RolesPantalla
 *
 * @property $id
 * @property $rolesId
 * @property $pantallaId
 * @property $buscar
 * @property $actualizar
 * @property $registrar
 * @property $imprimirReportes
 * @property $reimprimir
 * @property $detalles
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Pantalla $pantalla
 * @property Role $role
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RolesPantalla extends Model
{
    
    static $rules = [
		'rolesId' => 'required',
		'pantallaId' => 'required',
		'buscar' => 'required',
		'actualizar' => 'required',
		'registrar' => 'required',
		'imprimirReportes' => 'required',
		'reimprimir' => 'required',
		'detalles' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['rolesId','pantallaId','buscar','actualizar','registrar','imprimirReportes','reimprimir','detalles','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pantalla()
    {
        return $this->hasOne('App\Models\Pantalla', 'id', 'pantallaId');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        return $this->hasOne('App\Models\Role', 'id', 'rolesId');
    }
    

}
