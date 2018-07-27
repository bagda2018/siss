<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
     protected $fillable = ['municipio_id','user_id','name','data'
        ,'telefone','codigo_postal','sexo'];
     
  
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    
    
    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }
}

