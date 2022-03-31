<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductoHistorial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_historials', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('productoId')->unsigned();
            $table->string('precio',5);
            $table->date('fechaInicio');
            $table->date('fechaFinal')->nullable();
            $table->tinyInteger('estado');
            $table->timestamps();

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
