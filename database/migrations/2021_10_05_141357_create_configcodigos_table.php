<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigcodigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configcodigos', function (Blueprint $table) {
            $table->id();
            $table->string('alias',25);
            $table->unsignedBigInteger('pais_id');
            $table->foreign('pais_id')
                ->references('id')
                ->on('codigospaises');
            $table->unsignedBigInteger('marca_id');
            $table->foreign('marca_id')
                ->references('id')
                ->on('codigosmarcas');
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
        Schema::dropIfExists('configcodigos');
    }
}
