<?php

namespace App\Models\Proyecto;

use Illuminate\Database\Eloquent\Model;
use App\Models\Analisis\Analisis;
use App\Models\Solicitud\Solicitud;
use App\Models\Diseno\Diseno;

class Proyecto extends Model
{
    protected $table = 'proyectos';
    protected $connection = 'proyectos_ti';
    protected $dates = ['fecha_inicio', 'fecha_fin'];
    protected $fillable = ['nombre', 'descripcion', 'objetivo', 'fecha_inicio', 'fecha_fin'];

    public function analisis() {
        return $this->hasOne(Analisis::class, 'id_proyecto');
    }
    
    public function solicitudes() {
        return $this->hasMany(Solicitud::class, 'id_proyecto');
    }
    
    public function diseno() {
        return $this->hasOne(Diseno::class, 'id_proyecto');
    }
    
    public function etapas() {
        return [
            'ANÁLISIS' => $this->analisis()->first(),
            'DISEÑO' => $this->diseno()->get()->first()    
            ];
    }
}

