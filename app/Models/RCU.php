<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RCU extends Model
{
    public $table = "rcus";
    protected $fillable = ['alergico','grupo_sanguino_id','pessoal_clinico_id','utente_id'];


    public function pessoalClinico(){
        return $this->belongsTo(PessoalClinico::class);
    }
    
    public function utente()
    {
        return $this->belongsTo(Utente::class);
    }
    
     public function grupoSanguino()
    {
        return $this->belongsTo(GrupoSanguino::class);
    }
    
    public function diagnosticos()
    {
        return $this->hasMany(Diagnostico::class);
    }
    
    
    
}
