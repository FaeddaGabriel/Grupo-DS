<!-- Botão Hamburger -->
<div id="hamburger" class="hamburger" onclick="toggleSidebar(true)">
    <div></div>
    <div></div>
    <div></div>
</div>

<!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <h2>Painel ADM</h2>
    <ul>
        <li><a href="{{ url('Dashboard') }}">Dashboard</a></li>
        <li><a href="{{ url('Consultas') }}">Usuários</a></li>
    </ul>

    <!-- Botão de fechar -->
    <button class="close-btn" onclick="toggleSidebar(false)">Fechar ✖</button>
</div>

<!-- Script de ativação da sidebar -->
<script>
    function toggleSidebar(open) {
        const sidebar = document.getElementById('sidebar');
        const hamburger = document.getElementById('hamburger');

        if (open) {
            sidebar.classList.add('active');
            hamburger.style.display = 'none';
        } else {
            sidebar.classList.remove('active');
            hamburger.style.display = 'flex';
        }
    }
</script>
