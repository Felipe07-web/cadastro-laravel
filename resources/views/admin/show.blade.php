<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes</title>
</head>
<body>
    <h1>Detalhes da dúvida {{ $support->id }}</h1>

    <ul>
        <li>Assunto: {{$support -> subject}}</li>
        <li>Status: {{$support -> status}}</li>
        <li>Descrição: {{$support -> body}}</li>
    </ul>

    <form action="{{ route('forum.destroy' , $support->id ) }}" method="post">
        <button type="submit">Deletar</button>
        @method('delete')
        @csrf()

        @if ($errors->any())
                 @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
        @endif
        
    </form>
</body>
</html>