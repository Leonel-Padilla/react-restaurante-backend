<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrdenEncabezado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_encabezados', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('clienteId')->unsigned();
            $table->bigInteger('empleadoMeseroId')->unsigned();
            $table->bigInteger('empleadoCocinaId')->unsigned();
            $table->bigInteger('tipoEntregaId')->unsigned();
            $table->dateTime('fechaHora');
            $table->tinyInteger('estado');
            $table->timestamps();

            $table->foreign('clienteId')->references('id')->on('clientes');
            $table->foreign('empleadoMeseroId')->references('id')->on('empleados');
            $table->foreign('empleadoCocinaId')->references('id')->on('empleados');
            $table->foreign('tipoEntregaId')->references('id')->on('tipo_entregas');
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
