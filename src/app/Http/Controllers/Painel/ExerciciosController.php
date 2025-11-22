<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ExerciciosController extends Controller
{
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
            "painel.exercicio",
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
}
