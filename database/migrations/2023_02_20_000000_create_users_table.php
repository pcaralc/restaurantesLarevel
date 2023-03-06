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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table -> string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('rol')->default('cliente');
            $table->rememberToken();
            $table->timestamps();

            //Cliente
            $table -> string('dni',9);
            $table -> string('apellidos');
            $table -> string('direccion');
            $table -> string('ciudad');
            $table -> string('telefono', 14);
            //------------------
            //Propiedades de repartidor
            $table -> decimal('salario')->nullable();
            $table -> enum('estado', ['libre', 'ocupado'])->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
