<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ContatoModel;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
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
            "painel.dashboard",
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
}
