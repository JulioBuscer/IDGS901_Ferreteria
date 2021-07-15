<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProvedoresProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
  
    Schema::create('proveedoresProductos', function (Blueprint $table) {
        $table->id('idProveedoresProductos');
        $table->foreignId('idProducto')->nullable()->constrained()->references('idProducto')->on('producto');
        $table->foreignId('idProveedor')->nullable()->constrained()->references('idProveedor')->on('proveedor');
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
        Schema::dropIfExists('proveedoresProductos');
    }
}
