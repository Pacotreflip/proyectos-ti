<?php

namespace App\Models\Analisis;

use Illuminate\Database\Eloquent\Model;
use App\Models\Proyecto\Proyecto;
use Ghi\Core\Models\User;
use App\Models\Documento\Documento;

class Analisis extends Model
{
    protected $table = 'analisis';
    protected $connection = 'proyectos_ti';
    protected $dates = ['fecha_inicio', 'fecha_fin'];
    protected $fillable = ['id_proyecto'];

    public function proyecto() {
        return $this->belongsTo(Proyecto::class, 'id_proyecto');
    }
    
    public function user() {
        return $this->belongsTo(User::class, 'id_usuario', 'idusuario');
    }
    
    public function preguntas() {
        return $this->belongsToMany(Pregunta::class, 'analisis_preguntas', 'id_analisis', 'id_pregunta')->withPivot('respuesta');
    }
    
    public function documentos() {
        return $this->belongsToMany(Documento::class, 'analisis_documentos', 'id_analisis', 'id_documento');
    }
}

