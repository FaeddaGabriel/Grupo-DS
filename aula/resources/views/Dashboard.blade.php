<div class="container">
    <h2>📊 Dashboard - Painel Administrativo</h2>

    {{-- Cards resumo --}}
    <div class="dashboard-cards">
        <div class="card">
            <h3>Total de Usuários</h3>
            <p>{{ $totalUsuarios }}</p>
        </div>

        <div class="card">
            <h3>Total de Contatos</h3>
            <p>{{ $totalContatos }}</p>
        </div>
    </div>

    <hr>

    {{-- Últimos usuários cadastrados --}}
    <div class="dashboard-section">
        <h3>Últimos Usuários Cadastrados</h3>
        @if($usuariosRecentes->count() > 0)
            <table border="1" cellpadding="8">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Nível de Acesso</th>
                        <th>Data de Criação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuariosRecentes as $u)
                        <tr>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->nivel_acesso == 0 ? 'Admin' : 'Usuário' }}</td>
                            <td>{{ $u->created_at?->format('d/m/Y H:i') ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Nenhum usuário cadastrado.</p>
        @endif
    </div>

    <hr>

    {{-- Últimos contatos --}}
    <div class="dashboard-section">
        <h3>Últimos Contatos Recebidos</h3>
        @if($contatosRecentes->count() > 0)
            <table border="1" cellpadding="8">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Assunto</th>
                        <th>Mensagem</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contatosRecentes as $c)
                        <tr>
                            <td>{{ $c->nome }}</td>
                            <td>{{ $c->email }}</td>
                            <td>{{ $c->assunto }}</td>
                            <td>{{ $c->mensagem }}</td>
                            <td>{{ $c->created_at?->format('d/m/Y H:i') ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Nenhum contato registrado.</p>
        @endif
    </div>

    <hr>

    {{-- Links rápidos --}}
    <div class="dashboard-actions">
        <a href="{{ route('consultas') }}">🔍 Ir para Consultas</a>
        <br>
        <a href="{{ route('home') }}">🏠 Voltar para Home</a>
    </div>
</div>