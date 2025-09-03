<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\NomeModel;

class NomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nomeUsuario = NomeModel::all();
        foreach($nomeUsuario as $n){
            echo $n->idUsuario . " ";
            echo $n->nomeUsuario . "<br /> ";
        }
    }

    public function exibirNome() 
    { 
        $nomeUsuario = NomeModel::all();
        return view('nomeView',compact('nomeUsuario')); 
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
        $nomeUsuario = new NomeModel();

		$nomeUsuario->nomeUsuario = $request->txNome; //nomeUsuario é a tabela agora o $nomeUsuario é o objeto, txNome é o mesmo que vai estar na view pra salvar
		$nomeUsuario->save();

		return redirect()->action('App\Http\Controllers\NomeController@exibirNome');
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
