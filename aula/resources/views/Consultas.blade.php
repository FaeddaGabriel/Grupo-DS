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
    <section class="consulta">
      <h2>Consulta de Cadastros</h2>
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
            @foreach ($cadastros as $cadastro)
            <tr>
              <td>{{ $cadastro->idLogin }}</td>
              <td>{{ $cadastro->NomeCadastro }}</td>
              <td>{{ $cadastro->emailCadastro }}</td>
              <td>{{ $cadastro->senhaCadastro }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </section>

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
              <td>{{ $contato->nome }}</td>
              <td>{{ $contato->email }}</td>
              <td>{{ $contato->mensagem }}</td>
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