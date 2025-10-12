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

    @media (max-width: 768px) {
        .sidebar {
            width: 200px;
        }
    }
</style>

<div class="sidebar">
    <h2>🛠️ Painel ADM</h2>
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
