<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Http\Requests\ValidacaoFormRequest;
use App\Http\Controllers\ValidacoesController;
use App\Models\Especialidade;
use App\Models\Utente;
use App\Models\Consulta;
use App\Models\PessoalClinico;
use App\Models\User;
use App\Models\Providers\AuthServiceProvider;

class ConsultaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $this->authorize('permission_clinico');
        $titulo = "Consultas Agendadas (Geral)";
        $consultas = Consulta::consultas()->paginate(5);
        return View('painel.consulta.listarConsultas', compact('consultas', 'titulo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $this->authorize('permission_utente');
        $validacao = new ValidacoesController();
        $titulo = "Nova Consulta";
        $especialidades = Especialidade::orderBy('name', 'ASC')->get();
        $especialidades = $validacao->getNomes($especialidades);
        return View('painel.consulta.new-edit', compact('especialidades', 'titulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacaoFormRequest $request) {
        $this->authorize('permission_utente');
        $nova_consulta = new Consulta();
        $dados = $request->all();
        $utente = Utente::where('numero', $dados['numero'])->first();
        $dados['utente_id'] = $utente->id;
        $nova_consulta->create($dados);
        return redirect()->route('consulta.create');
        //   echo $dados;
        //var_dump($dados);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $this->authorize('permission_utente');
        $consultas = Consulta::utenteConsultas($id, 'pendente');
        echo $consultas;
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $this->authorize('permission_clinico');

        $id = base64_decode(strstr(base64_decode($id), '=='));
        if (!(Consulta::Where('id', $id)->first() == '')):
            $estados = array('pendente' => "pendente", 'cancelada' => "cancelada", 'realizada' => "realizada");
            $consulta = Consulta::Where('id', $id)->with('utente')->first();
            $titulo = strtoupper("Realizção de Consulta");
            return View('painel.consulta.realizar', compact('consulta', 'titulo', 'estados'));
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
    public function update(Request $request, $id) {
        $this->authorize('permission_clinico');
        $id = base64_decode(strstr(base64_decode($id), '=='));
        $clinico = PessoalClinico::where('user_id', auth()->user()->id)->first();
        $consulta = Consulta::Where('id', $id)->first();
        $consulta['pessoal_clinico_id'] = $clinico->id;
        $consulta->update($request->all());
        return redirect()->route('realizar_consulta', ["pendente",
                base64_encode(base64_encode('bagda@2018').base64_encode(auth()->user()->id))
               ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->authorize('permission_clinico');
        //
    }

}
