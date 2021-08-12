<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('modelo');
            $table->string('color',25);
            $table->string('referencia_sugerida')->nullable();
            $table->string('descripcion_corta');
            $table->unsignedBigInteger('marca_id')->nullable();
            $table->foreign('marca_id')
                ->references('id')->on('marcas')
                ->onDelete('set null');
            
            $table->unsignedBigInteger('tipo_id')->nullable();
            $table->foreign('tipo_id')
                ->references('id')->on('tipo')
                ->onDelete('set null');
            
            $table->double('precio_coste',5,2);
            $table->double('precio_vta',5,2);
            $table->string('made_in');
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
        Schema::dropIfExists('productos');
    }
}
