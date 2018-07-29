<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Servico;
class Especialidade extends Model
{
    
    
    
    public function servicos(){      
        return $this->hasMany(Servico::class);
    }
    
    public function tipo_exames(){      
        return $this->hasMany(TipoExames::class);
    }
    
    
    
     public function busca($dados,$total){      
        
         return $this->where(function($query) use($dados){
                     if (isset($dados)) {
                        $query->where('name','like', '%'.$dados.'%');
                    }
                })->orderBy('name','ASC')->paginate($total);
    }
    
            
}
