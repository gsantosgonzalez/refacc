<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticuloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'clave' => 'max:20|required',
            'nombre' => 'max:80|required',
            'id_categoria' => 'required',
            'cantidad' => 'required|integer',
            'stock' => 'required|integer',
            'precio' => 'required|numeric',
            'marca' => 'max:40|required'
        ];
    }
}
