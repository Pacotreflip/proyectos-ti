<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisenoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('diseno', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_proyecto')->unsigned();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->date('fecha_inicio_real')->nullable();
            $table->date('fecha_fin_real')->nullable();
            $table->integer('avance')->default(0);
            $table->integer('estado')->default(0);
            $table->integer('id_usuario')->nullable();
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
        Schema::table('diseno', function(Blueprint $table)
	{
            $table->dropForeign('diseno_id_proyecto_foreign');
        });
        
        Schema::drop('diseno');
    }
}
