<style>
    /* Menu Lateral Fixo */
    .sidebar {
        width: 240px;
        background-color: #2d3748;
        color: #e2e8f0;
        position: fixed;
        height: 100vh;
        padding: 20px 0;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        justify-content: space-between; /* aqui empurra o footer para o final */
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

    /* Estilo junto para TODOS os links do menu */
    .sidebar a {
        padding: 12px 20px;
        color: #e2e8f0;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: background-color 0.3s;
    }

    .sidebar a:hover,
    .sidebar a.active {
        background-color: #4a5568;
    }

    .sidebar a .icon {
        font-size: 20px;
    }
    .sidebar .sidebar-footer {
        padding-top: 15px;
        margin-top: 20px;
        border-top: 1px solid #4a5568;
    }

    @media (max-width: 768px) {
        .sidebar {
            width: 200px;
        }
    }
</style>

<div class="sidebar">
    <!-- Links Principais -->
    <div>
        <h2>Painel ADM</h2>
        <nav>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <span class="icon">📊</span>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('consultas') }}" class="{{ request()->routeIs('consultas') ? 'active' : '' }}">
                <span class="icon">🗂️</span>
                <span>Consultas</span>
            </a>
            <a href="{{ route('exercicio') }}" class="{{ request()->routeIs('exercicio') ? 'active' : '' }}">
                <span class="icon">📘</span>
                <span>Exercícios</span>
            </a>
        </nav>
    </div>

    <!-- Rodapé do Menu -->
    <div class="sidebar-footer">
        <a href="{{ url('/') }}">
            <span class="icon">🏠</span>
            <span>Voltar para o Site</span>
        </a>
    </div>
</div>
