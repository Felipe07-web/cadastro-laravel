<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição</title>
</head>
<body>
    <h1>Dúvida {{$support->id}}</h1>

        <form action="{{route('forum.update', $support->id)}}"method="Post">
            @csrf()
            @method('put')
            <input type="text" placeholder="Assunto" name="subject" value="{{$support->subject}}">
            <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{$support->body}}</textarea>
            <button type="submit">Enviar</button>

            @if ($errors->any())
                 @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endif

        </form>
</body>
</html>