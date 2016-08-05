<?php

namespace App\Models\Informacion;

use Illuminate\Database\Eloquent\Model;
use App\Models\Analisis\Analisis;

class Proyecto extends Model
{
    protected $table = 'informacion';
    protected $connection = 'proyectos_ti';
    protected $dates = [''];
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
            'analisis' => $this->analisis()->first(),
            'diseno' => $this->diseno()->get()->first()    
            ];
    }
}

