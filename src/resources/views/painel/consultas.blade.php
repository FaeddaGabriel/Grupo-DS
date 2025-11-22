<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Consultas</title>
        <link
            rel="stylesheet"
            href="{{ asset("css/painel/painel-consultas.css") }}"
        />
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap"
            rel="stylesheet"
        />
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>

    <body>
        @include("painel.componentes.menu")

        <div id="consultas-root">
            <div class="main-content">
                <div class="header">
                    <h1>Sistema de Consultas</h1>
                    <p>Visualize os dados de usuários e contatos</p>
                </div>

                <div class="toggle-buttons">
                    <button id="btnUsuarios" class="active">Usuários</button>
                    <button id="btnContatos">Contatos</button>
                </div>

                <main>
                    <section id="usuarios" class="consulta">
                        <h2>Consulta de Usuários</h2>

                        <div class="download-buttons">
                            <a
                                href="/user-pdf"
                                class="btn-download"
                                title="Baixar PDF"
                            >
                                <img
                                    src="{{ asset("images/pdf.png") }}"
                                    alt="Logo"
                                    width="200"
                                />
                            </a>
                            <a
                                href="/user-csv"
                                class="btn-download"
                                title="Baixar CSV"
                            >
                                <img
                                    src="{{ asset("images/exel.png") }}"
                                    alt="Logo"
                                    width="200"
                                />
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Sexo</th>
                                        <th>Nível Acesso</th>
                                        <th>Criado em</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td>{{ $usuario->id }}</td>
                                            <td>{{ $usuario->name }}</td>
                                            <td>{{ $usuario->email }}</td>
                                            <td>
                                                {{ $usuario->sexo }}
                                            </td>
                                            <td>
                                                @if ($usuario->nivel_acesso == 0)
                                                    Administrador
                                                @else
                                                        Usuário Comum
                                                @endif
                                            </td>
                                            <td>
                                                {{ date("d/m/Y H:i", strtotime($usuario->created_at)) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>

                    <section id="contatos" class="consulta hidden">
                        <h2>Consulta de Contatos</h2>

                        <div class="download-buttons">
                            <a
                                href="/user-pdf"
                                class="btn-download"
                                title="Baixar PDF"
                            >
                                <img
                                    src="{{ asset("images/pdf.png") }}"
                                    alt="PDF"
                                />
                            </a>
                            <a
                                href="/user-csv"
                                class="btn-download"
                                title="Baixar CSV"
                            >
                                <img
                                    src="{{ asset("images/exel.png") }}"
                                    alt="Logo"
                                    width="200"
                                />
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Mensagem</th>
                                        <th>Data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contatos as $contato)
                                        <tr>
                                            <td>{{ $contato->idContato }}</td>
                                            <td>
                                                {{ $contato->nomeContato }}
                                            </td>
                                            <td>
                                                {{ $contato->emailContato }}
                                            </td>
                                            <td>
                                                {{ $contato->mensagemContato }}
                                            </td>
                                            <td>
                                                {{ date("d/m/Y H:i", strtotime($contato->created_at)) }}
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

        <script>
            const btnUsuarios = document.getElementById('btnUsuarios');
            const btnContatos = document.getElementById('btnContatos');
            const secUsuarios = document.getElementById('usuarios');
            const secContatos = document.getElementById('contatos');

            btnUsuarios.addEventListener('click', () => {
                secUsuarios.classList.remove('hidden');
                secContatos.classList.add('hidden');
                btnUsuarios.classList.add('active');
                btnContatos.classList.remove('active');
            });

            btnContatos.addEventListener('click', () => {
                secUsuarios.classList.add('hidden');
                secContatos.classList.remove('hidden');
                btnContatos.classList.add('active');
                btnUsuarios.classList.remove('active');
            });
        </script>
    </body>
</html>
