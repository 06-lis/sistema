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
            $table->integer('cantidadDv');
            $table->float('precioDv');

            $table->unsignedBigInteger('id_venta');
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_almacen');
            $table->primary(['id_venta', 'id_producto', 'id_almacen']);
            $table->foreign('id_venta')->references('id_venta')->on('ventas');
            $table->foreign(['id_producto', 'id_almacen'])->references(['id_producto', 'id_almacen'])->on('detalle_almacens');
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
