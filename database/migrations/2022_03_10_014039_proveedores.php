<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Proveedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('proveedorNombre', 50);
            $table->string('proveedorNumero', 8);
            $table->string('proveedorCorreo', 50);
            $table->string('proveedorEncargado', 50);
            $table->string('proveedorRTN', 14);
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
