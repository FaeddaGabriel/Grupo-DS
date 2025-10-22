<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Sports King - Contato</title>
        <link rel="stylesheet" href="{{ asset("css/Contato.css") }}" />
        <link rel="stylesheet" href="{{ asset("css/NavBar.css") }}" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body>
        {{-- LOGO --}}
        <a href="{{ route("home") }}" class="logo-link">
            <img
                src="{{ asset("images/King1.png") }}"
                alt="Logo"
                class="logo-img"
            />
        </a>

        {{-- FORMULÁRIO --}}
        <div class="page">
            <form
                class="formLogin"
                action="{{ url("/Contato/inserir") }}"
                method="post"
            >
                @csrf
                <h1>Contate-nos</h1>
                <p>Entre em contato com nossa agência</p>

                @if (session("success"))
                    <div id="alert-message" class="alert-success">
                        {{ session("success") }}
                    </div>
                    <script>
                        const alertDiv =
                            document.getElementById('alert-success');
                        setTimeout(() => {
                            alertDiv.remove();
                        }, 3000);
                    </script>
                @endif

                <label for="name">Nome do Usuário</label>
                <input
                    type="text"
                    id="name"
                    name="txContNome"
                    placeholder="Digite seu nome de usuário"
                    required
                />
                <br />

                <label for="email">E-mail</label>
                <input
                    type="email"
                    id="email"
                    name="txContEmail"
                    placeholder="Digite seu e-mail"
                    required
                />

                <label for="feedback">Fale conosco</label>
                <input
                    type="text"
                    id="feedback"
                    name="txContMsg"
                    placeholder="Escreva seu feedback aqui"
                    required
                />
                <br />

                <button class="btn" type="submit" value="Salvar">Enviar</button>
            </form>
        </div>
    </body>
</html>
