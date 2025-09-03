<?php

namespace App\Http\Controllers;

use App\Models\CadastroModel;
use App\Models\ContatoModel;
use Illuminate\Http\Request;

class CadastroController extends Controller
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
    public function exibirCadastro() 
    { 
        $Cadastro = CadastroModel::all();
        return view('Cadastro',compact('Cadastro'));  //retorna pra view e em cima pega todos os registros do banco
    }
    public function exibirConsultas() 
    { 
        $cadastros = CadastroModel::all(); 
        $contatos = ContatoModel::all();
    
        return view('Consultas', compact('cadastros', 'contatos'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Cadastro = new CadastroModel(); //Cadastro é um objeto (da pra por qualquer nome)

		$Cadastro->NomeCadastro = $request->txNome; //"NomeCadastro" é a coluna da tabela agora o "$Cadastro" é o objeto, txNome é o mesmo que vai estar na view pra salvar, funciona tipo id
		$Cadastro->emailCadastro = $request->txEmail;
        $Cadastro->senhaCadastro = $request->txSenha;
        $Cadastro->save();

		return redirect()->action('App\Http\Controllers\CadastroController@exibirCadastro');
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
        //
    }
}
