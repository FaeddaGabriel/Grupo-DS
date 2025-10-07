<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Painel Administrativo</title>
    
    <!-- ✅ CSS da Navbar -->
    <link rel="stylesheet" href="{{ asset('css/ADMnavbar.css') }}">

    <!-- CSS da Página -->
    <link rel="stylesheet" href="{{ asset('css/Dashboard.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    @include('ADMnavbar')
<div class="container">

    <h2>📊 Dashboard - Painel Administrativo</h2>

    <!-- Cards resumo -->
    <div class="dashboard-cards">
        <div class="card">
            <h4>Usuários</h4>
            <p>{{ $totalUsuarios }}</p>
        </div>
        <div class="card">
            <h4>Contatos</h4>
            <p>{{ $totalContatos }}</p>
        </div>
    </div>

    <hr>

    <!-- Gráficos -->
    <div class="dashboard-charts">
        <div>
            <h3>Gráfico de Usuários Recentes</h3>
            <canvas id="usuariosChart" height="150"></canvas>
        </div>
        <div>
            <h3>Gráfico de Contatos Recentes</h3>
            <canvas id="contatosChart" height="150"></canvas>
        </div>
    </div>

    <hr>

    <!-- Listas -->
    <div class="dashboard-lists">
        <div>
            <h3>Últimos Usuários</h3>
            <ul>
                @forelse($listaUsuarios as $u)
                    <li>{{ $u->nome }} ({{ $u->email }}) - {{ $u->tipo }}</li>
                @empty
                    <li>Nenhum usuário recente encontrado.</li>
                @endforelse
            </ul>
        </div>

        <div>
            <h3>Últimos Contatos Recebidos</h3>
            <ul>
                @forelse($listaContatos as $c)
                    <li>
                        <strong>{{ $c->nome ?? 'Sem nome' }}</strong> - ({{ $c->email ?? 'Sem email' }})
                        <span>{{ $c->mensagem ?? 'Sem mensagem' }}</span>
                    </li>
                @empty
                    <li>Nenhum contato recente encontrado.</li>
                @endforelse
            </ul>
        </div>
    </div>

</div>

<!-- Script dos gráficos -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const usuariosCtx = document.getElementById('usuariosChart').getContext('2d');
        const contatosCtx = document.getElementById('contatosChart').getContext('2d');

        new Chart(usuariosCtx, {
            type: 'bar',
            data: {
                labels: @json($labelsGraficoUsuarios),
                datasets: [{
                    label: 'Usuários',
                    data: @json($dadosGraficoUsuarios),
                    backgroundColor: '#3ca7ff',
                    borderColor: '#0077FF',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true } }
            }
        });

        new Chart(contatosCtx, {
            type: 'bar',
            data: {
                labels: @json($labelsGraficoContatos),
                datasets: [{
                    label: 'Contatos',
                    data: @json($dadosGraficoContatos),
                    backgroundColor: '#3ca7ff',
                    borderColor: '#0077FF',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true } }
            }
        });
    });
</script>

</body>
</html>
