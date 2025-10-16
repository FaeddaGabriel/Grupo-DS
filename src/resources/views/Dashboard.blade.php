<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dashboard - Painel Administrativo</title>

        <!-- CSS da página -->
        <link rel="stylesheet" href="{{ asset("css/Dashboard.css") }}" />
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap"
            rel="stylesheet"
        />
        <script src="https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js"></script>
    </head>
    <body>
        @include("layouts.menu")

        @if (session("success"))
            <div id="alert-message" class="alert-message">
                {{ session("success") }}
            </div>

            <script>
                const alertDiv = document.getElementById('alert-message');
                setTimeout(() => {
                    alertDiv.remove();
                }, 3000);
            </script>
        @endif

        <div id="dashboard-root">
            <div class="main-content">
                <div class="header">
                    <h1>Dashboard</h1>
                    <p>Visão geral do sistema e análise de dados</p>
                </div>

                <!-- Cards de Indicadores -->
                <div class="cards-grid">
                    <div class="card">
                        <h3>Usuários</h3>
                        <div class="value">{{ $totalUsuarios }}</div>
                    </div>
                    <div class="card">
                        <h3>Com Contato</h3>
                        <div class="value">{{ $usuariosContatoDados[0] }}</div>
                    </div>
                    <div class="card">
                        <h3>Sem Contato</h3>
                        <div class="value">{{ $usuariosContatoDados[1] }}</div>
                    </div>
                    <div class="card">
                        <h3>Este Mês</h3>
                        <div class="value">{{ $usuariosEsteMes }}</div>
                    </div>
                </div>

                <!-- Grid de Gráficos -->
                <div class="charts-grid">
                    <!-- Gráfico 1: Linha - Usuários por Mês -->
                    <div class="chart-container">
                        <h3>Usuários cadastrados</h3>
                        <div id="graficoLinha" class="chart"></div>
                    </div>

                    <!-- Gráfico 2: Linha - Contatos por Mês -->
                    <div class="chart-container">
                        <h3>Contatos recebidos</h3>
                        <div id="graficoLinhaContatos" class="chart"></div>
                    </div>

                    <!-- Gráfico 3: Barras - Comparativo de usuários com e sem contato -->
                    <div class="chart-container">
                        <h3>Usuários com e sem Contato</h3>
                        <div id="graficoBarras" class="chart"></div>
                    </div>

                    <!-- Gráfico 4: Pizza - Distribuição por Sexo -->
                    <div class="chart-container">
                        <h3>Distribuição por Sexo dos Usuários</h3>
                        <div id="graficoPizzaSexo" class="chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // Gráfico 1: Linha - Usuários por Mês
            var chartLinha = echarts.init(
                document.getElementById('graficoLinha'),
            );
            var optionLinha = {
                tooltip: { trigger: 'axis' },
                xAxis: {
                    type: 'category',
                    data: @json($mesesLabels),
                    axisLabel: { rotate: 45 },
                },
                yAxis: { type: 'value' },
                series: [
                    {
                        name: 'Usuários cadastrados',
                        data: @json($mesesDados),
                        type: 'line',
                        smooth: true,
                        areaStyle: { color: 'rgba(66, 153, 225, 0.3)' },
                        lineStyle: { color: '#4299e1', width: 3 },
                        itemStyle: { color: '#4299e1' },
                    },
                ],
            };
            chartLinha.setOption(optionLinha);

            // Gráfico 2: Linha - Contatos por Mês
            var chartLinhaContatos = echarts.init(
                document.getElementById('graficoLinhaContatos'),
            );
            var optionLinhaContatos = {
                tooltip: { trigger: 'axis' },
                xAxis: {
                    type: 'category',
                    data: @json($contatosLabels),
                    axisLabel: { rotate: 45 },
                },
                yAxis: { type: 'value' },
                series: [
                    {
                        name: 'Contatos recebidos',
                        data: @json($contatosDados),
                        type: 'line',
                        smooth: true,
                        areaStyle: { color: 'rgba(237, 137, 54, 0.3)' },
                        lineStyle: { color: '#ed8936', width: 3 },
                        itemStyle: { color: '#ed8936' },
                    },
                ],
            };
            chartLinhaContatos.setOption(optionLinhaContatos);

            // Gráfico 3: Barras - Comparativo de usuários com e sem contato
            var chartBarras = echarts.init(
                document.getElementById('graficoBarras'),
            );
            var optionBarras = {
                tooltip: { trigger: 'axis', axisPointer: { type: 'shadow' } },
                xAxis: { type: 'category', data: @json($usuariosContatoLabels) },
                yAxis: { type: 'value' },
                series: [
                    {
                        name: 'Quantidade',
                        data: @json($usuariosContatoDados),
                        type: 'bar',
                        itemStyle: {
                            color: function (params) {
                                var colors = ['#48bb78', '#f56565'];
                                return colors[params.dataIndex % colors.length];
                            },
                        },
                        barWidth: '50%',
                    },
                ],
            };
            chartBarras.setOption(optionBarras);
            // Gráfico 4: Pizza - Distribuição por Sexo
            var chartPizzaSexo = echarts.init(
                document.getElementById('graficoPizzaSexo'),
            );
            var optionPizzaSexo = {
                tooltip: {
                    trigger: 'item',
                    formatter: '{b}: {c} ({d}%)',
                },
                legend: {
                    bottom: '5%',
                    left: 'center',
                    data: @json($sexoLabels),
                },
                series: [
                    {
                        name: 'Distribuição',
                        type: 'pie',
                        radius: ['40%', '70%'],
                        avoidLabelOverlap: false,
                        itemStyle: {
                            borderRadius: 10,
                            borderColor: '#fff',
                            borderWidth: 2,
                        },
                        label: {
                            show: false,
                            position: 'center',
                        },
                        emphasis: {
                            label: {
                                show: true,
                                fontSize: 20,
                                fontWeight: 'bold',
                            },
                        },
                        data: @json($sexoDados),
                    },
                ],
            };
            chartPizzaSexo.setOption(optionPizzaSexo);

            // Responsividade dos gráficos
            window.addEventListener('resize', function () {
                chartLinha.resize();
                chartLinhaContatos.resize();
                chartBarras.resize();
                chartPizzaSexo.resize();
            });
        </script>
    </body>
</html>
