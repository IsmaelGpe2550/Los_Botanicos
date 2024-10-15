@extends('layouts.app')
@section('content')
    <div class="container-profile">
        <h2 class="h2-perfil">Perfil de Usuario</h2>
        <div class="card custom-card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-3 text-center">
                        <img src="{{ asset(Auth::user()->profile_photo) }}" alt="Foto de perfil" class="img-fluid rounded-circle" style="width: 150px; height: auto;">
                    </div>
                    
                    <div class="col-md-6">
                        <h5 class="card-title">{{ Auth::user()->name }}</h5>
                        <p class="card-text"><strong>Correo:</strong> {{ Auth::user()->email }}</p>
                        <p class="card-text"><strong>Descripción:</strong> {{ Auth::user()->description }}</p>
                    </div>
                    
                    <div class="col-md-3 text-end">
                        <a href="{{ route('users.edit', Auth::user()->id) }}" class="btn btn-success mb-2 button-profile w-100">Editar Perfil</a>
                        <div class="dropdown menu">
                            <a class="btn btn-warning dropdown-toggle button-profile w-100" href="#" role="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Opciones de vendedor
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item dropdown-profile" href="#">Añadir produto en venta</a></li>
                                <li><a class="dropdown-item dropdown-profile" href="#">Productos</a></li>
                                <li><a class="dropdown-item dropdown-profile" href="#">Ventas</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

