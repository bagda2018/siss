<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ValidacoesController;
use \App\Http\Requests\ValidacaoFormRequest;
use App\Models\Admin;
use App\Models\User;
use App\Models\Municipio;

class PessoalAdministrativoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $this->authorize('permission_admin');
        $administradores = Admin::orderBy('name')->paginate(5);

        return View('painel.Admin.listaradmin', compact('administradores'));
    }

    public function create() {
        $this->authorize('permission_admin');
        $user = new User();
        $dados_conta = 'Dados da Conta';
        $titulo = "Novo Administrador ";

        $validacao = new ValidacoesController();
        $dados = Municipio::orderBy('name','ASC')->get();
        $municipios = $validacao->getNomes($dados);

        return View('painel.admin.registarADM', compact('administrador', 'titulo', 'dados_conta', 'municipios', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacaoFormRequest $request) {
        $this->authorize('permission_admin');
        $administrador = new admin;
        $dadosFormulario = $request->all();
        $dadosFormulario['password'] = bcrypt($dadosFormulario['password']);
        $user = User::create($dadosFormulario);

        $dadosFormulario['user_id'] = $user->id;
        $administrador->create($dadosFormulario);
        DB::table('role_user')->insert([
            'role_id' => 2,
            'user_id' => $user->id
        ]);
        return redirect()->route('administrador.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $this->authorize('permission_admin');
        $id = base64_decode(strstr(base64_decode($id),'=='));
        if (!(Admin::Where('user_id', $id)->first() == '')):
            $administrador = Admin::Where('user_id', $id)->with('municipio', 'user')->first();
            $titulo = "Dados Pessoais ";
            $dados_conta = 'Dados da Conta';
            return View('painel.admin.showAdmin', compact('administrador', 'titulo', 'dados_conta'));
        endif;

        return redirect()->back();
    }

    public function edit($id) {
        $this->authorize('permission_admin');
        $id = base64_decode(strstr(base64_decode($id),'=='));
        if (!(Admin::Where('user_id', $id)->first() == '')):
            $validacao = new ValidacoesController();
            $administrador = Admin::Where('user_id', $id)->with('municipio', 'user')->first();
            $titulo = "Editar Administrador " . $administrador->name;
            $dados_conta = 'Dados da Conta';

            $dados = Municipio::orderBy('name','ASC')->get();

            $municipios = $validacao->getNomes($dados);
            $user = $administrador->user;
            return View('painel.admin.registarADM', compact('administrador', 'titulo', 'dados_conta', 'municipios', 'user'));
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
        $this->authorize('permission_admin');
        $id = base64_decode(strstr(base64_decode($id),'=='));
        if (!(Admin::Where('user_id', $id)->first() == '')):
            $dadosFormulario = $request->all();
            $administrador = Admin::Where('user_id', $id)->get()->first();
            $user = User::where('id', $administrador->user_id)->get()->first();

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
            $administrador->update($dadosFormulario);
            return redirect()->route('administrador.show', 
                    base64_encode(base64_encode('bagda@2018').base64_encode($user->id)));
        endif;

        return redirect()->back();
    }

    public function destroy($id) {
         $this->authorize('permission_admin');
         $id = base64_decode(strstr(base64_decode($id),'=='));
        if (!(Admin::Where('id', $id)->first() == '')):
            $administrador = Admin::Where('id', $id);
            $user = User::Where('id', $administrador->user_id);

            $delete = $administrador->delete();
            if ($delete) {
                $dele = $user->delete();
                if ($dele) {
                    return redirect()->route('administrador.index');
                }
            }
        endif;

        return redirect()->back();
    }

}
