<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNLineaToLineaspedidoclientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lineaspedidoclientes', function (Blueprint $table) {
            $table->integer('n_linea')->after('cliente_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lineaspedidoclientes', function (Blueprint $table) {
            
            $table->dropColumn('n_linea');
        });
    }
}
