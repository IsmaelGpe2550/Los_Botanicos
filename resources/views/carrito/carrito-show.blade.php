@extends('layouts.app')

@section('content')
    @if($CarritoUsuarioGlobal)
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Carrito de Compras</h2>
            </div>
            <p>
                Los productos en el carrito se mantendrán durante 24 horas. 
                ¡Guárdalos si quieres comprarlos más tarde!
            </p>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Foto de la planta</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Disponibles</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalles as $detalle)
                        <tr>
                            <td>
                                <a href="{{ route('plantas.show', $detalle->planta->id) }}">
                                    <img src="{{ asset($detalle->planta->photo) }}" alt="{{ $detalle->planta->name }}" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                                </a>
                            </td>
                            <td>{{ $detalle->planta->name }}</td>
                            <td>${{ $detalle->planta->price }}</td>
                            <td>{{ $detalle->planta->stock }}</td>
                            <td>
                            <form action="{{ route('detalles_carritos.update', $detalle->id) }}" method="POST" class="d-flex">
                                @csrf
                                @method('PUT')
                                @php
                                    $availableStock = $detalle->planta->stock + $detalle->amount;
                                @endphp
                                <input type="number" name="amount" value="{{ $detalle->amount }}" min="1" class="form-control me-2" max="{{ $availableStock }}" style="width: 60px;">
                                <button type="submit" class="btn btn-success btn-sm">Actualizar</button>
                            </form>
                            </td>
                            <td>${{ $detalle->planta->price * $detalle->amount }}</td>
                            <td>
                                <form action="{{ route('detalles_carritos.destroy', $detalle->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-between">
                <h4>Total: ${{ $carrito->total_cost }}</h4>
                <a href="{{ route('detalles_carritos.index') }}" class="btn btn-primary">Comprar Carrito</a>
            </div>
        </div>
    @else
        <div class="text-center">
            <h2>No hay nada en el carrito</h2>
            <br>
            <img class="sin-carrito" src="{{ asset('images/sin-carrito.png') }}" alt="No hay un carrito aún">
        </div>
    @endif 
@endsection