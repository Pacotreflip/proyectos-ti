<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documentos';
    protected $connection = 'proyectos_ti';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['nombre', 'path', 'thumbnail_path'];
    
    public function solicitud() {
        return $this->belongsTo(Solicitud::class, 'id_solicitud');
    }
     
    public function setNombreAttribute($nombre) {
        $this->attributes['nombre'] = $nombre;
        $this->path = $this->baseDir() . "/" . $nombre;
        $this->thumbnail_path = $this->baseDir() . "/tn-" . $nombre;
    }
    
    public function baseDir() {
        return 'uploads/documentos';
    }
}