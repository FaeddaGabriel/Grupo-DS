<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
    </head>
    <body>
        <h1>Usuários</h1>

        @foreach ($user as $u)
            <p>
                {{ $u->id }} {{ $u->name }} {{ $u->email }}
                {{ $u->sexo }}
                {{ $u->nivel_acesso == 0 ? "Administrador" : "Usuário Comum" }}
                {{ date("d/m/Y H:i", strtotime($u->created_at)) }}
            </p>
        @endforeach
    </body>
</html>
