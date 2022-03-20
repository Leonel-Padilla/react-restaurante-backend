<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CargoHistorial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('cargo_historials', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('empleadoId')->unsigned();
            $table->bigInteger('cargoId')->unsigned();
            $table->date('fechaInicio');
            $table->date('fechaFinal');
            $table->tinyInteger('estado');
            $table->timestamps();

            $table->foreign('empleadoId')->references('id')->on('empleados');
            $table->foreign('cargoId')->references('id')->on('cargos');
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
