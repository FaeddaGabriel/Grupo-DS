<link rel="stylesheet" href="{{ asset('css/NavBar.css') }}">
<nav class="navbar">
    <div class="logo">
        <img src="/images/2.png" alt="Logo da Sports Kings">
    </div>
    <ul class="nav-links">
        <li><a href="/">Início</a></li>
        <li><a href="/Loja">Loja</a></li>
        <li><a href="/contato">Contato</a></li>
        
        <li class="cadastro cadastrar-se"><a href="/Cadastro">Cadastrar-se</a></li>

        @guest
        <a href="{{ route('/Cadastro') }}" class="btn">Cadastrar-se</a>
        <a href="{{ route('/Form') }}" class="btn">Login</a>
        @endguest
       
        @auth
            <li class="cadastro">
                <form action="{{ route('fazerLogOut') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-button">Sair</button>
                </form>
            </li>
        @endauth
    </ul>
</nav>
