<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEnviadoToPedidosCampanias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pedidos_campanias', function (Blueprint $table) {
            $table->boolean('enviado')
                ->default(0)
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedidos_campanias', function (Blueprint $table) {
            $table->dropColumn('enviado');
        });
    }
}
