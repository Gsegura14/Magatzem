<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradaMercanciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada_mercancias', function (Blueprint $table) {
            $table->id();
            
            $table->date('fecha')->default(now());

            $table->unsignedBigInteger('pedidoId');
                $table->foreign('pedidoId')
                    ->references('id')
                    ->on('cabeceraproveedores')
                    ->onDelete('cascade');
            
            $table->unsignedBigInteger('proveedorId');
                $table->foreign('proveedorId')
                        ->references('id')
                        ->on('proveedores')
                        ->onDelete('cascade');

            $table->unsignedBigInteger('lineaId');
                $table->foreign('lineaId')
                    ->references('id')
                    ->on('lineapedidos');
                   

            $table->integer('cantidad')->default(0);

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
        Schema::dropIfExists('entrada_mercancias');
    }
}
