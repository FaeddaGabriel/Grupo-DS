<nav>
    <img src="{{ asset('images/King1.png') }}" alt="">
    <h2 class="logo">Sports<span>King</span></h2>
    
    <div class="search-bar">
        <input type="text" placeholder="Buscar...">
        <button type="button">🔍</button>
    </div>
<!-- Navbar atualizada com botões de cadastro e login aparecendo apenas para visitantes -->
    <ul>
        <li>
            <!-- Comando para um futuro modo de seleção -->
            <ul class="sub-menu">
                
            </ul>
        </li>
    <li><a href="/Contato">Contato</a></li>
        
        @guest
        <li><a href="/Cadastro">Cadastrar</a></li>
        <li><a href="/Login">Login</a></li>
        
        @endguest

        @auth
        @if (Auth::user()->nivel_acesso == 0)
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        @endif
        <li><a href="/Perfil">Perfil</a></li>
        <li class="cadastro">
            <form id="logout-form" action="{{ route('fazerLogOut') }}" method="POST" style="display: none;">
            
                @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
        </li>
        @endauth
    </ul>
</nav>
