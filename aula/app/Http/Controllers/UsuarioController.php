<?php

namespace App\Http\Controllers;

use App\Models\ContatoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return redirect()->route('dashboard')
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
  
      // Validação para garantir que o arquivo é uma imagem válida
      $request->validate([
          'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // max 2MB
      ]);
  
      $image = $request->file('foto');
  
      if ($image) {
          $path = $image->store('imagesPicture', 'public');
          $user->foto_perfil = $path;
          $user->save();
  
          return redirect()->route('perfil')->with('success', 'Modificações salvas com sucesso!');
      }
  
      return redirect()->route('perfil')->with('error', 'Nenhuma imagem foi enviada.');
  }

        public function dashboard()
    {
        // Pega o total de usuários e contatos pra mostrar nos cards.
        $totalUsuarios = User::count();
        $totalContatos = ContatoModel::count();

        // Busca os 5 usuários mais recentes que se cadastraram.
        $usuariosRecentes = User::select('id', 'name', 'email', 'nivel_acesso', 'created_at')
            ->latest()
            ->take(5)
            ->get();

        // Pega as 5 últimas mensagens de contato que chegaram.
        $contatosRecentes = ContatoModel::select('nomeContato as nome', 'emailContato as email', 'mensagemContato as mensagem', 'created_at')
            ->latest()
            ->take(5)
            ->get();
        
        // Agora deixa preparado tudo que a galera do front vai precisar.

        // Deixa a lista de usuários prontinha, já tratando o "Admin/Usuário".
        $listaUsuarios = $usuariosRecentes->map(function ($usuario) {
            return (object) [
                'nome' => $usuario->name,
                'email' => $usuario->email,
                'tipo' => $usuario->nivel_acesso == 0 ? 'Admin' : 'Usuário',
            ];
        });

        // Prepara a lista de contatos, já cortando a mensagem pra não ficar gigante.
        $listaContatos = $contatosRecentes->map(function ($contato) {
            return (object) [
                'nome' => $contato->nome,
                'email' => $contato->email,
                'mensagem' => \Illuminate\Support\Str::limit($contato->mensagem, 100),
            ];
        });

        // Monta os dados pro gráfico de usuários.
        $labelsGraficoUsuarios = $usuariosRecentes->pluck('name');
        $dadosGraficoUsuarios = $usuariosRecentes->pluck('id');

        // Monta os dados pro gráfico de contatos.
        $labelsGraficoContatos = $contatosRecentes->pluck('nome');
        $dadosGraficoContatos = $contatosRecentes->map(fn($item, $key) => 5 - $key);

        // Manda tudo pra view. ksksk se lasca ai povo do front
        return view('Dashboard', compact(
            'totalUsuarios',
            'totalContatos',
            'listaUsuarios',
            'listaContatos',
            'labelsGraficoUsuarios',
            'dadosGraficoUsuarios',
            'labelsGraficoContatos',
            'dadosGraficoContatos'
        ));
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