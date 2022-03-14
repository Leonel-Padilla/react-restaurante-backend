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
            $table->string('numeroDocumento', 14);
            $table->string('empleadoNombre', 50);
            $table->string('empleadoNumero', 8);
            $table->string('empleadoCorreo', 50);
            $table->string('empleadoUsuario', 20);
            $table->string('empleadoContrasenia', 20);
            $table->string('empleadoDireccion', 100);
            $table->date('fechaContratacion');
            $table->date('fechaNacimiento');
            $table->tinyInteger('estado');
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
