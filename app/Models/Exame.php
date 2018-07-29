<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ValidacoesController;
use DB;
class Exame extends Model
{
    
    
    
    
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
    
    
    
    static function especialidades(){
        
        $especialidades = DB::table('especialidades')
                    ->whereExists(function ($query) {
                        $query->select(DB::raw(1))
                        ->from('tipo_exames')
                        ->whereRaw('tipo_exames.especialidade_id = especialidades.id');
                })
                ->orderBy('name','ASC')
                ->get();
                
         $validacao = new ValidacoesController();
         $especialidades = $validacao->getNomes($especialidades);
        return  $especialidades;   
    }
    
    
}
