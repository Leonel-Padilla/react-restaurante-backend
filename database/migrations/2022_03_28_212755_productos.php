<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('impuestoId')->unsigned();
            $table->string('productoNombre', 40)->unique();
            $table->string('productoDescripcion', 100);
            $table->string('precio', 5);
            $table->string('descuento', 3)->nullable();
            $table->tinyInteger('estado');
            $table->timestamps();

            $table->foreign('impuestoId')->references('id')->on('impuestos');
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
