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
            $table->string('numeroDocumento', 14)->unique();
            $table->string('empleadoNombre', 50);
            $table->string('empleadoNumero', 8)->unique();
            $table->string('empleadoCorreo', 50)->unique();
            $table->string('empleadoUsuario', 20)->unique();
            $table->string('empleadoContrasenia', 20);
            $table->string('empleadoDireccion', 100);
            $table->bigInteger('cargoActualId')->unsigned();
            $table->date('fechaContratacion');
            $table->date('fechaNacimiento');
            $table->tinyInteger('estado');
            $table->timestamps();


            $table->foreign('tipoDocumentoId')->references('id')->on('tipo_documentos');
            $table->foreign('cargoActualId')->references('id')->on('cargos');
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
