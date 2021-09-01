<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabeceraproveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabeceraproveedores', function (Blueprint $table) {
            $table->id();
            $table->integer('n_pedido',false)->unique();
            $table->date('f_pedido');
            $table->date('f_servicio');
            $table->unsignedBigInteger('proveedor_id')->nullable();
            
            $table->foreign('proveedor_id')
                ->references('id')
                ->on('proveedores')
                ->onDelete('set null');
            
            $table->double('total',8,2)->default(0.0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migÑSrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cabeceraproveedores');
    }
}
