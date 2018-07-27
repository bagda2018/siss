<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CategoriaClinica;
class PessoalClinico extends Model
{
    public $table = 'pessoal_clinicos';
    
    protected $fillable = ['municipio_id','user_id','name','data'
        ,'telefone','codigo_postal','especialidade_id','categoria_clinica_id','sexo'];
    
    

     public function user(){
        return $this->belongsTo(User::class);
    }
       
    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }
    
    public function especialidade()
    {
        return $this->belongsTo(Especialidade::class);
    }
    
    public function agendas()
    {
        return $this->hasMany(AgendaTrabalho::class);
    }
    
    public function categoria_clinica()
    {
        return $this->belongsTo(CategoriaClinica::class);
    }
    
    
}
