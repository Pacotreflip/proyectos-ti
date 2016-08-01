<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documentos';
    protected $connection = 'proyectos_ti';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['name', 'path', 'thumbnail', 'id_solicitante', 'objetivo', 'descripcion'];
    
    public function proyecto() {
        return $this->belongsTo(Proyecto::class);
    }
    
    public function solicitante() {
        return \Ghi\Core\Models\User::find($this->id_solicitante);  
    }

    public function getDateFormat() {
        return 'Y-d-m H:i:s';
    }
    
    public static function tipos() {
        return [
            2 => 'MODIFICACIÓN',
            3 => 'MANTENIMIENTO'
        ];
    }
}
