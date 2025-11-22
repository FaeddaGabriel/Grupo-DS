<?php

namespace App\Http\Controllers;

use App\Models\ContatoModel;
use Illuminate\Http\Request;

class ContatoController extends Controller
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
    public function exibirContato()
    {
        $Contato = ContatoModel::all();
        return view("paginas.contato", compact("Contato"));
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
        $Contato = new ContatoModel(); //Contato é um objeto (da pra por qualquer nome)

        $Contato->nomeContato = $request->txContNome; //"nomeContato" é a coluna da tabela agora o "$Contato" é o objeto, txContNome é o mesmo que vai estar na view pra salvar, funciona tipo id
        $Contato->emailContato = $request->txContEmail;
        $Contato->mensagemContato = $request->txContMsg;
        $Contato->save();

        return redirect()
            ->action([ContatoController::class, "exibirContato"])
            ->with("success", "Mensagem enviada com sucesso!");
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
