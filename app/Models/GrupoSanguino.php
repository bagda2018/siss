<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class GrupoSanguino extends Model
{
   protected $fillable = ['tipos'];
    
    
    public function utente()
    {
        return $this->hasMany(App\Models\RCU::class);
    }
    
    
    static function tipoSanguinos(){
        $tipo_sanguinos = GrupoSanguino::orderBy('tipo','ASC')->get();
          foreach ($tipo_sanguinos as $tipo) {
            $tipos[$tipo->id] = $tipo->tipo;         
        }
         return  $tipos;   
    }
}
