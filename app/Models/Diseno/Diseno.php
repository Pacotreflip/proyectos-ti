<?php

namespace App\Models\Diseno;

use Illuminate\Database\Eloquent\Model;
use App\Models\Proyecto\Proyecto;

class Diseno extends Model
{
    protected $table = 'diseno';
    protected $connection = 'proyectos_ti';
    protected $dates = ['fecha_inicio', 'fecha_fin'];
    protected $fillable = ['id_proyecto'];

    public function proyecto() {
        return $this->belongsTo(Proyecto::class, 'id_proyecto');
    }
}
