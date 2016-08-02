<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_solicitud')->unsigned();
            $table->string('nombre');
            $table->string('path');
            $table->timestamps();
            
            /*
             * Foreign keys
             */
            $table->foreign('id_solicitud')->references('id')->on('solicitudes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documentos', function(Blueprint $table)
	{
            $table->dropForeign('documentos_id_solicitud_foreign');
        });
        
        Schema::drop('documentos');
    }
}
