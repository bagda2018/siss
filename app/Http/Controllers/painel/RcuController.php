<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ValidacoesController;
use \App\Http\Requests\ValidacaoFormRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Utente;
use Illuminate\Support\Facades\Redirect;
use App\Models\PessoalClinico;
use App\Models\RCU;
use App\Models\Municipio;
use App\Models\GrupoSanguino;
class RcuController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('permission_utente');
         $rcus = RCU::orderBy('id')->paginate(5);

        return View('painel.rcu.listarRCU', compact('rcus'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('permission_clinico');
        $dados_conta = 'Dados da Conta';
        $titulo = "Novo RCU ";
        $validacao = new ValidacoesController();
        $utentes = Utente::utentesSemRcu();
        $dados =PessoalClinico::get();

        $pessoal_clinico = $validacao->getNomes($dados);
        $tipos = GrupoSanguino::tipoSanguinos();
       // var_dump($tipos);
        return View('painel.rcu.rcu', compact('titulo', 'dados_conta','tipos', 'utentes', 'pessoal_clinico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('permission_utente');
        $rcu = new RCU();
        $dadosFormulario = $request->all();
        
        $rcu->create($dadosFormulario);

       return redirect()->route('rcu.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('permission_utente');
       if (!(RCU::Where('id',$id) == '')):
            $rcu = RCU::Where('id',$id)->with('utente', 'pessoalClinico')->get()->first();
            $titulo = "Dados Pessoais ";
            $dados_conta = 'Dados da Conta';
            return View('painel.rcu.show', compact('rcu', 'titulo', 'dados_conta'));
        endif;

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('permission_clinico');
       if (!(RCU::Where('id',$id) == '')):
            $validacao = new ValidacoesController();
            $rcu = RCU::Where('id',$id)->with('Utente', 'pessoalClinico')->get()->first();
            $titulo = "Editar RCU " ;
            $dados_conta = 'Dados da Conta';
            $dados = Utente::get();
            $pessoalcli=PessoalClinico::get();

            $utente = $validacao->getNomes($dados);
            $pessoal_clinico = $validacao->getNomes($pessoalcli);

            return View('painel.rcu.rcu', compact('rcu', 'titulo', 'dados_conta', 'pessoal_clinico', 'utente'));
        endif;

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('permission_clinico');
         $dadosFormulario = $request->all();
         $rcu = RCU::Where('id',$id);
        
        $administrador->update($dadosFormulario);  
     
        
        return redirect()->route('rcu.show',$administrador->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('permission_clinico');
         $rcu = RCU::find($id);
        
        $delete = $rcu->delete();
        if ($delete) {
           
                return redirect()->route('rcu.index');
            }
        
        return redirect()->back();
    }
}
