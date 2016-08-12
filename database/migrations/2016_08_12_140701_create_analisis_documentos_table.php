<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalisisDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisis_documentos', function (Blueprint $table) {
            $table->integer('id_analisis')->unsigned();
            $table->integer('id_documento')->unsigned();
            $table->primary(['id_analisis','id_documento']);
            
            $table->foreign('id_analisis')->references('id')->on('analisis')->onDelete('cascade');
            $table->foreign('id_documento')->references('id')->on('documentos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('analisis_documentos', function(Blueprint $table)
	{
            $table->dropForeign('analisis_documentos_id_analisis_foreign');
            $table->dropForeign('analisis_documentos_id_documento_foreign');
        });
        Schema::drop('analisis_documentos');
    }
}
