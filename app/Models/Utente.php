<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ValidacoesController;
use App\Models\Municipio;
use DB;
class utente extends Model
{
    protected $fillable = ['entidade_financeira_id','municipio_id','user_id','name','data'
        ,'telefone','codigo_postal','numero_EFR','sexo','numero','senha_permissao'];


    //protected $guarded = ['numero_EFR'];



    public function user(){
        return $this->belongsTo(User::class);
    }
    
     public function consultas(){
        return $this->hasMany(Consulta::class);
    }
    
     public function rcu(){
        return $this->hasOne(RCU::class);
    }
    
    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }
    
    
     public function entidade_financeira()
    {
        return $this->belongsTo(EntidadeFinanceira::class);
    }
    
    static function utentesSemRcu(){
        
        $utentes = DB::table('utentes')
                    ->whereNotExists(function ($query) {
                        $query->select(DB::raw(1))
                        ->from('rcus')
                        ->whereRaw('rcus.utente_id = utentes.id');
                })
                ->orderBy('name','ASC')
                ->get();
                
         $validacao = new ValidacoesController();
         $utentes = $validacao->getNomes($utentes);
        return  $utentes;   
    }
    
    
    
    
    
    
}
