<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supporte</title>
</head>
<body>
    <h1>Nova duvida</h1>

    <form action="{{route('forum.store')}}"method="Post">
        
        @csrf()
        <input type="text" placeholder="Assunto" name="subject" value="{{ old('subject') }}">
        <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{ old('body')}}</textarea>
        <button type="submit">Enviar</button>

        @if ($errors->any())
                 @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
        @endif

    </form>
</body>
</html>