<?php

namespace App\Models\Analisis;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $connection = 'proyectos_ti';
    protected $table = 'cat_preguntas';
    
    public function analisis() {
        return $this->belongsToMany(Analisis::class, 'analisis_preguntas', 'id_pregunta', 'id_analisis');
    }
}
