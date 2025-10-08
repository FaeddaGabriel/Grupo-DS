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
    <h2>🏠 DashBoard</h2>
    <nav>
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
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
