<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

class ValidacoesController extends Controller
{
    
    public function getNomes($dados){
        $nomes = array();
        foreach ($dados as $dado) {
            $nomes[$dado->id] = $dado->name;         
        }
        
        return $nomes;
    }
      
//      @php $v = base64_encode(base64_encode('bagda@2018').base64_encode($utente->id)) @endphp
}
