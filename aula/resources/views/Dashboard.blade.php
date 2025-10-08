@extends('layouts.base')

@section('titulo', 'Dashboard - Painel Administrativo')

@section('conteudo')
    <div class="header">
        <h1>Painel Administrativo</h1>
        <p>Visão geral do sistema e análise de dados</p>
    </div>

    <!-- Cards de Indicadores -->
    <div class="cards-grid">
        <div class="card">
            <h3>Usuários</h3>
            <div class="value">{{ $totalUsuarios }}</div>
        </div>
        <div class="card">
            <h3>Com Ocorrência</h3>
            <div class="value">{{ $usuariosComOcorrencia }}</div>
        </div>
        <div class="card">
            <h3>Sem Ocorrência</h3>
            <div class="value">{{ $usuariosSemOcorrencia }}</div>
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

        <!-- Gráfico 2: Pizza - Contatos por Assunto -->
        <div class="chart-container">
            <h3>Distribuição de Gênero</h3>
            <div id="graficoPizza" class="chart"></div>
        </div>

        <!-- Gráfico 3: Barras - Comparativo -->
        <div class="chart-container">
            <h3>Usuários</h3>
            <div id="graficoBarras" class="chart"></div>
        </div>

        <!-- Gráfico 4: Radar - Análise Multivariada -->
        <div class="chart-container">
            <h3>Análise Departamental</h3>
            <div id="graficoRadar" class="chart"></div>
        </div>
    </div>
@endsection

@section('scripts-adicionais')
    <script>
        // Gráfico 1: Linha - Usuários por Mês
        var chartLinha = echarts.init(document.getElementById('graficoLinha'));
        var optionLinha = {
            tooltip: {
                trigger: 'axis'
            },
            xAxis: {
                type: 'category',
                data: @json($mesesLabels),
                axisLabel: {
                    rotate: 45
                }
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                name: 'Usuários cadastrados',
                data: @json($mesesDados),
                type: 'line',
                smooth: true,
                areaStyle: {
                    color: 'rgba(66, 153, 225, 0.3)'
                },
                lineStyle: {
                    color: '#4299e1',
                    width: 3
                },
                itemStyle: {
                    color: '#4299e1'
                }
            }]
        };
        chartLinha.setOption(optionLinha);

        // Gráfico 2: Pizza - Distribuição (exemplo: gênero)
        var chartPizza = echarts.init(document.getElementById('graficoPizza'));
        var optionPizza = {
            tooltip: {
                trigger: 'item',
                formatter: '{b}: {c} ({d}%)'
            },
            legend: {
                bottom: '5%',
                left: 'center'
            },
            series: [{
                name: 'Distribuição',
                type: 'pie',
                radius: ['40%', '70%'],
                avoidLabelOverlap: false,
                itemStyle: {
                    borderRadius: 10,
                    borderColor: '#fff',
                    borderWidth: 2
                },
                label: {
                    show: true,
                    formatter: '{d}%'
                },
                emphasis: {
                    label: {
                        show: true,
                        fontSize: 20,
                        fontWeight: 'bold'
                    }
                },
                data: [
                    { value: 60, name: 'Masculino', itemStyle: { color: '#4299e1' } },
                    { value: 20, name: 'Feminino', itemStyle: { color: '#f56565' } },
                    { value: 20, name: 'Não Informado', itemStyle: { color: '#ed8936' } }
                ]
            }]
        };
        chartPizza.setOption(optionPizza);

        // Gráfico 3: Barras - Comparativo
        var chartBarras = echarts.init(document.getElementById('graficoBarras'));
        var optionBarras = {
            tooltip: {
                trigger: 'axis',
                axisPointer: {
                    type: 'shadow'
                }
            },
            xAxis: {
                type: 'category',
                data: @json($nivelLabels)
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                name: 'Quantidade',
                data: @json($nivelDados),
                type: 'bar',
                itemStyle: {
                    color: function(params) {
                        var colors = ['#48bb78', '#f56565'];
                        return colors[params.dataIndex % colors.length];
                    }
                },
                barWidth: '50%'
            }]
        };
        chartBarras.setOption(optionBarras);

        // Gráfico 4: Radar - Análise Multivariada
        var chartRadar = echarts.init(document.getElementById('graficoRadar'));
        var optionRadar = {
            tooltip: {},
            legend: {
                bottom: '5%',
                data: ['Allocated Budget', 'Actual Spending']
            },
            radar: {
                indicator: [
                    { name: 'Sales', max: 6500 },
                    { name: 'Administration', max: 6500 },
                    { name: 'Technology', max: 6500 },
                    { name: 'Customer Support', max: 6500 },
                    { name: 'Development', max: 6500 },
                    { name: 'Marketing', max: 6500 }
                ]
            },
            series: [{
                name: 'Budget vs Spending',
                type: 'radar',
                data: [
                    {
                        value: @json($radarOrcamento),
                        name: 'Allocated Budget',
                        areaStyle: {
                            color: 'rgba(66, 153, 225, 0.3)'
                        },
                        lineStyle: {
                            color: '#4299e1'
                        },
                        itemStyle: {
                            color: '#4299e1'
                        }
                    },
                    {
                        value: @json($radarGastoReal),
                        name: 'Actual Spending',
                        areaStyle: {
                            color: 'rgba(154, 230, 180, 0.3)'
                        },
                        lineStyle: {
                            color: '#48bb78'
                        },
                        itemStyle: {
                            color: '#48bb78'
                        }
                    }
                ]
            }]
        };
        chartRadar.setOption(optionRadar);

        // Responsividade dos gráficos
        window.addEventListener('resize', function() {
            chartLinha.resize();
            chartPizza.resize();
            chartBarras.resize();
            chartRadar.resize();
        });
    </script>
@endsection
