<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use App\Models\Presenters\SolicitudPresenter;

class Solicitud extends Model
{
    use PresentableTrait;
    protected $presenter = SolicitudPresenter::class;
    protected $table = 'solicitudes';
    protected $connection = 'proyectos_ti';
    protected $dates = ['fecha', 'created_at', 'updated_at'];
    protected $fillable = ['id_proyecto', 'fecha', 'tipo', 'id_solicitante', 'objetivo', 'descripcion'];
    
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
