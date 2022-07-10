<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class RolesPantalla
 *
 * @property $id
 * @property $rolesId
 * @property $pantallaId
 * @property $rolPantalla
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
        'rolPantalla' => 'required',
		'buscar' => 'required',
		'actualizar' => 'required',
		'registrar' => 'required',
		'imprimirReportes' => 'required',   
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['rolesId','pantallaId','rolPantalla','buscar','actualizar','registrar','imprimirReportes','reimprimir','detalles','estado'];


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

    //New Collections

    public static function findByPantallaId($pantallaId){

        return $Empleado = DB::table('roles_pantallas')->where('pantallaId', $pantallaId)->get();
  
      }
  
      public static function findByRolesId($rolesId){
  
        return $Empleado = DB::table('roles_pantallas')->where('rolesId', $rolesId)->get();
  
      }
    

}
