<?php

namespace App\Models\Presenters;

use Laracasts\Presenter\Presenter;

class SolicitudPresenter extends Presenter {

    public function tipo_solicitud() {
        return $this->tipo == 1 ? 'NUEVO SISTEMA' : ($this->tipo == 2 ? 'MODIFICACIÓN' : 'MANTENIMIENTO');
    }
}
