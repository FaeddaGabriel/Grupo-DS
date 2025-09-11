<?php

namespace App\Http\Controllers;

use App\Models\UsuarioModel;
use App\Models\ContatoModel;
use Illuminate\Http\Request;

class UsuarioController extends Controller
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
        $usuarios = UsuarioModel::all();
        return view('Cadastro', compact('usuarios')); //retorna pra view e em cima pega todos os registros do banco
    }
    public function exibirConsultas() 
    { 
        $usuarios = UsuarioModel::all();
        $contatos = ContatoModel::all();
        
        return view('Consultas', compact('usuarios', 'contatos'));
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
        $usuario = new UsuarioModel(); //usuario é um objeto (da pra por qualquer nome)
        
        $usuario->NomeUsuario = $request->txNome; //"NomeUsuario" é a coluna da tabela agora o "$Usuario" é o objeto, txNome é o mesmo que vai estar na view pra salvar, funciona tipo id
        $usuario->emailUsuario = $request->txEmail;
        $usuario->senhaUsuario = $request->txSenha;
        $usuario->save();
        
        return redirect()->action('App\Http\Controllers\UsuarioController@exibirCadastro');
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
