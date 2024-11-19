@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="card shadow-sm mb-4">
            <div class="card-header" style="background-color: #28a745; color: white;">
                <h5 class="mb-0" style="background-color: #28a745; color: white;">Recibo de Compra - Pedido #{{ $pedidos->id }}</h5>
                <small>{{ $pedidos->created_at->format('d/m/Y') }}</small>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h6 class="font-weight-bold text-success">Datos del Comprador</h6>
                    <p><strong>Nombre:</strong> {{ $pedidos->name }}</p>
                    <p><strong>Dirección:</strong> {{ $pedidos->direccion }}</p>
                    <p><strong>Ciudad/Estado:</strong> {{ $pedidos->city }} - {{ $pedidos->state }}</p>
                    <p><strong>Código Postal:</strong> {{ $pedidos->postal_code }}</p>
                    <p><strong>Teléfono:</strong> {{ $pedidos->phone }}</p>
                    <p><strong>Correo:</strong> {{ Auth::user()->email }}</p>
                </div>

                <hr class="my-4">

                <div class="mb-4">
                    <h6 class="font-weight-bold text-success">Detalles del Pago</h6>
                    <p><strong>Método de pago:</strong> {{ $pedidos->payment_method }}</p>
                    <p><strong>Estado del pago:</strong> {{ ucfirst($pedidos->payment_status) }}</p>
                </div>

                <hr class="my-4">

                <div class="mb-4">
                    <h6 class="font-weight-bold text-success">Estado del Pedido</h6>
                    <p>{{ ucfirst($pedidos->status) }}</p>
                </div>

                <div class="mb-4">
                    <h6 class="font-weight-bold text-success">Costo Total</h6>
                    <p><strong>${{ number_format($pedidos->total_cost, 2) }}</strong></p>
                </div>

                <hr class="my-4">

                <div>
                    <h6 class="font-weight-bold text-success">Productos Comprados</h6>
                    @foreach($detalles as $detalle)
                        @php
                            $planta = App\Models\Planta::findOrFail($detalle->planta_id);
                        @endphp
                        <div class="row mb-3 align-items-center">
                            <div class="col-md-2 text-center">
                                @if ($planta && $planta->photo)
                                    <img src="{{ asset($planta->photo) }}" alt="Imagen de {{ $planta->name }}" class="img-fluid rounded" style="width: 80px; height: 80px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/default.png') }}" alt="Imagen no disponible" class="img-fluid rounded" style="width: 80px; height: 80px; object-fit: cover;">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <p><strong>Producto:</strong> {{ $planta->name }}</p>
                                <p><strong>Cantidad:</strong> {{ $detalle->amount }}</p>
                                <p><strong>Estado:</strong> {{ ucfirst($detalle->status) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection