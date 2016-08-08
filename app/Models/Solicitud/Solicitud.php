<?php

namespace App\Models\Solicitud;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use App\Models\Presenters\SolicitudPresenter;
use App\Models\Proyecto\Proyecto;
use App\Models\Documento\Documento;

class Solicitud extends Model
{
    use PresentableTrait;
    protected $presenter = SolicitudPresenter::class;
    protected $table = 'solicitudes';
    protected $connection = 'proyectos_ti';
    protected $dates = ['fecha'];
    protected $fillable = ['id_proyecto', 'fecha', 'tipo', 'id_solicitante', 'objetivo', 'descripcion'];
    
    public function proyecto() {
        return $this->belongsTo(Proyecto::class);
    }
    
    public function documentos() {
        return $this->belongsToMany(Documento::class, 'solicitudes_documentos', 'id_solicitud', 'id_documento');
    }
    
    public static function tipos() {
        return [
            2 => 'MODIFICACIÓN',
            3 => 'MANTENIMIENTO'
        ];
    }
}
