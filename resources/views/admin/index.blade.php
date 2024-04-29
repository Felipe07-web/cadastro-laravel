<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>supports</title>
</head>
<body>

    <h1>Listagem dos suportes</h1>

    <a href="{{route('forum.create')}}">Nova dúvida</a>

    <table>
        <thead>
            <th>Assunto</th>
            <th>Status</th>
            <th>Descrição</th>
        </thead>

        <tbody>
            @foreach($supports as $support )
            <tr>
                <td>{{ $support->subject }}</td>
                <td>{{ $support->status }}</td>
                <td>{{ $support->body }}</td>
                <td><a href="{{ route('forum.show', $support->id) }}">Detalhes</a>
                    <a href="{{ route('forum.edit', $support->id )}}">Editar</a>           
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>
