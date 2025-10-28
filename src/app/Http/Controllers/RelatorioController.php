<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use App\Models\ContatoModel;

class RelatorioController extends Controller
{
    public function userPdf()
    {
        $user = User::all();

        $dados = compact("user");

        $pdf = PDF::loadView("user_pdf", $dados);

        return $pdf->download("documento.pdf"); // Faz o download do PDF

        // return $pdf->stream('documento.pdf'); // Exibe o PDF no navegador
    }
}
