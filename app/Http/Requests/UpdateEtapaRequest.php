<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateEtapaRequest extends Request
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
            'fecha_inicio' => 'requided|date',
            'fecha_fin' => 'required|date|after:'.$this->fecha_inicio.''
        ];
    }
    
    public function messages() {
        return [
            'fecha_inicio.required'  => 'La "Fecha Inicio Estimada" es obligatoria.',
            'fecha_fin.required'  => 'La "Fecha Fin Estimada" es obligatoria.'            
        ];
    }
}
