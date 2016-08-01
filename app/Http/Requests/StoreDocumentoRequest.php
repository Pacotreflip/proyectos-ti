<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreDocumentoRequest extends Request
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
            'documento' => 'required|mimes:jpeg,bmp,png,jpg,pdf,xls,xslx,csv,doc,docx'
        ];
    }
}
