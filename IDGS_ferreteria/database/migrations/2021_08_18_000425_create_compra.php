<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->id();
            $table->Double('total');
            $table->string('fechaPedido');
            $table->string('fechaEntrega');
            $table->string('estatus');
            $table->string('descripcion');
            $table->foreignId('idProveedor')->nullable()->constrained()->references('id')->on('proveedor');
            $table->foreignId('idUser')->nullable()->constrained()->references('id')->on('users');
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
