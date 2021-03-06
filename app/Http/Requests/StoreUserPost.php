<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPost extends FormRequest
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
             //Reglas de validacion del formulario 
             'name'=>'required|string|max:20',
             'surname'=>'required|string|max:20',
             'email' => 'required|string|email|max:255|unique:users',
             'password'=> 'required|string|min:8'
        
        ];
    }
}
