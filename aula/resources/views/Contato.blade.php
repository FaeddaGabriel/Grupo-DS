<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports King - Contato</title>
    <link rel="stylesheet" href="{{ asset('css/Contato.css') }}">
    <link rel="stylesheet" href="{{ asset('css/NavBar.css') }}"> <!--pq ta linkado css da navbar se n ta usando???-->
    
</head>

<body>


    <div class="page">
        <form class="formLogin" action="{{url('/Contato/inserir')}}" method="post">
            @csrf
            <h1>Contate-nos</h1>
            <p>Entre em contato com nossa agência</p>

            <label for="name">Nome do usuario</label>
            <input type="text" id="name" name="txContNome" placeholder="Digite seu nome de Usuario" required>
            <br>

            <label for="email">E-mail</label>
            <input type="email" id="email" name="txContEmail" placeholder="Digite seu e-mail" required>

            <label for="feedback">Fale conosco</label>
            <input type="text" id="feedback" name="txContMsg" placeholder="Escreva seu Feedback aqui" required>

            <br>

            <button class="btn" type="submit" value=Salvar>Enviar</button>
            <p><a href="{{ url('/') }}" class="btn">Voltar</a></p>
        </form>
    </div>
    
</body>
</html>
