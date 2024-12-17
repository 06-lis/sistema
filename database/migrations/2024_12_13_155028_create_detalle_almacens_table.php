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
        Schema::create('detalle_almacens', function (Blueprint $table) {
            $table->integer('stock');

            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_almacen');
            $table->primary(['id_producto', 'id_almacen']);
            $table->foreign('id_producto')->references('id_producto')->on('productos');
            $table->foreign('id_almacen')->references('id_almacen')->on('almacens');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_almacens');
    }
};
