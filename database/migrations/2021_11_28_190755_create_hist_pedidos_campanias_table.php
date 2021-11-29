<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistPedidosCampaniasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hist_pedidos_campanias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campania_id');
            $table->foreign('campania_id')
                ->references('id')
                ->on('cabecera_campanias')
                ->onDelete('cascade');
            // $table->unsignedBigInteger('po_number_id');
            //     $table->foreign('po_number_id')
            //     ->references('id')
            //     ->on('hist_po_orders')
            //     ->onDelete('cascade');
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
            $table->integer('pedido')->default(0);
            $table->integer('servido')->default(0);
            $table->double('precio_oferta', 5, 2);
            $table->integer('n_order');
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
        Schema::dropIfExists('hist_pedidos_campanias');
    }
}
