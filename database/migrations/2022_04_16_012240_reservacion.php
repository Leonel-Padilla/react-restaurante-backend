<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reservacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservaciones', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('clienteId')->unsigned();
            $table->bigInteger('sucursalId')->unsigned();
            $table->tinyInteger('estado');
            $table->timestamps();

            $table->foreign('clienteId')->references('id')->on('clientes');
            $table->foreign('sucursalId')->references('id')->on('sucursales');
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
