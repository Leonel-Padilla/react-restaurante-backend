<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Delivery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('clienteId')->unsigned();
            $table->bigInteger('empleadoId')->unsigned();
            $table->bigInteger('ordenEncabezadoId')->unsigned();
            $table->date('fechaEntrega');
            $table->string('comentario', 200)->nullable();
            $table->time('horaDespacho')->nullable();
            $table->time('horaEntrega')->nullable();
            $table->tinyInteger('estado');
            $table->timestamps();

            $table->foreign('clienteId')->references('id')->on('clientes');
            $table->foreign('empleadoId')->references('id')->on('empleados');
            $table->foreign('ordenEncabezadoId')->references('id')->on('orden_encabezados');
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
