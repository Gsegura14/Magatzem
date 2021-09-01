<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTallaIdToLineapedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lineapedidos', function (Blueprint $table) {
                $table->unsignedBigInteger('talla_id')->nullable();
                $table->foreign('talla_id')
                ->references('id')
                ->on('tallas')
                ->onDelete('set null');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lineapedidos', function (Blueprint $table) {
            $table->dropColumn('talla_id');
        });
    }
}
