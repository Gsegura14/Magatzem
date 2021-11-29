<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistPoOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hist_po_orders', function (Blueprint $table) {
            $table->id();
            $table->string('po_order');
            $table->unsignedBigInteger('campania_id');
            $table->foreign('campania_id')
               ->references('id')
               ->on('cabecera_campanias');
            $table->boolean('enviado')
            ->default(0)
            ->nullable();
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
        Schema::dropIfExists('hist_po_orders');
    }
}
