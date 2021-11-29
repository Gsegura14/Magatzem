<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEstadoToCabeceraCampanias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cabecera_campanias', function (Blueprint $table) {
            $table->unsignedBigInteger('estado_id')->nullable();
                $table->foreign('estado_id')
                    ->references('id')
                    ->on('estado_campanias')
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
        Schema::table('cabecera_campanias', function (Blueprint $table) {
            $table->dropColumn('estado_id');
        });
    }
}
