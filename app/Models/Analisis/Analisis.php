<?php

namespace App\Models\Analisis;

use Illuminate\Database\Eloquent\Model;
use App\Models\Proyectos\Proyecto;

class Analisis extends Model
{
    protected $table = 'analisis';
    protected $connection = 'proyectos_ti';
    protected $dates = ['fecha_inicio', 'fecha_fin'];
    protected $fillable = ['id_proyecto'];

    public function proyecto() {
        return $this->belongsTo(Proyecto::class, 'id_proyecto');
    }
}

