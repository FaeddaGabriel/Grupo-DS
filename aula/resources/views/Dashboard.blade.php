<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Painel Administrativo</title>
    
    <!-- ECharts CDN -->
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f5f5;
            display: flex;
            min-height: 100vh;
        }

        /* Menu Lateral Fixo */
        .sidebar {
            width: 240px;
            background-color: #2d3748;
            color: #e2e8f0;
            position: fixed;
            height: 100vh;
            padding: 20px 0;
            overflow-y: auto;
        }

        .sidebar h2 {
            padding: 0 20px 20px;
            font-size: 24px;
            color: #fff;
            border-bottom: 1px solid #4a5568;
            margin-bottom: 20px;
        }

        .sidebar nav {
            display: flex;
            flex-direction: column;
        }

        .sidebar nav a {
            padding: 12px 20px;
            color: #e2e8f0;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: background-color 0.3s;
        }

        .sidebar nav a:hover,
        .sidebar nav a.active {
            background-color: #4a5568;
        }

        .sidebar nav a .icon {
            font-size: 20px;
        }

        /* Área de Conteúdo */
        .main-content {
            margin-left: 240px;
            flex: 1;
            padding: 30px;
        }

        .header {
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 32px;
            color: #2d3748;
            margin-bottom: 10px;
        }

        .header p {
            color: #718096;
            font-size: 14px;
        }

        /* Cards de Indicadores */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .card h3 {
            font-size: 14px;
            color: #718096;
            margin-bottom: 10px;
            text-transform: uppercase;
            font-weight: 600;
        }

        .card .value {
            font-size: 36px;
            font-weight: 700;
            color: #2d3748;
        }

        /* Grid de Gráficos */
        .charts-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .chart-container {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .chart-container h3 {
            font-size: 18px;
            color: #2d3748;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .chart {
            width: 100%;
            height: 300px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-left: 200px;
            }

            .charts-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Menu Lateral -->
    <div class="sidebar">
        <h2>🏠 DashBoard</h2>
        <nav>
            <a href="{{ route('dashboard') }}" class="active">
                <span class="icon">📊</span>
                <span>Dashboard</span>
            </a>
            <a href="#">
                <span class="icon">📋</span>
                <span>Avaliações</span>
            </a>
            <a href="#">
                <span class="icon">💬</span>
                <span>Chat</span>
            </a>
            <a href="#">
                <span class="icon">🔍</span>
                <span>Status</span>
            </a>
            <a href="#">
                <span class="icon">👁️</span>
                <span>Views</span>
            </a>
            <a href="#">
                <span class="icon">⚠️</span>
                <span>Ocorrencias</span>
            </a>
            <a href="#">
                <span class="icon">👤</span>
                <span>Administradores</span>
            </a>
            <a href="#">
                <span class="icon">👥</span>
                <span>Usuários</span>
            </a>
            <a href="#">
                <span class="icon">⚙️</span>
                <span>Configurações</span>
            </a>
        </nav>
    </div>

    <!-- Conteúdo Principal -->
    <div class="main-content">
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
    </div>

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
</body>
</html>
