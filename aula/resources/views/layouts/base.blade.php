<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'SportsKing - Sistema Administrativo')</title>
    
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
            .main-content {
                margin-left: 200px;
            }

            .charts-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    
    @yield('estilos-adicionais')
</head>
<body>
    <!-- Menu Lateral -->
    @include('layouts.menu')

    <!-- Conteúdo Principal -->
    <div class="main-content">
        @yield('conteudo')
    </div>

    @yield('scripts-adicionais')
</body>
</html>
