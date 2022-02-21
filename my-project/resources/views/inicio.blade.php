<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <nav>
        <li><a href="{{route('inicio')}}">Inicio</a></li>
        <li><a href="{{route('crearchollo')}}">Crear Chollo</a></li>
        @auth
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="http://localhost:8000/logout"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                Cerrar Sesión
            </a>

            <form id="logout-form" action="http://localhost:8000/logout" method="POST" class="d-none">
                <input type="hidden" name="_token" value="HZgU5xmcM4eNjUKuzknbsvhHHJqRix4Rvm7Cm5ya">                                    </form>
        </div>
        @else
        <li><a href="{{route('login')}}">Iniciar Sesión</a></li>        
        @endauth
    </nav>
        @if(session('mensaje'))
            <p>{{session("mensaje")}}
        @endif
        @yield('chollos')
</body>
</html>