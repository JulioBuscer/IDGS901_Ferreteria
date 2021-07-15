<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id('idUsuario');
            $table->string('nombre');
            $table->string('email');
            $table->string('password');
            $table->string('active');
            $table->string('token');
            $table->longText('fotografia');
            $table->string('apellidoM');
            $table->string('telefono');
            $table->foreignId('idRol')->nullable()->constrained()->references('idRol')->on('rol');
            $table->foreignId('idPersona')->nullable()->constrained()->references('idPersona')->on('persona');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
