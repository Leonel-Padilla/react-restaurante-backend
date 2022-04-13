<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sucursales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursales', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('empleadoId')->unsigned();
            $table->string('sucursalNombre', 40)->unique();
            $table->string('sucursalDireccion', 100);
            $table->tinyInteger('estado');
            $table->timestamps();


            // $table->foreign('empleadoId')->references('id')->on('empleados');
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
