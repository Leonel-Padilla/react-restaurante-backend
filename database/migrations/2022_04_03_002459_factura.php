<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Factura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('ordenEncabezadoId')->unsigned();
            $table->bigInteger('empleadoCajeroId')->unsigned();
            $table->bigInteger('parametroFacturaId')->unsigned();
            $table->bigInteger('formaPagosId')->unsigned();
            $table->dateTime('fechaHora');
            $table->string('numeroFactura');
            $table->string('impuesto');
            $table->string('subTotal');
            $table->string('total');
            $table->tinyInteger('estado');
            $table->timestamps();

            $table->foreign('ordenEncabezadoId')->references('id')->on('orden_encabezados');
            $table->foreign('empleadoCajeroId')->references('id')->on('empleados');
            $table->foreign('parametroFacturaId')->references('id')->on('parametros_facturas');
            $table->foreign('formaPagosId')->references('id')->on('forma_pagos');
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
