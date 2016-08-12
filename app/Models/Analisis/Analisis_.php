<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Analisis;

use App\Models\Analisis\Analisis;
use App\Models\Documento\Documento;

/**
 * Description of analisis_
 *
 * @author JFEsquivel
 */
class Analisis_ {
    protected $analisis;
    
    public function __construct(Analisis $analisis) {
        $this->analisis = $analisis;
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
        
        $this->analisis->documentos()->attach($documento);
        
        return $documento;
    }
    
}
