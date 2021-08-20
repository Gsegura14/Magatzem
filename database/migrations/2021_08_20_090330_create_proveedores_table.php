<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_proveedor',50);
            $table->string('direccion');
            $table->string('cp',5);
            $table->string('poblacion',45);
            $table->string('provincia',35);
            $table->string('telefono',9);
            $table->string('telefono_movil',9)->nullable();
            $table->string('contacto')->nullable();
            $table->string('email')->unique();
            $table->string('cif',10)->unique();
            $table->unsignedBigInteger('marca_id')->unique()->nullable();
            $table->foreign('marca_id')
                ->references('id')
                ->on('marcas')
                ->onDelete('set null');
            $table->mediumText('observaciones')->nullable();

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
        Schema::dropIfExists('proveedores');
    }
}
