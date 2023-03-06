<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table -> unsignedBigInteger('cliente_id');
            $table -> foreign('cliente_id')->references('id')->on('users')->onDelete('cascade');

            $table -> unsignedBigInteger('restaurante_id');
            $table -> foreign('restaurante_id')->references('id')->on('restaurantes')->onDelete('cascade');
            
            $table -> unsignedBigInteger('repartidor_id');
            $table -> foreign('repartidor_id')->references('id')->on('users')->onDelete('cascade');

            $table -> enum('estado', ['recibido', 'finalizado', 'entregado', 'cancelado']); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};
