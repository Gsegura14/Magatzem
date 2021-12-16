<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabeceraCampaniasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabecera_campanias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id')->nullable();
                $table->foreign('cliente_id')
                    ->references('id')
                    ->on('clientes')
                    ->onDelete('cascade');
            $table->string('nombre_campania',80);
            $table->date('fecha_inicio')->nullable();
            $table->integer('cantidad_unidades')->nullable();
            $table->integer('cant_modelos')->nullable();
            $table->integer('cant_refs')->nullable();
            $table->integer('duracion')->default(7);
            $table->double('percent_faltas',4,2)->default(1);
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->foreign('estado_id')
                ->references('id')
                ->on('estado_campanias');

            
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
        Schema::dropIfExists('cabecera_campanias');
    }
}
