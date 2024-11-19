<link rel="stylesheet" href="{{ asset('css/views.css') }}">
<link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="preloader">
    <div class="loader">
        <div class="ball"></div>
        <div class="ball"></div>
        <div class="ball"></div>
    </div>
</div>

<div class="container mt-5">
    <div class="container-logo text-center mb-4">
        <div class="logo-empresa-negro-sin-letras">
            <img src="{{ asset('images/logo-empresa-negro.png') }}" alt="Logo" width="100">
        </div>
    </div>
    <h3 class="text-center mb-4">Iniciar sesión</h3>
    <div class="row justify-content-center">
        <div class="col-md-6 custom-form">
            <form action="{{ route('login') }}" method="POST"> 
                @csrf
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success btn-block">Iniciar sesión</button>
            </form>
            <br>
            <div class="cuenta">
                <p style="margin: 0;">¿No tienes una cuenta?</p>
                <a href="{{ route('users.create') }}" style="margin-left: 5px;">Regístrate aquí</a>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/preloader.js') }}"></script>
