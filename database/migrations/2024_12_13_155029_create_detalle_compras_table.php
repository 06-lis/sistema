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
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->integer('cantidadDc');
            $table->float('precioDc');

            $table->unsignedBigInteger('id_compra');
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_almacen');
            $table->primary(['id_compra', 'id_producto', 'id_almacen']);
            $table->foreign('id_compra')->references('id_compra')->on('compras');
            $table->foreign(['id_producto', 'id_almacen'])->references(['id_producto', 'id_almacen'])->on('detalle_almacens');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_compras');
    }
};
