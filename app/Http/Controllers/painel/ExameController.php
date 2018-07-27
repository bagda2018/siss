<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ValidacoesController;
use App\Models\Especialidade;
use App\Models\TipoExame;


class ExameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('permission_admin');
         $titulo = "Marca Exame";
         $especialidade = Especialidade::get();
//        $exames =  DB::table('tipo_exames')->select('name');
          $exame = TipoExame::get();
          
          $validacao = new ValidacoesController();
        
        $especialidades = $validacao->getNomes($especialidade);
         $exames = $validacao->getNomes($exame);
       
       // var_dump($exames);
       //echo $exames['name'];
        
        return View('painel.exames.marcarExame', compact('exames','titulo','especialidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('permission_admin');
         $dados = $request->all();
        $exame = new Exame();
        $p = $exame->create($dados);
        
         
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('permission_admin');
        //
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
        $this->authorize('permission_admin');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->authorize('permission_admin');
        //
    }
}
