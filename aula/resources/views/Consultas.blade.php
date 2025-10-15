<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Consultas</title>

        <!-- CSS da página -->
        <link rel="stylesheet" href="{{ asset("css/consulta.css") }}" />
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap"
            rel="stylesheet"
        />
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body>
        @include("layouts.menu")

        <div id="consultas-root">
            <div class="main-content">
                <div class="header">
                    <h1>Sistema de Consultas</h1>
                    <p>Visualize os dados de usuários e contatos</p>
                </div>

                <main>
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
                                            <td data-label="ID">
                                                {{ $usuario->id }}
                                            </td>
                                            <td data-label="Nome">
                                                {{ $usuario->name }}
                                            </td>
                                            <td data-label="Email">
                                                {{ $usuario->email }}
                                            </td>
                                            <td data-label="Senha">
                                                {{ $usuario->password }}
                                            </td>
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
                                            <td data-label="ID">
                                                {{ $contato->idContato }}
                                            </td>
                                            <td data-label="Nome">
                                                {{ $contato->nomeContato }}
                                            </td>
                                            <td data-label="Email">
                                                {{ $contato->emailContato }}
                                            </td>
                                            <td data-label="Mensagem">
                                                {{ $contato->mensagemContato }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </body>
</html>
