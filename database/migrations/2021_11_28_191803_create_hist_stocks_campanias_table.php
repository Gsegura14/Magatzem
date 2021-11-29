<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistStocksCampaniasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hist_stocks_campanias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campania_id');
            $table->foreign('campania_id')
                ->references('id')
                ->on('cabecera_campanias')
                ->onDelete('cascade');
            $table->unsignedBigInteger('producto_id')->nullable();
            $table->foreign('producto_id')
                ->references('id')
                ->on('productos')
                ->onDelete('cascade');
            $table->unsignedBigInteger('talla_id')->nullable();
            $table->foreign('talla_id')
                ->references('id')
                ->on('tallas')
                ->onDelete('cascade');
            $table->string('sku');
            $table->string('codigo')->nullable();
            $table->integer('stock');
            $table->integer('pedido')->default(0);
            $table->integer('servido')->default(0);
            $table->double('precio_oferta',5,2);
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
        Schema::dropIfExists('hist_stocks_campanias');
    }
}
