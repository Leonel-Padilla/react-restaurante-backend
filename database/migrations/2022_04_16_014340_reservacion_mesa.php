<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReservacionMesa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservacion_mesas', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('reservacionId')->unsigned();
            $table->bigInteger('mesaId')->unsigned();
            $table->date('fecha');
            $table->time('horaInicio');
            $table->time('horaFinal');
            $table->tinyInteger('estado');
            $table->timestamps();

            $table->foreign('reservacionId')->references('id')->on('reservaciones');
            $table->foreign('mesaId')->references('id')->on('mesas');
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
