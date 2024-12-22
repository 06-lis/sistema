<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id('idDv');
            $table->unsignedBigInteger('id_venta');
            $table->unsignedBigInteger('idDal');
            $table->float('precioDv');
            $table->integer('cantidadDv');

            $table->foreign('id_venta')->references('id_venta')->on('ventas');
            $table->foreign('idDal')->references('idDal')->on('detalle_almacens');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};
