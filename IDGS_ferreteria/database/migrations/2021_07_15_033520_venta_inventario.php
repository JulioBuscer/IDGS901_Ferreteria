<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VentaInventario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventasInventario', function (Blueprint $table) {
            $table->id('idventasInventario');
            $table->foreignId('idVenta')->nullable()->constrained()->references('idVenta')->on('ventas');
            $table->foreignId('idProducto')->nullable()->constrained()->references('idProducto')->on('producto');
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
        Schema::dropIfExists('ventasInventario');
    }
}
