<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="css/Perfil.css">
</head>
<body>
    <div class="container">
        <h2>Perfil do Usuário</h2>

        <form action="{{ route('perfil.foto') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Upload de Foto com estilo personalizado -->
            <div class="custom-file-upload">
                <label for="foto">Foto de Perfil</label>

                <!-- Botão estilizado -->
                <label class="file-label" for="foto">Escolher arquivo</label>
                <input type="file" name="foto" id="foto" class="hidden-file">

                <!-- Texto com nome do arquivo -->
                <span id="file-name">Nenhum arquivo escolhido</span>
            </div>

            <!-- Exibição da foto atual -->
            <div>
                <p>Foto atual:</p>
                @if(auth()->check() && auth()->user()->foto_perfil)
                    <img src="{{ asset('storage/' . auth()->user()->foto_perfil) }}" alt="Foto de Perfil" width="120">
                @else
                    <img src="{{ asset('storage/imagesPicture/default.png') }}" alt="Sem foto" width="120">
                @endif
            </div>

            <!-- Informações do usuário -->
            <div>
                <p>Nome: {{ auth()->user()->name }}</p>
                <p>Email: {{ auth()->user()->email }}</p>
            </div>

            <!-- Botão de envio -->
            <button type="submit">Salvar</button>
        </form>
    </div>

    <!-- Script para atualizar o nome do arquivo -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const input = document.getElementById('foto');
            const fileName = document.getElementById('file-name');

            input.addEventListener('change', function () {
                if (this.files && this.files.length > 0) {
                    fileName.textContent = this.files[0].name;
                } else {
                    fileName.textContent = "Nenhum arquivo escolhido";
                }
            });
        });
    </script>
</body>
</html>
