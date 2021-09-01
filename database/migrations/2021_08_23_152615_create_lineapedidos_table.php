<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineapedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lineapedidos', function (Blueprint $table) {
            $table->id();
            $table->integer('n_linea');

            $table->unsignedBigInteger('pedido_id');
             $table->foreign('pedido_id')
                ->references('id')
                ->on('cabeceraproveedores')
                ->onDelete('cascade');

             $table->unsignedBigInteger('producto_id');
                $table->foreign('producto_id')
                    ->references('id')
                    ->on('productos')
                    ->onDelete('cascade');  
            $table->integer('Cantidad');
            $table->double('Precio',5,2);
            $table->double('total',8,2); 
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
        Schema::dropIfExists('lineapedidos');
    }
}
