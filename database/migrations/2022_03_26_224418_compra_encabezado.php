<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CompraEncabezado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_encabezados', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('proveedorId')->unsigned();
            $table->bigInteger('empleadoId')->unsigned();
            $table->date('fechaSolicitud');
            $table->date('fechaEntregaCompra')->nullable();
            $table->date('fechaPagoCompra')->nullable();
            $table->string('estadoCompra', 20);
            $table->string('numeroFactura', 20);
            $table->string('cai', 50);
            $table->string('numeroFacturaCai', 50)->unique();
            $table->tinyInteger('estado');
            $table->timestamps();

            $table->foreign('proveedorId')->references('id')->on('proveedores');
            $table->foreign('empleadoId')->references('id')->on('empleados');
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
