<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_proyecto')->unsigned();
            $table->date('fecha');
            $table->integer('tipo');
            $table->text('solicitante');
            $table->text('objetivo');
            $table->text('descripcion');
            
            $table->timestamps();
            
            /*
             * Foreign keys
             */
            $table->foreign('id_proyecto')
                ->references('id')
                ->on('proyectos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solicitudes', function(Blueprint $table)
	{
            $table->dropForeign('solicitudes_id_proyecto_foreign');
        });
        
        Schema::drop('solicitudes');
    }
}
