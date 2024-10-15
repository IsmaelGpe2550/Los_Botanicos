<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/views.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
    <div class="preloader">
        <div class="loader">
            <div class="ball"></div>
            <div class="ball"></div>
            <div class="ball"></div>
        </div>
    </div>
        <header class="header-layout py-3">
            <div class="container container-layout">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <img src="{{ asset('images/logo-empresa-blanco.png') }}" alt="Logo" width="200px" height="auto">
                    </div>
                    <div class="col-auto">
                        <form class="form-inline">
                            <div class="input-group">
                                <input class="form-control barra-layout" type="search" placeholder="Buscar..." aria-label="Buscar">
                                <button class="btn btn-outline-light button-layout" type="submit">Buscar</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-auto">
                        <div class="dropdown menu">
                            <a class="btn btn-outline-light dropdown-toggle button-layout" href="#" role="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Menú
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="/">Inicio</a></li>
                                <li><a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">Perfil</a></li>
                                <li><a class="dropdown-item" href="#">Mis compras</a></li>
                                <li><a class="dropdown-item" href="#">Guardados</a></li>
                                <li><a class="dropdown-item" href="#">Carrito</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Contenido -->
        <main class="container mt-4">
            @yield('content')
        </main>
        <script src="{{ asset('js/preloader.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    </body>
</html>