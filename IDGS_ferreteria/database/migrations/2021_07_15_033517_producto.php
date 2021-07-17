<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Producto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id('idProducto');
            $table->string('nombre');
            $table->string('descripcion');
            $table->Double('precio');
            $table->string('cantidad');
            $table->string('unidad');
            $table->longText('fotografia');
            $table->string('active');
            $table->foreignId('idCategoria')->nullable()->constrained()->references('idCategoria')->on('categoria');
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
