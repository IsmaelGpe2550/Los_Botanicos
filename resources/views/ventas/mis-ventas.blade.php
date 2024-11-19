@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Mis Ventas</h1>

        @if ($ventas->isEmpty())
            <div class="alert alert-info">No tienes ventas realizadas aún.</div>
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($ventas as $venta)
                    <div class="col">
                        <div class="card shadow-sm border-light">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="card-title">Venta #{{ $venta->id }}</h5>
                                    <small class="text-muted">{{ $venta->updated_at->format('d/m/Y h:i A') }}</small>
                                </div>
                                <p class="card-text"><strong>Producto:</strong> {{ $venta->planta?->name ?? 'Producto no disponible' }}</p>
                                <p class="card-text"><strong>Cantidad:</strong> {{ $venta->amount }}</p>
                                <p class="card-text"><strong>Total:</strong> ${{ number_format($venta->pedido?->total_cost ?? 0, 2) }}</p>

                                <div class="mb-3">
                                    @if($venta->planta?->photo)
                                        <img src="{{ asset($venta->planta->photo) }}" alt="{{ $venta->planta->name }}" class="rounded-circle img-fluid" style="width: 80px; height: 80px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('images/default.png') }}" alt="Imagen no disponible" class="rounded-circle img-fluid" style="width: 80px; height: 80px; object-fit: cover;">
                                    @endif
                                </div>

                                <form action="{{ route('detalles_pedidos.update', $venta->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-group mb-3">
                                        <select name="status" class="form-select">
                                            <option value="pendiente" {{ $venta->status === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                            <option value="en camino" {{ $venta->status === 'en camino' ? 'selected' : '' }}>En Camino</option>
                                            <option value="entregado" {{ $venta->status === 'entregado' ? 'selected' : '' }}>Entregado</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                    </div>
                                </form>

                                <a href="{{ route('detalles_pedidos.show', $venta->id) }}" class="btn btn-success btn-sm w-100 mt-2">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection