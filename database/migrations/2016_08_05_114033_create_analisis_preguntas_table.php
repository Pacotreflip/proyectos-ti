<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalisisPreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisis_preguntas', function (Blueprint $table) {
            $table->integer('id_analisis')->unsigned();
            $table->integer('id_pregunta')->unsigned();
            $table->string('respuesta');
            $table->primary(['id_analisis', 'id_pregunta']);
            $table->timestamps();
            
            /*
             * Foreign keys
             */
            $table->foreign('id_analisis')->references('id')->on('analisis')->onDelete('cascade');
            $table->foreign('id_pregunta')->references('id')->on('cat_preguntas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('analisis_preguntas');
    }
}
