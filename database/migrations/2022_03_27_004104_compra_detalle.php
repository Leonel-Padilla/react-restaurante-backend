<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CompraDetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_detalles', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('insumoId')->unsigned();
            $table->bigInteger('compraEncabezadoId')->unsigned();
            $table->string('precio');
            $table->string('cantidad');
            $table->tinyInteger('estado');
            $table->timestamps();

            $table->foreign('insumoId')->references('id')->on('insumos');
            $table->foreign('compraEncabezadoId')->references('id')->on('compra_encabezados');
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
