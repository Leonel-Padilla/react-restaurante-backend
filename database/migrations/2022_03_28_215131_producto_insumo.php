<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductoInsumo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_insumos', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('insumoId')->unsigned();
            $table->bigInteger('productoId')->unsigned();
            $table->string('cantidad', 4);
            $table->tinyInteger('estado');
            $table->timestamps();

            $table->foreign('insumoId')->references('id')->on('insumos');
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
