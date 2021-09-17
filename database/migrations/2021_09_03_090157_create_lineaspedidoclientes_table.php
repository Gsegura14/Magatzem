<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineaspedidoclientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lineaspedidoclientes', function (Blueprint $table) {
            $table->id();
            $table->integer('n_linea');
            $table->unsignedBigInteger('pedido_id');
            
                $table->foreign('pedido_id')
                    ->references('id')
                    ->on('cabecera_clientes')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('stock_id');
                $table->foreign('stock_id')
                    ->references('id')
                    ->on('stocks')
                    ->onDelete('cascade');

            $table->integer('cantidad');
            $table->decimal('precio',5,2);
            $table->decimal('total',8,2);
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
        Schema::dropIfExists('lineaspedidoclientes');
    }
}
