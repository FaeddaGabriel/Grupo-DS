<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8" />
        <title>Perfil do Usuário</title>
        <link
            rel="stylesheet"
            href="{{ asset("css/usuario/usuario-perfil.css") }}"
        />
    </head>
    <body>
        <a href="{{ route("home") }}" class="logo-link">
            <img
                src="{{ asset("images/King1.png") }}"
                alt="Logo"
                class="logo-img"
            />
        </a>
        <div class="container">
            <h2>Perfil do Usuário</h2>

            @if (session("success"))
                <div class="alert-success">
                    {{ session("success") }}
                </div>
            @endif

            <!-- Imagem de perfil no topo, fica daora assim -->
            <div class="profile-picture-wrapper">
                @if (auth()->check() && auth()->user()->foto_perfil)
                    <img
                        src="{{ asset("storage/" . auth()->user()->foto_perfil) }}"
                        alt="Foto de Perfil"
                        class="profile-picture"
                    />
                @else
                    <div class="profile-picture no-photo">Sem foto</div>
                @endif
            </div>

            <form
                action="{{ route("perfil.foto") }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method("PUT")

                <!-- Upload de Foto -->
                <div class="custom-file-upload">
                    <label for="foto">Foto de Perfil</label>
                    <label class="file-label" for="foto">
                        Escolher arquivo
                    </label>
                    <input
                        type="file"
                        name="foto"
                        id="foto"
                        class="hidden-file"
                    />
                    <span id="file-name">Nenhum arquivo escolhido</span>
                </div>

                <!-- Informações do usuário -->
                <div class="user-info">
                    <p>
                        <strong>Nome:</strong>
                        {{ auth()->user()->name }}
                    </p>
                    <p>
                        <strong>Email:</strong>
                        {{ auth()->user()->email }}
                    </p>
                </div>
                <button type="submit">Salvar</button>
            </form>
        </div>

        <!-- Script para atualizar o nome do arquivo -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const input = document.getElementById('foto');
                const fileName = document.getElementById('file-name');

                input.addEventListener('change', function () {
                    if (this.files && this.files.length > 0) {
                        fileName.textContent = this.files[0].name;
                    } else {
                        fileName.textContent = 'Nenhum arquivo escolhido';
                    }
                });
            });
        </script>
    </body>
</html>
