<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('tipoDocumentoId')->unsigned();
            $table->string('empleadoNombre');
            $table->string('empleadoNumero');
            $table->string('empleadoCorreo');
            $table->string('empleadoDireccion');
            $table->integer('estado');
            $table->timestamps();


            $table->foreign('tipoDocumentoId')->references('id')->on('tipo_documentos');
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
