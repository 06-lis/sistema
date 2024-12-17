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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('id_venta');
            $table->date('fechaVe');
            $table->float('montoTotalVe');

            $table->unsignedBigInteger('id_cliente');
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes');

            $table->unsignedBigInteger('id_empleado');
            $table->foreign('id_empleado')->references('id_empleado')->on('empleados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
