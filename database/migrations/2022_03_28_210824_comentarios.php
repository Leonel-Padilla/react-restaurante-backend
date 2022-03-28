<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comentarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('sucursalId')->unsigned();
            $table->string('descripcion', 100);
            $table->string('telCliente', 8);
            $table->string('correoCliente', 50);
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
