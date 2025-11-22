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
    // PDF Usuarios
    public function userPdf()
    {
        $user = User::all();

        $dados = compact("user");

        $pdf = PDF::loadView("relatorios.user_pdf", $dados);

        return $pdf->download("user_pdf.pdf"); // Faz o download do PDF

        // return $pdf->stream('documento.pdf'); // Exibe o PDF no navegador
    }
    // PDF Contato
    public function contatoPdf()
    {
        $Contato = ContatoModel::all();

        $dados = compact("Contato");

        $pdf = PDF::loadView("relatorios.Contato_pdf", $dados);

        return $pdf->download("Contato_pdf.pdf"); // Faz o download do PDF

        // return $pdf->stream('documento.pdf'); // Exibe o PDF no navegador
    }
    /// CSV Usuarios
    public function userCsv()
    {
        $sql = "select * from users";

        $queryJson = DB::select($sql);

        // Nome do arquivo CSV
        $filename = "user_csv.csv";

        // Cabeçalho do arquivo

        $headers = [
            "Content-Type" => "text/csv;charset=utf-8",
            "Content-Disposition" => 'attachment; filename="' . $filename . '"',
        ];

        //Cabeçalho

        $file = fopen("php://output", "w");

        fclose($file);

        // Gera o arquivo CSV
        $callback = function () use ($queryJson) {
            $file = fopen("php://output", "w");

            //Cabeçalho
            $col1 = "ID";
            $col2 = "Nome";
            $col3 = mb_convert_encoding("Email", "ISO-8859-1");
            $col4 = "Sexo";
            $col5 = mb_convert_encoding("Nível Acesso", "ISO-8859-1");
            $col6 = mb_convert_encoding("Criado em", "ISO-8859-1");

            $escreve = fwrite($file, "$col1;$col2;$col3;$col4;$col5;$col6;");

            foreach ($queryJson as $d) {
                $data1 = $d->id;
                $data2 = mb_convert_encoding($d->name, "ISO-8859-1");
                $data3 = $d->email;
                $data4 = mb_convert_encoding($d->sexo ?: "N/I", "ISO-8859-1");
                $data5 = mb_convert_encoding(
                    $d->nivel_acesso == 0 ? "Administrador" : "Usuário Comum",
                    "ISO-8859-1",
                );
                $data6 = mb_convert_encoding(
                    date("d/m/Y H:i", strtotime($d->created_at)),
                    "ISO-8859-1",
                );
                $escreve = fwrite(
                    $file,
                    "\n$data1;$data2;$data3;$data4;$data5;$data6;",
                );
            }
            fclose($file);
        };

        // Retorna o arquivo CSV para download
        return Response::stream($callback, 200, $headers);
    }
    // CSV Contato
    public function contatoCsv()
    {
        $sql = "select * from tbcontato";

        $queryJson = DB::select($sql);

        // Nome do arquivo CSV
        $filename = "contato_csv.csv";

        // Cabeçalho do arquivo

        $headers = [
            "Content-Type" => "text/csv;charset=utf-8",
            "Content-Disposition" => 'attachment; filename="' . $filename . '"',
        ];

        //Cabeçalho

        $file = fopen("php://output", "w");

        fclose($file);

        // Gera o arquivo CSV
        $callback = function () use ($queryJson) {
            $file = fopen("php://output", "w");

            //Cabeçalho
            $col1 = "ID";
            $col2 = "Nome";
            $col3 = mb_convert_encoding("Email", "ISO-8859-1");
            $col4 = mb_convert_encoding("Mensagem", "ISO-8859-1");
            $col5 = mb_convert_encoding("Data", "ISO-8859-1");

            $escreve = fwrite($file, "$col1;$col2;$col3;$col4;$col5;");

            foreach ($queryJson as $d) {
                $data1 = $d->idContato;
                $data2 = mb_convert_encoding($d->nomeContato, "ISO-8859-1");
                $data3 = $d->emailContato;
                $data4 = mb_convert_encoding($d->mensagemContato, "ISO-8859-1");
                $data5 = mb_convert_encoding(
                    date("d/m/Y H:i", strtotime($d->created_at)),
                    "ISO-8859-1",
                );
                $escreve = fwrite(
                    $file,
                    "\n$data1;$data2;$data3;$data4;$data5;",
                );
            }
            fclose($file);
        };

        // Retorna o arquivo CSV para download
        return Response::stream($callback, 200, $headers);
    }
}
