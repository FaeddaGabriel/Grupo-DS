<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consultas</title>
  <link rel="stylesheet" href="{{ asset('css/consulta.css') }}">
</head>
<body>
  <header class="header">
    <h1>Sistema de Consultas</h1>
  </header>

  <main class="container">
    <!-- Consulta de Usuários -->
    <section class="consulta">
      <h2>Consulta de Usuários</h2>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Email</th>
              <th>Senha</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
              <td>{{ $usuario->id }}</td>
              <td>{{ $usuario->name }}</td>
              <td>{{ $usuario->email }}</td>
              <td>{{ $usuario->password }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </section>

    <!-- Consulta de Contatos -->
    <section class="consulta">
      <h2>Consulta de Contatos</h2>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Email</th>
              <th>Mensagem</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($contatos as $contato)
            <tr>
              <td>{{ $contato->idContato }}</td>
              <td>{{ $contato->nomeContato }}</td>
              <td>{{ $contato->emailContato }}</td>
              <td>{{ $contato->mensagemContato }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </section>

    <div class="back-link">
      <a href="{{ url('/') }}">Voltar</a>
    </div>
  </main>

  <footer class="footer">
    <p>&copy; {{ date('Y') }} - Sistema de Consultas</p>
  </footer>
</body>
</html>