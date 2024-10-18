@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card text-center" style="width: 24rem;">
            <!-- Imagen más grande, centrada -->
            <img src="{{ asset($planta->photo) }}" class="card-img-top img-fluid" style="width: 100%; height: auto;" alt="{{ $planta->name }}">
            <div class="card-body">
                <!-- Nombre de la planta -->
                <h2 class="card-title">{{ $planta->name }}</h2>
                
                <!-- Descripción de la planta -->
                <p class="card-text"><strong>Descripción:</strong> {{ $planta->description }}</p>

                <!-- Precio de la planta -->
                <p class="card-text"><strong>Precio:</strong> ${{ $planta->price }}</p>

                <!-- Stock disponible -->
                <p class="card-text"><strong>Stock disponible:</strong> {{ $planta->stock }}</p>

                <!-- Botones alineados y con mayor espacio entre ellos -->
                <div class="d-flex justify-content-around mt-4">
                    <!-- Botón para volver a la lista -->
                    <a href="{{ route('plantas.ventas') }}" class="btn btn-primary">Volver a la lista </a>

                    <!-- Botón para volver a editar -->
                    <a href="{{ route('plantas.index') }}" class="btn btn-primary">Volver a editar</a>
                </div>
            </div>
        </div>
    </div>
@endsection