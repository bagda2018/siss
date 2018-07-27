<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\utente;
use App\Models\PessoalClinico;

class Municipio extends Model
{
    
    
    
     public function utentes()
    {
        return $this->hasMany(Utente::class);
    }
    
     public function medicos()
    {
        return $this->hasMany(PessoalClinico::class);
    }
}
