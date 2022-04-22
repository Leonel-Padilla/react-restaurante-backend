<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrdenDetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_detalles', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('ordenEncabezadoId')->unsigned();
            $table->bigInteger('productoId')->unsigned();
            $table->string('precio');
            $table->string('cantidad');
            $table->string('descuentoProducto');
            $table->string('impuestoProducto');
            $table->tinyInteger('estado');
            $table->timestamps();

            $table->foreign('ordenEncabezadoId')->references('id')->on('orden_encabezados');
            $table->foreign('productoId')->references('id')->on('productos');
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
