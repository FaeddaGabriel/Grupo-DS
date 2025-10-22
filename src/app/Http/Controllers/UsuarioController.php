<?php

namespace App\Http\Controllers;

use App\Models\ContatoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// Pra o login utilizar:
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index() {}

    public function exibirCadastro()
    {
        $usuarios = User::all();
        return view("Cadastro", compact("usuarios"));
    }

    public function exibirConsultas()
    {
        $usuarios = User::all();
        $contatos = ContatoModel::all();
        return view("Consultas", compact("usuarios", "contatos"));
    }

    // Login
    public function fazerLogin(Request $request)
    {
        $credentials = $request->only("email", "password");

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->nivel_acesso == 0) {
                return redirect()
                    ->route("dashboard")
                    ->with("success", "Login realizado com sucesso!");
            } else {
                return redirect("/")->with(
                    "success",
                    "Login realizado com sucesso!",
                );
            }
        }

        return redirect("/Login")
            ->withErrors(["login" => "Credenciais inválidas."])
            ->withInput();
    }

    // Logout
    public function fazerLogOut(Request $request)
    {
        Auth::logout();
        return redirect("/")->with("success", "Logout realizado com sucesso!");
    }

    // Cadastro de usuário
    public function store(Request $request)
    {
        $request->validate([
            "txNome" => "required|string|max:255",
            "txEmail" => "required|string|email|max:255|unique:users,email",
            "txSenha" => "required|string|min:3",
            "txSexo" => "required|string",
        ]);

        User::create([
            "name" => $request->txNome,
            "email" => $request->txEmail,
            "sexo" => $request->txSexo,
            "password" => Hash::make($request->txSenha),
            "nivel_acesso" => 1, // 0 = admin | 1 = usuário comum
        ]);

        return redirect()
            ->route("login")
            ->with("success", "Cadastro realizado com sucesso! Faça login.");
    }

    // Foto de perfil
    public function fotoPerfil(Request $request)
    {
        $user = $request->user() ?? auth()->user();

        $request->validate([
            "foto" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        $image = $request->file("foto");

        if ($image) {
            $path = $image->store("imagesPicture", "public");
            $user->foto_perfil = $path;
            $user->save();

            return redirect()
                ->route("perfil")
                ->with("success", "Modificações salvas com sucesso!");
        }

        return redirect()
            ->route("perfil")
            ->with("error", "Nenhuma imagem foi enviada.");
    }

    // Dashboard
    public function dashboard()
    {
        $totalUsuarios = User::count();
        $usuariosEsteMes = User::whereMonth("created_at", date("m"))
            ->whereYear("created_at", date("Y"))
            ->count();

        $usuariosPorMes = DB::select("
            SELECT 
                DATE_FORMAT(created_at, '%Y-%m') as mes,
                COUNT(*) as total
            FROM users
            WHERE created_at >= DATE_SUB(NOW(), INTERVAL 12 MONTH)
            GROUP BY DATE_FORMAT(created_at, '%Y-%m')
            ORDER BY mes ASC
        ");

        $contatosPorMes = DB::select("
            SELECT 
                DATE_FORMAT(created_at, '%Y-%m') as mes,
                COUNT(*) as total
            FROM tbcontato
            WHERE created_at >= DATE_SUB(NOW(), INTERVAL 12 MONTH)
            GROUP BY DATE_FORMAT(created_at, '%Y-%m')
            ORDER BY mes ASC
        ");

        $mesesLabels = [];
        $mesesDados = [];
        foreach ($usuariosPorMes as $item) {
            $mesesLabels[] = $item->mes;
            $mesesDados[] = $item->total;
        }

        $contatosLabels = [];
        $contatosDados = [];
        foreach ($contatosPorMes as $item) {
            $contatosLabels[] = $item->mes;
            $contatosDados[] = $item->total;
        }

        $totalComContato = DB::table("users")
            ->whereIn("id", function ($query) {
                $query
                    ->select("user_id")
                    ->from("tbcontato")
                    ->whereNotNull("user_id");
            })
            ->count();

        $totalSemContato = DB::table("users")
            ->whereNotIn("id", function ($query) {
                $query
                    ->select("user_id")
                    ->from("tbcontato")
                    ->whereNotNull("user_id");
            })
            ->count();

        $usuariosContatoLabels = ["Com contato", "Sem contato"];
        $usuariosContatoDados = [$totalComContato, $totalSemContato];

        $sexoData = DB::select("
            SELECT 
                CASE 
                    WHEN sexo IS NULL OR sexo = '' THEN 'Não Informado' 
                    ELSE sexo 
                END as sexo_label,
                COUNT(*) as total
            FROM users
            GROUP BY sexo_label
        ");

        $sexoLabels = [];
        $sexoDados = [];
        $colors = [
            "Masculino" => "#4299e1",
            "Feminino" => "#f56565",
            "Não Informado" => "#a0aec0",
        ];

        foreach ($sexoData as $item) {
            $sexoLabels[] = $item->sexo_label;
            $sexoDados[] = [
                "value" => $item->total,
                "name" => $item->sexo_label,
                "itemStyle" => [
                    "color" => $colors[$item->sexo_label] ?? "#ccc",
                ],
            ];
        }

        return view(
            "Dashboard",
            compact(
                "totalUsuarios",
                "usuariosEsteMes",
                "mesesLabels",
                "mesesDados",
                "contatosLabels",
                "contatosDados",
                "usuariosContatoLabels",
                "usuariosContatoDados",
                "sexoLabels",
                "sexoDados",
            ),
        );
    }

    // Exercício do PDF
    public function exercicio()
    {
        $usuariosPorNivel = DB::table("users")
            ->select(
                DB::raw(
                    "CASE WHEN nivel_acesso = 0 THEN 'Administrador' ELSE 'Usuário Comum' END as tipo_usuario",
                ),
                DB::raw("COUNT(*) as total"),
            )
            ->groupBy("tipo_usuario", "nivel_acesso")
            ->orderBy("nivel_acesso")
            ->get();

        $usuariosPorMesRecente = DB::table("users")
            ->select(
                DB::raw("DATE_FORMAT(created_at, '%Y-%m') as mes"),
                DB::raw("DATE_FORMAT(created_at, '%M/%Y') as mes_nome"),
                DB::raw("COUNT(*) as total"),
            )
            ->where("created_at", ">=", now()->subMonths(6))
            ->groupBy("mes", "mes_nome")
            ->orderBy("mes", "ASC")
            ->get();

        $contatosPorTamanho = DB::table("tbcontato")
            ->select(
                DB::raw("CASE 
                    WHEN LENGTH(mensagemContato) < 50 THEN 'Curta (< 50 caracteres)'
                    WHEN LENGTH(mensagemContato) >= 50 AND LENGTH(mensagemContato) < 100 THEN 'Média (50-100 caracteres)'
                    WHEN LENGTH(mensagemContato) >= 100 AND LENGTH(mensagemContato) < 200 THEN 'Longa (100-200 caracteres)'
                    ELSE 'Muito Longa (> 200 caracteres)'
                END as tamanho"),
                DB::raw("COUNT(*) as total"),
            )
            ->groupBy("tamanho")
            ->orderBy(
                DB::raw("
                CASE
                    WHEN tamanho = 'Curta (< 50 caracteres)' THEN 1
                    WHEN tamanho = 'Média (50-100 caracteres)' THEN 2
                    WHEN tamanho = 'Longa (100-200 caracteres)' THEN 3
                    ELSE 4
                END
            "),
                "ASC",
            )
            ->get();

        $usuariosPorDiaSemana = DB::table("users")
            ->select(
                DB::raw("CASE DAYOFWEEK(created_at)
                    WHEN 1 THEN 'Domingo'
                    WHEN 2 THEN 'Segunda-feira'
                    WHEN 3 THEN 'Terça-feira'
                    WHEN 4 THEN 'Quarta-feira'
                    WHEN 5 THEN 'Quinta-feira'
                    WHEN 6 THEN 'Sexta-feira'
                    WHEN 7 THEN 'Sábado'
                END as dia_semana"),
                DB::raw("COUNT(*) as total"),
            )
            ->groupBy("dia_semana", DB::raw("DAYOFWEEK(created_at)"))
            ->orderBy(DB::raw("DAYOFWEEK(created_at)"), "ASC")
            ->get();

        $grafico1Labels = $usuariosPorNivel->pluck("tipo_usuario");
        $grafico1Dados = $usuariosPorNivel->pluck("total");
        $grafico2Labels = $usuariosPorMesRecente->pluck("mes_nome");
        $grafico2Dados = $usuariosPorMesRecente->pluck("total");

        return view(
            "exercicio",
            compact(
                "usuariosPorNivel",
                "usuariosPorMesRecente",
                "contatosPorTamanho",
                "usuariosPorDiaSemana",
                "grafico1Labels",
                "grafico1Dados",
                "grafico2Labels",
                "grafico2Dados",
            ),
        );
    }

    public function show($id) {}
    public function edit($id) {}
    public function update(Request $request, $id) {}
    public function destroy($id) {}
}
