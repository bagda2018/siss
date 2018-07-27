<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacaoFormRequest extends FormRequest
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
            'name' => 'sometimes|required|min:10|max:100',
            'email' => 'sometimes|required|email',
            'data' => 'sometimes|date|required',
            'telefone' => 'sometimes|Digits:9',
            'codigo_postal' => 'sometimes|required|numeric',
            'numero'   => 'sometimes|numeric',
            'especialidade' => 'sometimes|required',
            'categoria_clinica_id' => 'sometimes|required',
            'username' =>'sometimes|required',
            'password'=> 'sometimes|required|min:8|alpha_num',
            'repita_senha'=> 'sometimes|required|min:8|alpha_num|same:password',
            'senha_permissao'=> 'sometimes|required|min:6|max:10|alpha_num',
            'dia' => 'sometimes|date|required',
            'hora'=> 'sometimes|required',
            'hora_termino'=> 'sometimes|required',
            'hora_inicio'=> 'sometimes|required'


        ];
    }
    
//   public function messages()
//   {
//       return [
//        //    'name.required' => 'O campo nome é de preenchemento obrigatorio',
//            //   'name.alpha' => 'No campo nome só deve ter letras',
//            //   'name.min' => 'O campo nome deve ter no minimo 10 letras',
////            'name.max' => 'O campo nome deve ter no maximo 100 letras',
//            //  'data.date' => 'O campo data é  de preenchimento obrigatorio',
//            //   'morada.required'   => 'O campo morada deve'
//              
//       ];
//   }
}
