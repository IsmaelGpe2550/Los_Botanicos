@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mis Ventas</h1>

        <!-- Recorremos todas las plantas del usuario -->
        <div class="row">
            @foreach ($plantas as $planta)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <!-- Imagen de la planta -->
                        <img src="{{ asset($planta->photo) }}" class="card-img-top" alt="{{ $planta->name }}" style="height: 250px; object-fit: cover;">
                        <div class="card-body text-center">
                            <!-- Nombre de la planta -->
                            <h5 class="card-title">{{ $planta->name }}</h5>

                            <!-- Precio de la planta -->
                            <p class="card-text"><strong>Precio:</strong> ${{ $planta->price }}</p>

                            <!-- Stock disponible -->
                            <p class="card-text"><strong>Stock:</strong> {{ $planta->stock }}</p>

                            <!-- Botón para ver más detalles de la planta (redirige a la vista show) -->
                            <a href="{{ route('plantas.show', $planta->id) }}" class="btn btn-primary">Ver detalles</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
