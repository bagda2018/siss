<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaClinica extends Model
{
      
    protected $fillable = ['name'];

    public function medicos()
    {
        return $this->hasMany(Medico::class);
    }
}
