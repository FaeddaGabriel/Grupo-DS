<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use App\Models\ContatoModel;

class RelatorioController extends Controller
{
    /**
     * Gerar e baixar PDF de Usuários
     */
    public function userPdf()
    {
        $users = User::all();

        // Gera o PDF com base na view
        $pdf = Pdf::loadView("relatorios.user_pdf", compact("users"))->setPaper(
            "a4",
            "portrait",
        );

        // Faz o download direto do arquivo
        return $pdf->download("usuarios.pdf");
    }

    /**
     * Gerar e baixar PDF de Contatos
     */
    public function contatoPdf()
    {
        $contatos = ContatoModel::all();

        $pdf = Pdf::loadView(
            "relatorios.contato_pdf",
            compact("contatos"),
        )->setPaper("a4", "portrait");

        return $pdf->download("contatos.pdf");
    }

    /**
     * Gerar e baixar CSV de Usuários
     */
    public function userCsv()
    {
        $usuarios = DB::table("users")->get();

        $filename = "usuarios.csv";
        $headers = [
            "Content-Type" => "text/csv; charset=utf-8",
            "Content-Disposition" => "attachment; filename=$filename",
        ];

        $callback = function () use ($usuarios) {
            $file = fopen("php://output", "w");
            fputcsv($file, ["ID", "Nome", "Email", "Sexo"], ";");

            foreach ($usuarios as $u) {
                fputcsv(
                    $file,
                    [$u->id, $u->name, $u->email, $u->sexo ?? ""],
                    ";",
                );
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    /**
     * Gerar e baixar CSV de Contatos
     */
    public function contatoCsv()
    {
        $contatos = DB::table("tbcontato")->get();

        $filename = "contatos.csv";
        $headers = [
            "Content-Type" => "text/csv; charset=utf-8",
            "Content-Disposition" => "attachment; filename=$filename",
        ];

        $callback = function () use ($contatos) {
            $file = fopen("php://output", "w");
            fputcsv($file, ["ID", "Nome", "Email", "Mensagem"], ";");

            foreach ($contatos as $c) {
                fputcsv(
                    $file,
                    [
                        $c->idContato,
                        $c->nomeContato,
                        $c->emailContato,
                        $c->mensagemContato,
                    ],
                    ";",
                );
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}
