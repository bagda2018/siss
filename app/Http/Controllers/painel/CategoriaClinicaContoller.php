<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoriaClinica;
use Validator;
use response;
// use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\input;
//use Illuminate\Support\Facades\Response;



class CategoriaClinicaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $titulo = 'Categorias Clinicas';
        $categoriaClinicas = CategoriaClinica::paginate(10);
        return View('painel.categoria_clinica.listarCategorias', compact('categoriaClinicas', 'titulo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $titulo = 'Nova Categoria';
        return View('painel.categoria_clinica.new-edit', compact('categoria', 'titulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = array('name' => 'required');
        $validator = Validator::make(input::all(), $rules);
        if ($validator->fails()) :
            return response::json(['errors' => $validator->getMessageBag()->toArray()]);
        else:
            $categoriaClinica = new CategoriaClinica;
            $dados = $request->all();
            $categoriaClinica->create($dados);
//            return redirect()->route('categoria_clinica.create');
            return response()->json($categoriaClinica);
            

        endif;
    }
    
    
    public function teste(Request $request) {
        $rules = array('name' => 'required');
        $validator = Validator::make(input::all(), $rules);
        if ($validator->fails()) :
            return response::json(['errors' => $validator->getMessageBag()->toArray()]);
        else:
            $categoriaClinica = new CategoriaClinica();
            $categoriaClinica->create($request->all());
//            return redirect()->route('categoria_clinica.create');
            return response()->json($categoriaClinica);
            

        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
        $categoriaclinica = CategoriaClinica::find($id);
        $titulo = 'Alterar Categoria clinica';
        return View('painel.categoriaclinica.new-edit', compact('categoriaclinica', 'titulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $dadosCategoria = $request->all();
        $categoria = CategoriaClinica :: find($id);
        $categoria->update($dadosCategoria);
        echo 'Ola Bom Dia Para Ti...!';
        return redirect()->route('categoriaclinica.edit', $categoria->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
        // $categotia = CategoriaClinica::find($id);
        echo 'kkkkkkkkkkkkkkkkkkkkkkk';
    }

}
