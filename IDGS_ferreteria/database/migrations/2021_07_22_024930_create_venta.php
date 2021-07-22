<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->id();
            $table->string('cantidad');
            $table->Double('subtotal');
            $table->string('fecha');
            $table->Double('iva');
            $table->Double('total');
            $table->foreignId('idUsuario')->nullable()->constrained()->references('id')->on('users');
            $table->foreignId('idCliente')->nullable()->constrained()->references('id')->on('cliente');
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
        Schema::dropIfExists('venta');
    }
}
