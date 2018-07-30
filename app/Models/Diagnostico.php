<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
   protected $fillable = ['name','procedimento','dia','hora','pessoal_clinico_id','rcu_id','consulta_id'];




    public function pessoalClinico(){
        return $this->belongsTo(PessoalClinico::class);
    }
    
    public function consulta(){
        return $this->belongsTo(Consulta::class);
    }
    
    
    public function rcu()
    {
        return $this->belongsTo(RCU::class);
    }
}
