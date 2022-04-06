<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ParametrosFactura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametros_facturas', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('numeroCAI')->unique();
            $table->date('fechaDesde');
            $table->date('fechaHasta');
            $table->string('rangoInicial');
            $table->string('rangoFinal');
            $table->string('numeroFacturaActual');
            $table->string('puntoEmision',3);
            $table->string('establecimiento',3);
            $table->string('tipoDocumento',2);
            $table->string('rtn_Restaurante', 14);
            $table->tinyInteger('estado');
            $table->timestamps();
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
