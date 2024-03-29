<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_orders', function (Blueprint $table) {
            $table->id();
            $table->string('po_order');
            $table->unsignedBigInteger('campania_id');
            $table->foreign('campania_id')
               ->references('id')
               ->on('cabecera_campanias');
            
            
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
        Schema::dropIfExists('po_orders');
    }
}
