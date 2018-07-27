<?php

namespace App\Http\Requests\requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoalClinicoFormRequest extends FormRequest
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
            'name' => 'required|min:10|max:100',
            'email' => 'required|email',
            'data' => 'date|required',
            'telefone' => 'Digits:9',
            'codigo_postal' => 'required',
            'username' =>'required',
            //'password'=> 'required|min:8|alpha_num',
        ];
    }
}
