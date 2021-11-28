<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCampaniaIdToPoOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('po_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('campania_id');
             $table->foreign('campania_id')
                ->references('id')
                ->on('cabecera_campanias');
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('po_orders', function (Blueprint $table) {
            $table->dropColumn('campania_id');
        });
    }
}