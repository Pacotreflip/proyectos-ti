<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreProyectoRequest extends Request
{
    
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|unique:proyectos_ti.proyectos|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_solicitud' => 'required|date',
            'solicitante' => 'required|string|max:255',
            'fecha_fin' => 'required|date|after:'.$this->fecha_inicio.'',
            'descripcion' => 'required|max:255',
            'objetivo' => 'required|max:255'
        ];
    }
    
    public function messages()
    {
        return [
            'nombre.required' => 'El "Nombre del Proyecto" Es obligatorio.',
            'nombre.unique' => 'El "Nombre del Proyecto" ya ha sido registrado.',
            'nombre.max' => 'El "Nombre del Proyecto" debe ser menor a 255 caracteres.',
            'fecha_inicio.required'  => 'La "Fecha de Inicio" es obligatoria.',
            'fecha_solicitud.required'  => 'La "Fecha de Solicitud" es obligatoria.',
            'fecha_fin.required'  => 'La "Fecha de Fin" es obligatoria.',
            'solicitante.required' => 'El "Nombre del Solicitante" es obligatorio.',
            'solicitante.max' => 'El "Nombre del Solicitante" debe ser menor a 255 caracteres.',
            'descripcion.required' => 'La "Descripción del Requerimiento" Es obligatoria.',
            'objetivo.required' => 'El "Objetivo del Proyecto" Es obligatorio.'
        ];
    }
}
