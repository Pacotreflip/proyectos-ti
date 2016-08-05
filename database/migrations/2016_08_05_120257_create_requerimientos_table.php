<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequerimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requerimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->string('descripcion');            
            $table->integer('id_analisis')->unsigned();
            $table->integer('prioridad');
            $table->integer('complejidad');
            $table->integer('tiempo_desarrollo');
            $table->integer('estatus')->default(0);
            $table->integer('avance')->default(0);
            $table->integer('id_usuario');
            
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
        Schema::drop('requerimientos');
    }
}
