<?php

namespace App\Http\Controllers;

use App\Models\ContatoModel;
use Illuminate\Http\Request;

//Pra o login utilizar:
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Hash;


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
        $usuarios = User::all();
        return view('Cadastro', compact('usuarios')); //retorna pra view e em cima pega todos os registros do banco
    }
    
    public function exibirConsultas() 
    { 
        $usuarios = User::all();
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


    public function fazerLogin(Request $request){
    // tenta autenticar com email e senha
    if (!Auth::attempt($request->only(['email', 'password']))) {                               
        return redirect('/Login')
            ->withErrors(['login' => 'Credenciais inválidas.'])
            ->withInput();
    }

    // autenticação bem-sucedida
    $request->session()->regenerate(); // importante pra segurança
    $user = Auth::user();

    // redireciona conforme nivel_acesso, com mensagem de sucesso
    if ($user->nivel_acesso == 0) {
        return redirect()->route('consultas')
                         ->with('success', 'Login realizado com sucesso!'); // admin
    } else {
        return redirect()->route('home')
                         ->with('success', 'Login realizado com sucesso!');  // usuário comum
    }
}


    public function fazerLogOut(Request $request){
    Auth::logout();
    return redirect('/')->with('success', 'Logout realizado com sucesso!');
}

    public function store(Request $request)
    {
        $usuario = new User(); //usuario é um objeto (da pra por qualquer nome)
        
        $usuario->name = $request->txNome; //"NomeUsuario" é a coluna da tabela agora o "$Usuario" é o objeto, txNome é o mesmo que vai estar na view pra salvar, funciona tipo id
        $usuario->email = $request->txEmail;
        $usuario->password = Hash::make($request->txSenha);  
        $usuario->nivel_acesso = 1; // 0 = admin | 1 = usuário comum      
        $usuario->save();
        
        //Loga o usuário automaticamente após o cadastro
        //Auth::login($usuario);

        return redirect('/Login');  
  }
  
public function fotoPerfil(Request $request)
{
    $user = $request->user() ?? auth()->user();

    $image = $request->file('foto');

    if ($image) {
        $path = $image->store('imagesPicture', 'public');
        $user->foto_perfil = $path;
        $user->save();

        // Mensagem de sucesso
        return redirect()->route('perfil')->with('success', 'Modificações salvas com sucesso!');
    }

    // Caso nenhuma imagem tenha sido enviada
    return redirect()->route('perfil')->with('success', 'Nenhuma imagem foi enviada.');
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