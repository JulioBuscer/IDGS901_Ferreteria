<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetalleCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleCompra', function (Blueprint $table) {
            $table->id('idDetalleCompra');
            $table->string('cantidad');
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
        Schema::dropIfExists('detalleCompra');
    }
}
