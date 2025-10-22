<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Exercício - Exercícios do PDF</title>
        <link rel="stylesheet" href="{{ asset("css/exercicio.css") }}" />
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap"
            rel="stylesheet"
        />
        <script src="https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js"></script>
    </head>
    <body>
        @include("layouts.menu")

        <div id="analise-root">
            <div class="main-content">
                <div class="header">
                    <h1>Página de Exercícios</h1>
                    <p>
                        Exercícios do PDF com consultas de agregação e gráficos
                        ECharts
                    </p>
                </div>

                <div style="margin-bottom: 30px">
                    <h2
                        style="
                            font-size: 24px;
                            color: #2d3748;
                            margin-bottom: 20px;
                        "
                    >
                        📊 Consultas de Agregação
                    </h2>

                    <div
                        style="
                            display: grid;
                            grid-template-columns: repeat(
                                auto-fit,
                                minmax(450px, 1fr)
                            );
                            gap: 20px;
                        "
                    >
                        <!-- Consulta 1: Usuários por Nível de Acesso -->
                        <div class="card" style="padding: 20px">
                            <h3
                                style="
                                    font-size: 16px;
                                    color: #4a5568;
                                    margin-bottom: 15px;
                                    font-weight: 600;
                                "
                            >
                                1. Usuários por Nível de Acesso
                            </h3>
                            <table
                                style="width: 100%; border-collapse: collapse"
                            >
                                <thead>
                                    <tr style="background-color: #f7fafc">
                                        <th
                                            style="
                                                padding: 10px;
                                                text-align: left;
                                                border-bottom: 2px solid #e2e8f0;
                                            "
                                        >
                                            Tipo de Usuário
                                        </th>
                                        <th
                                            style="
                                                padding: 10px;
                                                text-align: right;
                                                border-bottom: 2px solid #e2e8f0;
                                            "
                                        >
                                            Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuariosPorNivel as $item)
                                        <tr>
                                            <td
                                                style="
                                                    padding: 10px;
                                                    border-bottom: 1px solid
                                                        #e2e8f0;
                                                "
                                            >
                                                {{ $item->tipo_usuario }}
                                            </td>
                                            <td
                                                style="
                                                    padding: 10px;
                                                    text-align: right;
                                                    border-bottom: 1px solid
                                                        #e2e8f0;
                                                    font-weight: 600;
                                                "
                                            >
                                                {{ $item->total }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Consulta 2: Usuários Cadastrados por Mês (Últimos 6 Meses) -->
                        <div class="card" style="padding: 20px">
                            <h3
                                style="
                                    font-size: 16px;
                                    color: #4a5568;
                                    margin-bottom: 15px;
                                    font-weight: 600;
                                "
                            >
                                2. Usuários Cadastrados por Mês (Últimos 6
                                Meses)
                            </h3>
                            <table
                                style="width: 100%; border-collapse: collapse"
                            >
                                <thead>
                                    <tr style="background-color: #f7fafc">
                                        <th
                                            style="
                                                padding: 10px;
                                                text-align: left;
                                                border-bottom: 2px solid #e2e8f0;
                                            "
                                        >
                                            Mês
                                        </th>
                                        <th
                                            style="
                                                padding: 10px;
                                                text-align: right;
                                                border-bottom: 2px solid #e2e8f0;
                                            "
                                        >
                                            Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuariosPorMesRecente as $item)
                                        <tr>
                                            <td
                                                style="
                                                    padding: 10px;
                                                    border-bottom: 1px solid
                                                        #e2e8f0;
                                                "
                                            >
                                                {{ $item->mes_nome }}
                                            </td>
                                            <td
                                                style="
                                                    padding: 10px;
                                                    text-align: right;
                                                    border-bottom: 1px solid
                                                        #e2e8f0;
                                                    font-weight: 600;
                                                "
                                            >
                                                {{ $item->total }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Consulta 3: Contatos por Tamanho da Mensagem -->
                        <div class="card" style="padding: 20px">
                            <h3
                                style="
                                    font-size: 16px;
                                    color: #4a5568;
                                    margin-bottom: 15px;
                                    font-weight: 600;
                                "
                            >
                                3. Contatos por Tamanho de Mensagem
                            </h3>
                            <table
                                style="width: 100%; border-collapse: collapse"
                            >
                                <thead>
                                    <tr style="background-color: #f7fafc">
                                        <th
                                            style="
                                                padding: 10px;
                                                text-align: left;
                                                border-bottom: 2px solid #e2e8f0;
                                            "
                                        >
                                            Tamanho
                                        </th>
                                        <th
                                            style="
                                                padding: 10px;
                                                text-align: right;
                                                border-bottom: 2px solid #e2e8f0;
                                            "
                                        >
                                            Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contatosPorTamanho as $item)
                                        <tr>
                                            <td
                                                style="
                                                    padding: 10px;
                                                    border-bottom: 1px solid
                                                        #e2e8f0;
                                                "
                                            >
                                                {{ $item->tamanho }}
                                            </td>
                                            <td
                                                style="
                                                    padding: 10px;
                                                    text-align: right;
                                                    border-bottom: 1px solid
                                                        #e2e8f0;
                                                    font-weight: 600;
                                                "
                                            >
                                                {{ $item->total }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Consulta 4: Usuários por Dia da Semana -->
                        <div class="card" style="padding: 20px">
                            <h3
                                style="
                                    font-size: 16px;
                                    color: #4a5568;
                                    margin-bottom: 15px;
                                    font-weight: 600;
                                "
                            >
                                4. Usuários Cadastrados por Dia da Semana
                            </h3>
                            <table
                                style="width: 100%; border-collapse: collapse"
                            >
                                <thead>
                                    <tr style="background-color: #f7fafc">
                                        <th
                                            style="
                                                padding: 10px;
                                                text-align: left;
                                                border-bottom: 2px solid #e2e8f0;
                                            "
                                        >
                                            Dia da Semana
                                        </th>
                                        <th
                                            style="
                                                padding: 10px;
                                                text-align: right;
                                                border-bottom: 2px solid #e2e8f0;
                                            "
                                        >
                                            Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuariosPorDiaSemana as $item)
                                        <tr>
                                            <td
                                                style="
                                                    padding: 10px;
                                                    border-bottom: 1px solid
                                                        #e2e8f0;
                                                "
                                            >
                                                {{ $item->dia_semana }}
                                            </td>
                                            <td
                                                style="
                                                    padding: 10px;
                                                    text-align: right;
                                                    border-bottom: 1px solid
                                                        #e2e8f0;
                                                    font-weight: 600;
                                                "
                                            >
                                                {{ $item->total }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Seção de Gráficos -->
                <div>
                    <h2
                        style="
                            font-size: 24px;
                            color: #2d3748;
                            margin-bottom: 20px;
                        "
                    >
                        📈 Gráficos de Visualização
                    </h2>

                    <div class="charts-grid">
                        <div class="chart-container">
                            <h3>
                                Distribuição de Usuários por Nível de Acesso
                            </h3>
                            <div
                                id="graficoBarrasHorizontal"
                                class="chart"
                            ></div>
                        </div>
                        <div class="chart-container">
                            <h3>Evolução de Cadastros (Últimos 6 Meses)</h3>
                            <div id="graficoArea" class="chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Gráfico 1: Barras Horizontais - Usuários por Nível. os dados são estáticos só pra deixar claro
            var chartBarrasHorizontal = echarts.init(
                document.getElementById('graficoBarrasHorizontal'),
            );
            var optionBarrasHorizontal = {
                tooltip: { trigger: 'axis', axisPointer: { type: 'shadow' } },
                grid: { left: '20%' },
                xAxis: { type: 'value', name: 'Quantidade' },
                yAxis: {
                    type: 'category',
                    data: ['Usuário Comum', 'Administrador'],
                },
                series: [
                    {
                        name: 'Total de Usuários',
                        type: 'bar',
                        data: [50, 12],
                        itemStyle: {
                            color: function (params) {
                                var colors = ['#4299e1', '#48bb78'];
                                return colors[params.dataIndex % colors.length];
                            },
                        },
                        label: {
                            show: true,
                            position: 'right',
                            formatter: '{c}',
                        },
                    },
                ],
            };
            chartBarrasHorizontal.setOption(optionBarrasHorizontal);

            // Gráfico 2: Área - Usuários por Mês. os dados são estáticos só pra deixar claro
            var chartArea = echarts.init(
                document.getElementById('graficoArea'),
            );
            var optionArea = {
                tooltip: { trigger: 'axis', axisPointer: { type: 'cross' } },
                xAxis: {
                    type: 'category',
                    data: [
                        'Maio/2025',
                        'Junho/2025',
                        'Julho/2025',
                        'Agosto/2025',
                        'Setembro/2025',
                        'Outubro/2025',
                    ],
                    boundaryGap: false,
                    axisLabel: { rotate: 45 },
                },
                yAxis: { type: 'value', name: 'Usuários' },
                series: [
                    {
                        name: 'Cadastros',
                        type: 'line',
                        data: [8, 15, 11, 20, 14, 25],
                        smooth: true,
                        areaStyle: {
                            color: {
                                type: 'linear',
                                x: 0,
                                y: 0,
                                x2: 0,
                                y2: 1,
                                colorStops: [
                                    {
                                        offset: 0,
                                        color: 'rgba(72, 187, 120, 0.8)',
                                    },
                                    {
                                        offset: 1,
                                        color: 'rgba(72, 187, 120, 0.1)',
                                    },
                                ],
                            },
                        },
                        lineStyle: { color: '#48bb78', width: 3 },
                        itemStyle: { color: '#48bb78' },
                    },
                ],
            };
            chartArea.setOption(optionArea);

            // Responsividade dos gráficos aqui embaixo é só chamar o método resize() do ECharts
            window.addEventListener('resize', function () {
                chartBarrasHorizontal.resize();
                chartArea.resize();
            });
        </script>
    </body>
</html>
