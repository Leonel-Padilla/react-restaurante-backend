<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Insumos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumos', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('proveedorId')->unsigned();
            $table->string('insumoNombre', 40)->unique();
            $table->string('insumoDescripcion', 100);
            $table->string('cantidad', 3);
            $table->string('cantidadMin', 3);
            $table->string('cantidadMax', 3);
            $table->tinyInteger('estado');
            $table->timestamps();

            $table->foreign('proveedorId')->references('id')->on('proveedores');
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
