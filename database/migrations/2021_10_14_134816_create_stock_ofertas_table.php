<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_ofertas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('oferta_id');
            $table->foreign('oferta_id')
                ->references('id')
                ->on('cabecera_campania_ofertas')
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
            $table->integer('pedido');
            $table->integer('vendido');
            $table->integer('stock');

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
        Schema::dropIfExists('stock_ofertas');
    }
}
