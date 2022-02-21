<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route("insertChollo")}}" method="POST">
        @csrf
        <label for="titilo">Titulo de chollo</label>
        <input type="text" name="titulo">
        @foreach ($categorias as $categoria)
                <input
                    type="checkbox"
                    name="categorias[]"
                    value="{{ $categoria -> id }}"
                    class="checkbox"
                >
                <label>
                    {{ $categoria -> titulo }}
                </label>
            @endforeach
            <input type="submit" value="enviar">
    </form>
</body>
</html>