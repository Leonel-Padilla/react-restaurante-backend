<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImpuestoHistorial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impuesto_historials', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('impuestoId')->unsigned();
            $table->string('valorImpuesto', 3);
            $table->date('fechaInicio');
            $table->date('fechaFinal')->nullable();
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
