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

        <style>
            /* Botões de alternância */
            .toggle-buttons {
                display: flex;
                gap: 10px;
                margin-bottom: 20px;
            }
 
            .toggle-buttons button {
                background-color: #007bff;
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
                font-weight: 600;
                transition: 0.3s;
            }

            .toggle-buttons button:hover {
                background-color: #0056b3;
            }

            .toggle-buttons button.active {
                background-color: #0056b3;
            }

            /* Ocultar seção */
            .hidden {
                display: none;
            }
        </style>
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
                        <a href="/user-pdf">PDF</a>
                        <a href="/user-csv">CSV</a>
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
                        <a href="/Contato-pdf">PDF</a>
                        <a href="/contato-csv">CSV</a>
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