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
  <div class="page">
    <form action="/" method="POST" class="formLogin" onsubmit="return checkAdmin(event)">
      @csrf
      <h1>Login</h1>
      <p>Digite os seus dados de acesso no campo abaixo.</p>

      <label for="txEmail">E-mail</label>
      <input type="email" id="txEmail" name="txEmail" placeholder="Digite seu e-mail" autofocus required>

      <label for="txSenha">Senha</label>
      <input type="password" id="txSenha" name="txSenha" placeholder="Digite sua senha" required autocomplete="off">

      <input type="submit" value="Acessar" class="btn">
    </form>
  </div>

  <script>
    function checkAdmin(event) {
      // Captura os valores dos inputs
      const email = document.getElementById('txEmail').value;
      const senha = document.getElementById('txSenha').value;

      // Verifica se é o email e senha do administrador
      if(email === 'admin@gmail.com' && senha === 'admin123') {
        event.preventDefault(); // Impede o envio do formulário
        window.location.href = "/Consultas"; // Redireciona para a página de consultas com "C" maiúsculo
        return false;
      }
      
      // Para demais usuários, deixa o formulário seguir seu comportamento normal
      return true;
    }
  </script>
</body>
</html>