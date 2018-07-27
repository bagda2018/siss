<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacaoFormRequest;
use App\Http\Controllers\ValidacoesController;
use Illuminate\Support\Facades\DB;
use App\Models\PessoalClinico;
use App\Models\User;
use App\Models\Especialidade;
use App\Models\Municipio;
use App\Models\CategoriaClinica;
use App\Models\Consulta;

class PessoalClinicoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $this->authorize('permission_admin');
        $pessoalClinicos = PessoalClinico::paginate(15);
        return View('painel.medico.listar', compact('pessoalClinicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $this->authorize('permission_admin');
        $user = new User();
        $dados_conta = 'Dados da Conta';
        $titulo = "Novo Medico ";

        $categoria = DB::table('categoria_clinicas')->orderBy('name', 'ASC')->get();
        $validacao = new ValidacoesController();
        $ef = Especialidade::orderBy('name','ASC')->get();
        $dados = Municipio::orderBy('name','ASC')->get();

        $especialidades = $validacao->getNomes($ef);
        $municipios = $validacao->getNomes($dados);
        $categorias = $validacao->getNomes($categoria);
        return View('painel.medico.new-edit', compact('medico', 'titulo', 'dados_conta', 'especialidades', 'municipios', 'user', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(ValidacaoFormRequest $request)
    {
         $this->authorize('permission_admin');
        $medico = new PessoalClinico();
        $dadosFormulario = $request->all();
        $dadosFormulario['password'] = bcrypt($dadosFormulario['password']);
        $user = User::create($dadosFormulario);
        $dadosFormulario['user_id'] = $user->id;
        $medico->create($dadosFormulario);
        DB::table('role_user')->insert([
            'role_id' => 3,
            'user_id' => $user->id
        ]);
       return redirect()->route('medico.create');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $this->authorize('permission_clinico');
          $id = base64_decode(strstr(base64_decode($id),'=='));
        if (!(PessoalClinico::Where('user_id',  $id)->first() == '')):
            $medico = PessoalClinico::Where('user_id', $id)->with('municipio', 'especialidade','user','categoria_clinica')->first();
            $titulo = "Dados Pessoais ";
            $dados_conta = 'Dados da Conta';
            //echo $medico;
            return View('painel.medico.show', compact('medico', 'titulo', 'dados_conta'));
        endif;

        return redirect()->back();
       // echo base64_encode('base64_encode(bagda@2018)');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $this->authorize('permission_clinico');
          $id = base64_decode(strstr(base64_decode($id),'=='));
        if (!(PessoalClinico::Where('user_id',  $id)->first() == '')):
            $validacao = new ValidacoesController();
            $medicos = PessoalClinico::Where('user_id',  $id)->with('municipio', 'user', 'especialidade')->first();
            $titulo = "Editar Medico " . $medicos->name;
            $dados_conta = 'Dados da Conta';
            $especialidade = Especialidade::orderBy('name','ASC')->get();
            $categorias = CategoriaClinica::orderBy('name','ASC')->get();
            $dados = Municipio::get();
            $especialidades = $validacao->getNomes($especialidade);
            $municipios = $validacao->getNomes($dados);
            $categorias = $validacao->getNomes($categorias);
            $user = $medicos->user;
            return View('painel.medico.new-edit', compact('medicos', 'titulo', 'dados_conta', 'especialidades', 'municipios', 'user', 'categorias'));
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
//    public function update(ValidacaoFormRequest $request, $id) {
    public function update(Request $request, $id) {
        $this->authorize('permission_clinico');
          $id = base64_decode(strstr(base64_decode($id),'=='));
        if (!(PessoalClinico::Where('user_id',  $id)->first() == '')):
            
            $dadosFormulario = $request->all();
            $pessoal_clinico = PessoalClinico::Where('user_id',  $id)->first();
            $user = User::where('id', $pessoal_clinico->user_id)->first();

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
            $pessoal_clinico->update($dadosFormulario);
            return redirect()->route('medico.show', 
                    base64_encode(base64_encode('bagda@2018').base64_encode($user->id)));
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
        $this->authorize('permission_admin');
          $id = base64_decode(strstr(base64_decode($id),'=='));
        if (!(PessoalClinico::Where('id',  $id)->first() == '')):
            $medico = PessoalClinico::Where('id', $id)->get()->first();
            $user = User::Where('id', $medico->user_id)->first();

            $delete = $medico->delete();
            if ($delete) {
                $dele = $user->delete();
                if ($dele){
                    return redirect()->route('medico.index');
                }
            }
        endif;

        return redirect()->back();
    }

    
    public function realizarConsulta($estado, $id) {
        $this->authorize('permission_clinico');
        //  $this->authorize('permission_clinico');
        $id = base64_decode(strstr(base64_decode($id), '=='));
        
        if (!(PessoalClinico::Where('user_id', $id)->first() == '')):
            $titulo = strtoupper("Realizar Consultas " . $estado .'s');
            $clinico = PessoalClinico::Where('user_id', $id)->first();
            $consultas = Consulta::medicoConsultas($clinico, $estado)->paginate(10);
           // echo $consultas;
           return View('painel.medico.consultaMarcada', compact('consultas', 'titulo'));
        endif;

        return redirect()->back();
    }

    
}
