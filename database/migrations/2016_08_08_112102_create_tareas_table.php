<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->date('fecha_inicio');
            $table->integer('duracion');
            $table->float('progreso');
            $table->double('sortorder')->default(0);
            $table->integer('parent')->nullable();
            $table->date('deadline')->default(NULL);
            $table->date('fecha_inicio_real');
            $table->date('fecha_fin_real');
            $table->date('fecha_fin');            
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
        Schema::drop('tareas');
    }
}
