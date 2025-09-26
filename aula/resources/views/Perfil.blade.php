<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Perfil do Usuário</title>
</head>
<body>
    <div class="container">
        <h2>Perfil do Usuário</h2>

        <form action="{{ route('perfil.foto') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="foto">Foto de Perfil</label>
                <input type="file" name="foto" id="foto">
            </div>

            <div>
                <p>Foto atual:</p>
                @if(auth()->check() && auth()->user()->foto_perfil)
                    <img src="{{ asset('storage/' . auth()->user()->foto_perfil) }}" alt="Foto de Perfil" width="120">
                @else
                    <img src="{{ asset('storage/imagesPicture/default.png') }}" alt="Sem foto" width="120">
                @endif
            </div>

            <div>
                <p>Nome: {{ auth()->user()->name }}</p>
                <p>Email: {{ auth()->user()->email }}</p>
                <p>Nível de acesso: {{ auth()->user()->nivel_acesso == 0 ? 'Admin' : 'Usuário' }}</p>
            </div>

            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>
