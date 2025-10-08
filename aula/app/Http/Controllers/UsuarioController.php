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
        // Contadores totais para os cards
        $totalUsuarios = User::count();
        $totalContatos = ContatoModel::count();
        
        // Contagem de usuários com ocorrência (exemplo: usuários com nível 0)
        $usuariosComOcorrencia = User::where('nivel_acesso', 0)->count();
        
        // Contagem de usuários sem ocorrência (exemplo: usuários com nível 1)
        $usuariosSemOcorrencia = User::where('nivel_acesso', 1)->count();
        
        // Contagem de usuários cadastrados este mês
        $usuariosEsteMes = User::whereMonth('created_at', date('m'))
                               ->whereYear('created_at', date('Y'))
                               ->count();

        // Buscar usuários agrupados por mês de criação (últimos 12 meses)
        $usuariosPorMes = DB::select("
            SELECT 
                DATE_FORMAT(created_at, '%Y-%m') as mes,
                COUNT(*) as total
            FROM users
            WHERE created_at >= DATE_SUB(NOW(), INTERVAL 12 MONTH)
            GROUP BY DATE_FORMAT(created_at, '%Y-%m')
            ORDER BY mes ASC
        ");

        // Buscar contatos agrupados por assunto (mensagem)
        // Como não há campo 'subject', vamos agrupar por comprimento da mensagem como exemplo
        $contatosPorAssunto = DB::select("
            SELECT 
                CASE 
                    WHEN LENGTH(mensagemContato) < 50 THEN 'Curta'
                    WHEN LENGTH(mensagemContato) < 100 THEN 'Média'
                    ELSE 'Longa'
                END as assunto,
                COUNT(*) as total
            FROM tbcontato
            GROUP BY assunto
        ");

        // Preparar dados para os gráficos
        $mesesLabels = [];
        $mesesDados = [];
        foreach ($usuariosPorMes as $item) {
            $mesesLabels[] = $item->mes;
            $mesesDados[] = $item->total;
        }

        $assuntosLabels = [];
        $assuntosDados = [];
        foreach ($contatosPorAssunto as $item) {
            $assuntosLabels[] = $item->assunto;
            $assuntosDados[] = $item->total;
        }

        // Dados para gráfico de barras comparativo (exemplo: usuários por nível de acesso)
        $usuariosPorNivel = DB::select("
            SELECT 
                CASE 
                    WHEN nivel_acesso = 0 THEN 'Fizeram Ocorrência'
                    ELSE 'Não Fizeram Ocorrência'
                END as categoria,
                COUNT(*) as total
            FROM users
            GROUP BY categoria
        ");

        $nivelLabels = [];
        $nivelDados = [];
        foreach ($usuariosPorNivel as $item) {
            $nivelLabels[] = $item->categoria;
            $nivelDados[] = $item->total;
        }

        // Dados para gráfico de radar (análise multivariada - exemplo com dados fictícios)
        $radarCategorias = ['Sales', 'Administration', 'Technology', 'Customer Support', 'Development', 'Marketing'];
        $radarOrcamento = [4300, 3000, 2800, 2500, 1900, 3500];
        $radarGastoReal = [5000, 3400, 2300, 2100, 2500, 2700];

        return view('Dashboard', compact(
            'totalUsuarios',
            'totalContatos',
            'usuariosComOcorrencia',
            'usuariosSemOcorrencia',
            'usuariosEsteMes',
            'mesesLabels',
            'mesesDados',
            'assuntosLabels',
            'assuntosDados',
            'nivelLabels',
            'nivelDados',
            'radarCategorias',
            'radarOrcamento',
            'radarGastoReal'
        ));
    }





    public function analise()
    {
        // Consulta 1: Total de usuários por nível de acesso
        $usuariosPorNivel = DB::select("
            SELECT 
                CASE 
                    WHEN nivel_acesso = 0 THEN 'Administrador'
                    ELSE 'Usuário Comum'
                END as tipo_usuario,
                COUNT(*) as total
            FROM users
            GROUP BY nivel_acesso
            ORDER BY nivel_acesso
        ");

        // Consulta 2: Usuários cadastrados por mês (últimos 6 meses)
        $usuariosPorMesRecente = DB::select("
            SELECT 
                DATE_FORMAT(created_at, '%Y-%m') as mes,
                DATE_FORMAT(created_at, '%M/%Y') as mes_nome,
                COUNT(*) as total
            FROM users
            WHERE created_at >= DATE_SUB(NOW(), INTERVAL 6 MONTH)
            GROUP BY DATE_FORMAT(created_at, '%Y-%m')
            ORDER BY mes ASC
        ");

        // Consulta 3: Contatos por tamanho de mensagem
        $contatosPorTamanho = DB::select("
            SELECT 
                CASE 
                    WHEN LENGTH(mensagemContato) < 50 THEN 'Curta (< 50 caracteres)'
                    WHEN LENGTH(mensagemContato) < 100 THEN 'Média (50-100 caracteres)'
                    WHEN LENGTH(mensagemContato) < 200 THEN 'Longa (100-200 caracteres)'
                    ELSE 'Muito Longa (> 200 caracteres)'
                END as tamanho,
                COUNT(*) as total
            FROM tbcontato
            GROUP BY tamanho
            ORDER BY total DESC
        ");

        // Consulta 4: Média de usuários cadastrados por dia da semana
        $usuariosPorDiaSemana = DB::select("
            SELECT 
                CASE DAYOFWEEK(created_at)
                    WHEN 1 THEN 'Domingo'
                    WHEN 2 THEN 'Segunda-feira'
                    WHEN 3 THEN 'Terça-feira'
                    WHEN 4 THEN 'Quarta-feira'
                    WHEN 5 THEN 'Quinta-feira'
                    WHEN 6 THEN 'Sexta-feira'
                    WHEN 7 THEN 'Sábado'
                END as dia_semana,
                COUNT(*) as total
            FROM users
            GROUP BY DAYOFWEEK(created_at)
            ORDER BY DAYOFWEEK(created_at)
        ");

        // Preparar dados para os gráficos
        
        // Gráfico 1: Barras - Usuários por nível
        $grafico1Labels = [];
        $grafico1Dados = [];
        foreach ($usuariosPorNivel as $item) {
            $grafico1Labels[] = $item->tipo_usuario;
            $grafico1Dados[] = $item->total;
        }

        // Gráfico 2: Linha - Usuários por mês
        $grafico2Labels = [];
        $grafico2Dados = [];
        foreach ($usuariosPorMesRecente as $item) {
            $grafico2Labels[] = $item->mes_nome;
            $grafico2Dados[] = $item->total;
        }

        return view('analise', compact(
            'usuariosPorNivel',
            'usuariosPorMesRecente',
            'contatosPorTamanho',
            'usuariosPorDiaSemana',
            'grafico1Labels',
            'grafico1Dados',
            'grafico2Labels',
            'grafico2Dados'
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
