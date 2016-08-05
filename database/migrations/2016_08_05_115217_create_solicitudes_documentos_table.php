<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes_documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_solicitud')->unsigned();
            $table->integer('id_documento')->unsigned();
            $table->timestamps();
            $table->primary(['id_solicitud','id_documento']);
            
            $table->foreign('id_solicitud')->references('id')->on('solicitudes')->onDelete('cascade');
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
        Schema::table('solicitudes_documentos', function(Blueprint $table)
	{
            $table->dropForeign('solicitudes_documentos_id_solicitud_foreign');
            $table->dropForeign('solicitudes_documentos_id_documento_foreign');
        });
        Schema::drop('solicitudes_documentos');
    }
}
