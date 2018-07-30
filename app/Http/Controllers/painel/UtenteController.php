<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ValidacoesController;
use \App\Http\Requests\ValidacaoFormRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Utente;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use App\Models\EntidadeFinanceira;
use App\Models\Municipio;
use App\Models\Consulta;

class UtenteController extends Controller {

    public function index() {
        $this->authorize('permission_utente');
        $utentes = Utente::paginate(15);
        return View('painel.utente.listar', compact('utentes'));
    }

    public function create() {
        $user = new User();
        $dados_conta = 'Dados da Conta';
        $titulo = "Novo Utente ";

        $validacao = new ValidacoesController();
        $ef = EntidadeFinanceira::orderBy('name')->get();
        $dados = Municipio::orderBy('name')->get();

        $entidade_financeiras = $validacao->getNomes($ef);
        $municipios = $validacao->getNomes($dados);
        return View('painel.utente.new-edit', compact('utente', 'titulo', 'dados_conta', 'entidade_financeiras', 'municipios', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacaoFormRequest $request) {
        $utente = new Utente;
        $dadosFormulario = $request->all();
        $dadosFormulario['password'] = bcrypt($dadosFormulario['password']);
        $dadosFormulario['repita_senha'] = bcrypt($dadosFormulario['repita_senha']);
        $dadosFormulario['senha_permissao'] = base64_encode($dadosFormulario['senha_permissao']);
        
        $user = User::create($dadosFormulario);
        $dadosFormulario['numero'] = $user->id + 1; //  teste
        $dadosFormulario['user_id'] = $user->id;
        $utente->create($dadosFormulario);
        DB::table('role_user')->insert([
            'role_id' => 4,
            'user_id' => $user->id
        ]);
        return redirect()->route('utente.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $this->authorize('permission_utente');
        $id = base64_decode(strstr(base64_decode($id), '=='));

        if (!(Utente::Where('user_id', $id)->first() == '')):
            $utente = Utente::Where('user_id', $id)->with('municipio', 'entidade_financeira', 'user')->first();
            $titulo = "Dados Pessoais ";
            $dados_conta = 'Dados da Conta';
            $utente->senha_permissao = base64_decode($utente->senha_permissao);
            return View('painel.utente.show', compact('utente', 'titulo', 'dados_conta'));
        endif;

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $this->authorize('permission_utente');
        $id = base64_decode(strstr(base64_decode($id), '=='));
        if (!(Utente::Where('user_id', $id)->first() == '')):
            $validacao = new ValidacoesController();
            $utente = Utente::Where('user_id', $id)->with('municipio', 'entidade_financeira', 'user')->first();
            $titulo = "Editar Utente " . $utente->name;
            $dados_conta = 'Dados da Conta';
            $ef = EntidadeFinanceira::get();
            $dados = Municipio::get();
            $entidade_financeiras = $validacao->getNomes($ef);
            $municipios = $validacao->getNomes($dados);
            $user = $utente->user;
            return View('painel.utente.new-edit', compact('utente', 'titulo', 'dados_conta', 'entidade_financeiras', 'municipios', 'user'));
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
        $this->authorize('permission_utente');
        $id = base64_decode(strstr(base64_decode($id), '=='));
        if (!(Utente::Where('user_id', $id)->first() == '')):

            $dadosFormulario = $request->all();
            $utente = Utente::Where('user_id', $id)->first();
            $user = User::where('id', $utente->user_id)->first();

            echo $user->id . '<br>';
            if ($dadosFormulario['password'] == ''):
                $user->update([
                    'username' => $dadosFormulario['username']
                ]);
            else:
                $user->update([
                    'username' => $dadosFormulario['username'],
                    'password' => bcrypt($dadosFormulario['password'])
                ]);
            endif;

            $utente->update($dadosFormulario);

            return redirect()->route('utente.show', base64_encode(base64_encode('bagda@2018') . base64_encode($user->id)));
        endif;

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->authorize('permission_utente');
        $id = base64_decode(strstr(base64_decode($id), '=='));
        if (!(Utente::Where('user_id', $id)->first() == '')):
            $utente = Utente::Where('user_id', $id)->get()->first();
            $user = User::Where('id', $utente->user_id)->get()->first();
            $delete = $utente->delete();
            if ($delete) {
                $dele = $user->delete();
                if ($dele) {
                    return redirect()->route('utente.index');
                }
            }
        endif;
        return redirect()->back();
    }

    public function consultas($estado, $id) {
        $this->authorize('permission_utente');
        //  $this->authorize('permission_clinico');
        $id = base64_decode(strstr(base64_decode($id), '=='));
        
        if (!(Utente::Where('user_id', $id)->first() == '')):
            $titulo = strtoupper("Consultas " . $estado.'s');
            $utente = Utente::Where('user_id', $id)->first();
            $consultas = Consulta::utenteConsultas($utente->id, $estado)->paginate(10);
            return View('painel.consulta.utenteConsultas', compact('consultas', 'titulo'));
        endif;

        return redirect()->back();
    }

}
