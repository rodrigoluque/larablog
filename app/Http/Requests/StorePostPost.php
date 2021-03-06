<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false; por defecto
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
            //Reglas de validacion del formulario 
            'title'=>'required|min:5|max:50',
            'url'=>'required|min:3|max:10',
            'content'=>'required|min:3|max:500',
            'category_id' => 'required',
            'posted' => 'required'
        ];
    }
}
