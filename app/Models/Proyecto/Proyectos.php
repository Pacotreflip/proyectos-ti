<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Proyecto;

use App\Models\Solicitud\Solicitud;
use App\Models\Analisis\Analisis;
use App\Models\Diseno\Diseno;
use Illuminate\Support\Facades\DB;

/**
 * Description of proyectos
 *
 * @author JFEsquivel
 */
class Proyectos {
    
    protected $proyecto;
    protected $data;
    
    public function __construct(array $data) {
        $this->proyecto = new Proyecto();
        $this->data = $data;
    }
    
    public function create() {
        try {
            DB::connection('proyectos_ti')->beginTransaction();
            
            $this->proyecto->nombre = $this->data['nombre'];
            $this->proyecto->fecha_inicio = $this->data['fecha_inicio'];
            $this->proyecto->fecha_fin = $this->data['fecha_fin'];
            $this->proyecto->descripcion = $this->data['descripcion'];
            $this->proyecto->objetivo = $this->data['objetivo'];
            $this->proyecto->id_usuario = auth()->user()->idusuario;
            $this->proyecto->save();

            $solicitud = New Solicitud();
            $solicitud->id_proyecto = $this->proyecto->id;
            $solicitud->fecha = $this->data['fecha_solicitud'];
            $solicitud->tipo = 1;
            $solicitud->solicitante = $this->data['solicitante'];
            $solicitud->objetivo = $this->data['objetivo'];
            $solicitud->descripcion = $this->data['descripcion'];
            $solicitud->id_usuario = auth()->user()->idusuario;
            $solicitud->save();
            
            DB::connection('proyectos_ti')->commit();  
        } catch (Exception $ex) {
            DB::connection('proyectos_ti')->rollBack();
            throw $ex;
        }
        
        $this->agregaEtapas();
        
        return [
            'proyecto' => $this->proyecto, 
            'solicitud' => $solicitud
        ];
    }
    
    public function agregaEtapas() {
        Analisis::create([
            'id_proyecto' => $this->proyecto->id
        ]);
        Diseno::create([
            'id_proyecto' => $this->proyecto->id 
        ]);
    }
}
