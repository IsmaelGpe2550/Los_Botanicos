@extends('layouts.app')
@section('content')
<div class="container-profile-edit">
    <h2>Editar perfil</h2>

    <form action="{{ route('users.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data" class="mb-3">
        @csrf
        @method('PUT')

        <div class="form-group text-center">
            <label for="profile_photo">Foto de Perfil:</label>
            <div class="mb-2">
                <img id="preview-profile-photo" src="{{ asset(Auth::user()->profile_photo) }}" alt="Foto de perfil" class="img-fluid rounded-circle" style="width: 150px; height: auto;">
            </div>
            <div class="text-center">
                <label class="btn btn-warning" for="profile_photo">Seleccionar Archivo</label>
                <input type="file" class="form-control-file" id="profile_photo" name="profile_photo" style="display: none;" onchange="previewImage(event)">
            </div>
        </div>

        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Correo:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea class="form-control" id="description" name="description" rows="4">{{ Auth::user()->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="password">Nueva Contraseña:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Dejar vacío si no desea cambiar">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Dejar vacío si no desea cambiar">
        </div>

        <!-- Contenedor solo para los botones -->
        <div class="text-center">
            <button type="submit" class="btn btn-success w-25 me-2">Guardar Cambios</button>
        </div>
    </form>

    <form action="{{ route('users.destroy', Auth::user()->id) }}" method="POST" class="text-center">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger w-25">Eliminar Cuenta</button>
    </form>
</div>
@endsection