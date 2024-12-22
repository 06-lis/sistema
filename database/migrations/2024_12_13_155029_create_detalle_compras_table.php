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
            $table->id('idDc');
            $table->unsignedBigInteger('id_compra');
            $table->unsignedBigInteger('idDal');
            $table->float('precioDc');
            $table->integer('cantidadDc');

            $table->foreign('id_compra')->references('id_compra')->on('compras');
            $table->foreign('idDal')->references('idDal')->on('detalle_almacens');
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
