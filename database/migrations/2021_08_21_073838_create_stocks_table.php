<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('stocks');
    }
}
