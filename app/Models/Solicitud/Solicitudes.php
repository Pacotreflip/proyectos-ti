<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Solicitud;

use App\Models\Solicitud\Solicitud;
use App\Models\Documento\Documento;

/**
 * Description of Solicitudes
 *
 * @author JFEsquivel
 */
class Solicitudes {
    protected $solicitud;
    
    public function __construct(Solicitud $solicitud) {
        $this->solicitud = $solicitud;
    }
    
    public function attachDocumento($file) {
        $extension = $file->getClientOriginalExtension();
        $directory = 'uploads/documentos/';
        $filename = sha1(time().time()).".{$extension}";
        $nombre = $file->getClientOriginalName();
        $documento = new Documento();
        $documento->nombre = $nombre;
        $documento->path = $directory . $filename;        
        $file->move($directory, $filename);
        $documento->save();
        
        $this->solicitud->documentos()->attach($documento);
        
        return $documento;
    }
    
}
