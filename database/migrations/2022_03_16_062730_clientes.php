<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('tipoDocumentoId')->unsigned();
            $table->string('numeroDocumento', 14)->unique();
            $table->string('clienteNombre', 40);
            $table->string('clienteNumero', 8)->unique();
            $table->string('clienteCorreo', 50)->unique();
            $table->string('clienteRTN', 14)->nullable();
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
