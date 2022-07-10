<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RolesPantallas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_pantallas', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('rolesId')->unsigned();
            $table->bigInteger('pantallaId')->unsigned();
            $table->string('rolPantalla', 10)->unique();
            $table->string('buscar', 1);
            $table->string('actualizar', 1);
            $table->string('registrar', 1);
            $table->string('imprimirReportes', 1);
            $table->string('reimprimir', 1)->nullable();
            $table->string('detalles', 1)->nullable();
            $table->tinyInteger('estado');
            $table->timestamps();

            $table->foreign('rolesId')->references('id')->on('roles');
            $table->foreign('pantallaId')->references('id')->on('pantallas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
