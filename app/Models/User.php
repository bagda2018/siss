<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['username','password','email','repita_senha'];
    
    
    
    public function utente(){      
        return $this->hasOne(Utente::class);
    }
    
     public function medico(){      
        return $this->hasOne(PessoalClinico::class);
    }
    
     public function Administrador(){      
        return $this->hasOne(Administrador::class);
    }
    
    
}
