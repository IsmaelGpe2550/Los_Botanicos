@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Mis Compras</h2>

        @if ($pedidos->isEmpty())
            <div class="alert alert-info">No tienes pedidos realizados aún.</div>
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($pedidos as $pedido)
                    <div class="col">
                        <div class="card shadow-sm border-light">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="card-title">Pedido #{{ $pedido->id }}</h5>
                                    <small class="text-muted">{{ $pedido->created_at->format('d/m/Y') }}</small>
                                </div>
                                <p class="card-text"><strong>Estado:</strong> {{ ucfirst($pedido->status) }}</p>
                                <p class="card-text"><strong>Total:</strong> ${{ number_format($pedido->total_cost, 2) }}</p>

                                <div class="mb-3">
                                    @if($pedido->imagen)
                                        <img src="{{ asset($pedido->imagen) }}" alt="Imagen del producto" class="rounded-circle img-fluid" style="width: 80px; height: 80px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('images/default.png') }}" alt="Imagen del producto" class="rounded-circle img-fluid" style="width: 80px; height: 80px; object-fit: cover;">
                                    @endif
                                </div>

                                <a href="{{ route('pedidos.show', $pedido->id) }}" class="btn btn-primary btn-sm w-100">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection