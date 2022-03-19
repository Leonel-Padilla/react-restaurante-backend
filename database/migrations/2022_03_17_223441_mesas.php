<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mesas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesas', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('sucursalId')->unsigned();
            $table->string('cantidadAsientos', 3);
            $table->tinyInteger('estado');
            $table->timestamps();

            $table->foreign('sucursalId')->references('id')->on('sucursales');
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
