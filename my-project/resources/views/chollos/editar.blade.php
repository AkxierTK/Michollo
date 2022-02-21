<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Editar chollo</h1>
    <form action="{{route("updateChollo")}}" method="POST">
        @csrf
        <label for="titulo">Titulo de chollo</label>
        <input type="text" name="titulo" value="{{$chollo->titulo}}">
        @foreach ($categorias as $categoria)
                <input
                    type="checkbox"
                    name="categorias[]"
                    value="{{ $categoria -> id }}"
                    class="checkbox"
                    @foreach ($chollo->categorias as $item)
                        @if($categoria->id===$item->pivot->categoria_id)
                            checked
                        @endif
                    @endforeach
                >
                <label>
                    {{ $categoria -> titulo }}
                </label>
            @endforeach
            <input type="hidden" name="id" value="{{$chollo->id}}">
            <input type="submit" value="enviar">
    </form>
</body>
</html>