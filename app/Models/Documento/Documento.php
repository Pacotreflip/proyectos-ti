<?php

namespace App\Models\Documento;

use Illuminate\Database\Eloquent\Model;
use App\Models\Solicitud\Solicitud;
use App\Models\Analisis\Analisis;

class Documento extends Model
{
    protected $table = 'documentos';
    protected $connection = 'proyectos_ti';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['nombre', 'path', 'thumbnail_path'];
    
    public function solicitud() {
        return $this->belongsTo(Solicitud::class, 'id_solicitud');
    }
    
    public function analisis() {
        return $this->belongsTo(Analisis::class, 'id_analisis');
    }
}
