<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ValidacoesController;
use Illuminate\Support\Facades\DB;
use App\Models\AgendaTrabalho;
use App\Models\PessoalClinico;

class AgendaTrabalhoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $this->authorize('permission_clinico');
        $medicos = PessoalClinico::with('agendas')->get();
       return View('painel.agenda_trabalho.listar', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $this->authorize('permission_admin');
        $titulo = "Nova Agenda de Trabalho ";
        $pessoal_clinicos = DB::table('pessoal_clinicos')->where('categoria_clinica_id', 1)->orderBy('name', 'ASC')->get();
        $validacao = new ValidacoesController;
        $pessoal_clinicos = $validacao->getNomes($pessoal_clinicos);

        return View('painel.agenda_trabalho.new-edit', compact('titulo', 'pessoal_clinicos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->authorize('permission_admin');
        $agenda = new AgendaTrabalho();
        $agenda->create($request->all());

        return redirect()->route('agenda_trabalho.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $this->authorize('permission_clinico');
        $utente = AgendaTrabalho::Where('id',$id)->with( 'entidade_financeira','user')->get()->first();
        $titulo = "Dados Pessoais ";
        $dados_conta = 'Dados da Conta';
       return View('painel.utente.show', compact('utente', 'titulo', 'dados_conta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $this->authorize('permission_clinico');
        $validacao = new ValidacoesController();
        $agenda = AgendaTrabalho::Where('id',$id)->with('pessoalClinico')->get()->first();
        $titulo = "Editar Agenda";
         $pessoal_clinicos = DB::table('pessoal_clinicos')->where('categoria_clinica_id', 1)->get();
         $pessoal_clinicos = $validacao->getNomes($pessoal_clinicos);
       return View('painel.agenda_trabalho.new-edit', compact('agenda', 'titulo','pessoal_clinicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->authorize('permission_admin');
        //
    }

}
