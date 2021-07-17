<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Compra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->id('idCompra');
            $table->Double('total');
            $table->string('fechaPedido');
            $table->string('fechaEntrega');
            $table->string('estatus');
            $table->string('descripcion');
            $table->foreignId('idProveedor')->nullable()->constrained()->references('idProveedor')->on('proveedor');
            $table->foreignId('idDetalleCompra')->nullable()->constrained()->references('idDetalleCompra')->on('detalleCompra');
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
        Schema::dropIfExists('compra');
    }
}
