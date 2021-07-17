<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Venta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('idVenta');
            $table->string('cantidad');
            $table->Double('subtotal');
            $table->string('fecha');
            $table->Double('iva');
            $table->Double('total');
            $table->foreignId('idUsuario')->nullable()->constrained()->references('idUsuario')->on('users');
            $table->foreignId('idCliente')->nullable()->constrained()->references('idCliente')->on('cliente');
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
        Schema::dropIfExists('ventas');
    }
}
