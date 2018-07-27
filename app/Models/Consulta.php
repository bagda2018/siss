<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
 
        protected $fillable = ['hora','dia','especialidade_id','utente_id',
        ];


    protected $guarded = ['estado','pessoal_clinico_id'];



    public function utente(){
        return $this->belongsTo(Utente::class);
    }
    
    public function especialidade()
    {
        return $this->belongsTo(Especialidade::class);
    }
    
    
     public function pessoal_clinico()
    {
        return $this->belongsTo(PessoalClinico::class);
    }
    
    
    
    
    
    static function utenteConsultas($id, $estado){   
         return Consulta::where('utente_id',$id)
                 ->where('estado',$estado)
                 ->orderBy('dia','ASC')
                 ->orderBy('hora','ASC')->with('especialidade','utente');
    }
    
    static function medicoConsultas($medico, $estado){
        
        return  Consulta::where('especialidade_id',$medico->especialidade_id)
                 ->where('estado',$estado)
                ->orderBy('dia','ASC')
                ->orderBy('hora','ASC')->with('especialidade','utente','pessoal_clinico');
    }
    
    static function consultas(){
        
        return  Consulta::orderBy('dia','ASC')
                ->orderBy('hora','ASC')->with('especialidade','utente')
                ;   
    }
    
    
    
}
