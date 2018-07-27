<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Especialidade;
class DynamicDependentController extends Controller
{
    function index(){
        $especialidade = Especialidade()->get();
        $this->authorize('permission_utente');
        return View('painel.consulta.marcarConsulta');
        
    }
}
