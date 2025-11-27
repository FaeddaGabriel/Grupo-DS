<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Relatório de Usuários</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
                color: #333;
            }

            h1 {
                text-align: center;
                color: #2d3748;
                margin-bottom: 10px;
                font-size: 24px;
            }

            .subtitle {
                text-align: center;
                color: #718096;
                font-size: 14px;
                margin-bottom: 30px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            thead {
                background-color: #2d3748;
                color: white;
            }

            thead th {
                padding: 12px;
                text-align: left;
                font-weight: 600;
                font-size: 12px;
                text-transform: uppercase;
            }

            tbody tr {
                border-bottom: 1px solid #e2e8f0;
            }

            tbody tr:nth-child(even) {
                background-color: #f7fafc;
            }

            tbody td {
                padding: 10px 12px;
                font-size: 11px;
                color: #2d3748;
            }

            .footer {
                margin-top: 30px;
                text-align: center;
                font-size: 10px;
                color: #718096;
            }
        </style>
    </head>
    <body>
        <h1>Relatório de Usuários</h1>
        <p class="subtitle">
            Sistema SportsKing - Gerado em
            {{ date("d/m/Y H:i") }}
        </p>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Sexo</th>
                    <th>Nível de Acesso</th>
                    <th>Data de Cadastro</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $u)
                    <tr>
                        <td>{{ $u->id }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->sexo }}</td>
                        <td>
                            {{ $u->nivel_acesso == 0 ? "Administrador" : "Usuário Comum" }}
                        </td>
                        <td>
                            {{ date("d/m/Y H:i", strtotime($u->created_at)) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer">
            <p>SportsKing © {{ date("Y") }} - Todos os direitos reservados</p>
        </div>
    </body>
</html>
