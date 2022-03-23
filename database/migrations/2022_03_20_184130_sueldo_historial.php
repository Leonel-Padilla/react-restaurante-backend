<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SueldoHistorial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sueldo_historials', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('empleadoId')->unsigned();
            $table->string('sueldo');
            $table->date('fechaInicio');
            $table->date('fechaFinal')->nullable();
            $table->tinyInteger('estado');
            $table->timestamps();

            $table->foreign('empleadoId')->references('id')->on('empleados');
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
