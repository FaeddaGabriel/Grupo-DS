<div class="container">

    <h2>📊 Dashboard - Painel Administrativo</h2>

    {{-- Cards resumo --}}
    <div class="dashboard-cards" style="display: flex; gap: 1rem; flex-wrap: wrap; margin-bottom: 2rem;">
        <div class="card" style="flex: 1; padding: 1rem; border: 1px solid #ddd; border-radius: 8px; text-align: center;">
            <h4>Usuários</h4>
            <p style="font-size: 1.5rem; font-weight: bold;">{{ $totalUsuarios }}</p>
        </div>

        <div class="card" style="flex: 1; padding: 1rem; border: 1px solid #ddd; border-radius: 8px; text-align: center;">
            <h4>Contatos</h4>
            <p style="font-size: 1.5rem; font-weight: bold;">{{ $totalContatos }}</p>
        </div>
    </div>

    <hr>

    {{-- Seção de Gráficos --}}
    <div class="dashboard-charts" style="display: flex; gap: 2rem; flex-wrap: wrap; margin-top: 2rem;">

        {{-- Gráfico de Usuários --}}
        <div style="flex: 1; min-width: 300px;">
            <h3>Gráfico de Usuários Recentes</h3>
            <canvas id="usuariosChart" height="150"></canvas>
        </div>

        {{-- Gráfico de Contatos --}}
        <div style="flex: 1; min-width: 300px;">
            <h3>Gráfico de Contatos Recentes</h3>
            <canvas id="contatosChart" height="150"></canvas>
        </div>

    </div>

    <hr>

    {{-- Seção de Listas --}}
    <div class="dashboard-lists" style="display: flex; gap: 2rem; flex-wrap: wrap; margin-top: 2rem;">

        {{-- Últimos usuários --}}
        <div style="flex: 1; min-width: 300px;">
            <h3>Últimos Usuários</h3>
            <ul>
                {{-- CORREÇÃO: Trocado '$usuariosRecentes' por '$listaUsuarios' --}}
                @forelse($listaUsuarios as $u)
                    {{-- CORREÇÃO: Usando as propriedades do objeto preparado no backend --}}
                    <li>{{ $u->nome }} ({{ $u->email }}) - {{ $u->tipo }}</li>
                @empty
                    <li>Nenhum usuário recente encontrado.</li>
                @endforelse
            </ul>
        </div>

        {{-- Últimos contatos --}}
        <div style="flex: 1; min-width: 300px;">
            <h3>Últimos Contatos Recebidos</h3>
            <ul>
                {{-- CORREÇÃO: Trocado '$contatosRecentes' por '$listaContatos' --}}
                @forelse($listaContatos as $c)
                    <li>
                        <strong>{{ $c->nome ?? 'Sem nome' }}</strong> - ({{ $c->email ?? 'Sem email' }})
                        <span style="display: block; margin-top: 4px; color: #555;">
                            {{-- CORREÇÃO: A mensagem já vem limitada do backend --}}
                            {{ $c->mensagem ?? 'Sem mensagem' }}
                        </span>
                    </li>
                @empty
                    <li>Nenhum contato recente encontrado.</li>
                @endforelse
            </ul>
        </div>
    </div>

</div>

{{-- Scripts para os gráficos --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Gráfico de Usuários (já estava certo )
    const ctxUsuarios = document.getElementById('usuariosChart').getContext('2d');
    new Chart(ctxUsuarios, {
        type: 'bar',
        data: {
            labels: @json($labelsGraficoUsuarios),
            datasets: [{
                label: 'ID do Usuário',
                data: @json($dadosGraficoUsuarios),
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });

    // Gráfico de Contatos (já estava certo)
    const ctxContatos = document.getElementById('contatosChart').getContext('2d');
    new Chart(ctxContatos, {
        type: 'bar',
        data: {
            labels: @json($labelsGraficoContatos),
            datasets: [{
                label: 'Ordem de Chegada',
                data: @json($dadosGraficoContatos),
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });
</script>
@endpush
