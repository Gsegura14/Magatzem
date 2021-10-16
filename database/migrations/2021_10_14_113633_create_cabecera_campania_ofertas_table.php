<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabeceraCampaniaOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabecera_campania_ofertas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
                $table->foreign('cliente_id')
                    ->references('id')
                    ->on('clientes')
                    ->onDelete('cascade');

            $table->date('fecha_inicio');
            $table->integer('cantidad_unidades');
            $table->integer('cant_modelos');
            $table->integer('cant_refs');
            

            
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
        Schema::dropIfExists('cabecera_campania_ofertas');
    }
}
