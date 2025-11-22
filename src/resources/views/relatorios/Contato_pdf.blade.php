<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
    </head>
    <body>
        <h1>Contato</h1>

        @foreach ($Contato as $C)
            <p>
                {{ $C->idContato }} {{ $C->nomeContato }}
                {{ $C->emailContato }} {{ $C->mensagemContato }}
                {{ date("d/m/Y H:i", strtotime($C->created_at)) }}
            </p>
        @endforeach
    </body>
</html>
