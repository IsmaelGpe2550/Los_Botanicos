@extends('layouts.app')

@section('content')
    <div class="container py-5">
        @if (isset($venta) && isset($usuario) && isset($pedido))
            <div class="card shadow-sm mb-4">
                <div class="card-header" style="background-color: #28a745; color: white;">
                    <h5 class="mb-0" style="background-color: #28a745; color: white;">Detalles de venta - Pedido #{{ $venta->pedido->id }}</h5>
                    <small>{{ $venta->pedido->created_at->format('d/m/Y') }}</small>
                </div>
                <div class="card-body">
                    <!-- Datos del Comprador -->
                    <div class="mb-4">
                        <h6 class="font-weight-bold text-success">Datos del Comprador</h6>
                        <p><strong>Nombre:</strong> {{ $usuario->name }}</p>
                        <p><strong>Dirección:</strong> {{ $pedido->shipping_address }}</p>
                        <p><strong>Ciudad/Estado:</strong> {{ $pedido->city }} - {{ $pedido->state }}</p>
                        <p><strong>Código Postal:</strong> {{ $pedido->postal_code }}</p>
                        <p><strong>Teléfono:</strong> {{ $pedido->phone }}</p>
                        <p><strong>Correo:</strong> {{ $usuario->email }}</p>
                    </div>

                    <hr class="my-4">

                    <!-- Detalles del Pago -->
                    <div class="mb-4">
                        <h6 class="font-weight-bold text-success">Detalles del Pago</h6>
                        <p><strong>Método de pago:</strong> {{ $pedido->payment_method }}</p>
                        <p><strong>Estado del pago:</strong> {{ ucfirst($pedido->payment_status) }}</p>
                    </div>

                    <hr class="my-4">

                    <!-- Estado del Pedido -->
                    <div class="mb-4">
                        <h6 class="font-weight-bold text-success">Estado del Pedido</h6>
                        <p>{{ ucfirst($pedido->status) }}</p>
                    </div>

                    <div class="mb-4">
                        <h6 class="font-weight-bold text-success">Costo Total</h6>
                        <p><strong>${{ number_format($pedido->total_cost, 2) }}</strong></p>
                    </div>

                    <hr class="my-4">

                    <!-- Detalles del Producto -->
                    <div>
                        <h6 class="font-weight-bold text-success">Producto Comprado</h6>
                        @php
                            $planta = $venta->planta;
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
                                <p><strong>Cantidad:</strong> {{ $venta->amount }}</p>
                                <p><strong>Estado:</strong> {{ ucfirst($venta->status) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-danger">
                <strong>Error:</strong> No se pudo encontrar la venta, el pedido o el usuario. Por favor, intente nuevamente.
            </div>
        @endif
    </div>
@endsection