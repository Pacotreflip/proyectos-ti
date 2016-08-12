<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StorePreguntaRequest extends Request
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
            'pregunta' => 'required|max:255|min:5|unique:proyectos_ti.cat_preguntas',
            'opcional' => 'required'
        ];
    }
    
    public function messages() {
        return [
            'pregunta.required' => 'El campo "Pregunta" es obligatirio',
            'pregunta.max' => 'El campo "Pregunta" debe ser menor a 255 caracteres',
            'pregunta.min' => 'El campo "Pregunta" debe ser mayor a 5 caracteres',
            'pregunta.unique' => 'La pregunta ya ha sido registrada',
            'opcional.required' => 'Por favor especifique si la pregunta es opcional o no'            
        ];
    }
}
