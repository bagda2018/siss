<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgendaTrabalho extends Model
{
    protected $fillable = ['pessoal_clinico_id','hora_inicio','hora_termino','data'
     ];
    
    
     public function pessoalClinico(){
         return $this->belongsTo(PessoalClinico::class);
     }
    
    
    
    
}
