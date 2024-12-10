<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @vite('../resources/css/Vapor/bootstrap.css', '../resources/css/Vapor/bootstrap.min.css')
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">AnimeMX</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('inicio')}}">Inicio
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">Encuestas</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('encuesta') }}">Encuesta</a>
                            <a class="dropdown-item" href="{{ route('reporteEA') }}">Reporte</a>
                        </div>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">Contenidos</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('addAnimeView') }}">Añadir Anime</a>
                            <a class="dropdown-item" href="">Reporte</a>
                        </div>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cerrarsesion')}}">Cerrar Sesion</a>
                    </li>
                </ul>
                @if (Session::has('sesionname'))
                <div>BIENVENIDO
                    <br> {{ Session::get('sesionname')}}
                    <br>
                    {{Session::get('sesiontipo')}}
                </div>
                @endif
            </div>
        </div>
    </nav>
    @yield('contenido')

</body>

</html>