<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaInventario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_inventario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idVenta')->nullable()->constrained()->references('id')->on('venta');
            $table->foreignId('idProducto')->nullable()->constrained()->references('id')->on('producto');
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
        Schema::dropIfExists('venta_inventario');
    }
}
