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

                <!-- Botões para alternar -->
                <div class="toggle-buttons">
                    <button id="btnUsuarios" class="active">Usuários</button>
                    <button id="btnContatos">Contatos</button>
                </div>

                <main>
                    <!-- Consulta de Usuários -->
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
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                </main>
            </div>
        </div>

        <!-- Script para alternar seções -->
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
