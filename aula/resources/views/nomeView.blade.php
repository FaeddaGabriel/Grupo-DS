<!--Exemplo do professor, isso funciona no site ainda apenas colocar "localhost:8000/Nome-view" ou "Nome" que é a versão sem view própria dentro do controller-->

<section>
    <form action="{{url('/Nome/inserir')}}" method="post">
	    @csrf
	    <div>
		    <input type="text" placeholder="Nome" name="txNome"/>
	    </div>

	    <div>
		    <input type="submit" value="Salvar" />
	    </div>
    </form>
</section>

<section>
    <div>
        <h2> Tabela Usuario </h2>
    </div>
<table border="1"> 
    @foreach($nomeUsuario as $n) 
    <tr> 
        <td> 
            {{$n->idUsuario}} 
        </td>

        <td> 
            {{$n->nomeUsuario}} 
        </td> 
    </tr> 
    @endforeach 
</table>
</section>