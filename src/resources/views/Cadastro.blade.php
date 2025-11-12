<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Sports Kings - Cadastro</title>
        <link rel="stylesheet" href="/css/cadastro.css" />
    </head>
    <body>
        <a href="{{ route("home") }}" class="logo-link">
            <img
                src="{{ asset("images/King1.png") }}"
                alt="Logo"
                class="logo-img"
            />
        </a>

        <div class="page">
            <form
                class="formLogin"
                action="{{ url("/Cadastro/inserir") }}"
                method="post"
            >
                @csrf
                <h1>Crie sua Conta</h1>
                <p>Preencha os campos abaixo para se cadastrar</p>

                <label for="name">Nome Completo</label>
                <input
                    type="text"
                    name="txNome"
                    placeholder="Digite seu nome"
                    required
                />

                <label for="email">E-mail</label>
                <input
                    type="email"
                    id="email"
                    name="txEmail"
                    placeholder="Digite seu e-mail"
                    required
                />

                <label for="sexo">Sexo</label>
                <div class="sexo-container">
                    <label>
                        <input
                            type="radio"
                            name="txSexo"
                            value="Masculino"
                            required
                        />
                        Masculino
                    </label>
                    <label>
                        <input
                            type="radio"
                            name="txSexo"
                            id="txSexo"
                            value="Feminino"
                        />
                        Feminino
                    </label>
                    <label>
                        <input
                            type="radio"
                            name="txSexo"
                            id="txSexo"
                            value="N/I"
                        />
                        Prefiro não informar
                    </label>
                </div>

                <label for="password">Senha</label>
                <input
                    type="password"
                    id="password"
                    name="txSenha"
                    placeholder="Crie uma senha"
                    required
                />

                <button class="btn" type="submit" value="Salvar">
                    Cadastrar
                </button>
            </form>

            <p><a href="/Login">Já possui um cadastro? Aperte aqui</a></p>
        </div>
    </body>
</html>
