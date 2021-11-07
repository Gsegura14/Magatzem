<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPrecioOfertaToStockOfertas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stock_ofertas', function (Blueprint $table) {
            $table->double('precio_oferta',5,2);
            $table->boolean('aceptar')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stock_ofertas', function (Blueprint $table) {
            $table->dropColumn('precio_oferta');
            $table->dropColumn('aceptar');
           
        });
    }
}
