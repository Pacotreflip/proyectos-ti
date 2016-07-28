<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'proyectos';
    protected $connection = 'proyectos_ti';
    protected $fillable = ['nombre', 'descripcion', 'objetivo', 'fecha_inicio', 'fecha_fin'];

    public function getDateFormat() {
        return 'Y-d-m H:i:s';
    }
}

