<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/Form.css">
</head>
<body>
<a href="{{ route('home') }}" class="logo-link">
    <img src="{{ asset('images/King1.png') }}" alt="Logo" class="logo-img">
</a>

  <div class="page">
    <form action="{{ route('login.process') }}" method="POST" class="formLogin">
      @csrf
      <h1>Login</h1>
        <p>Digite os seus dados de acesso no campo abaixo.</p>

       @if ($errors->any())
        <div class="error-message">
         @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
         @endforeach
        </div>
      @endif

  <label for="txEmail">E-mail</label>
  <input type="email" id="email" name="email" 
         placeholder="Digite seu e-mail" 
         value="{{ old('email') }}" 
         autofocus required>

  <label for="txSenha">Senha</label>
  <input type="password" id="password" name="password" 
         placeholder="Digite sua senha" 
         required autocomplete="off">

  <input type="submit" value="Acessar" class="btn">
</form>
    <p><a href="/Cadastro">Não possui Conta? Cadastre-se aqui! </a></p>
  </div>

</body>
</html>