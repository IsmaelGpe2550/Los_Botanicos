@extends('layouts.app')

@section('content')
    @if($CarritoUsuarioGlobal && count($detalles) > 0)
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Resumen de Carrito de Compras</h2>
            </div>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Foto de la planta</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
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
                            <td>${{ number_format($detalle->planta->price, 2) }}</td>
                            <td>{{ $detalle->amount }}</td>
                            <td>${{ number_format($detalle->planta->price * $detalle->amount, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-between">
                <h4>Total: ${{ number_format($carrito->total_cost, 2) }}</h4><br><br>
            </div>
            <strong><p>Detalles de envío:</p></strong><br>
            <div class="card mb-4">
                <div class="card-body">
                    <p><strong>Nombre Completo:</strong> {{ $datos['nombre_completo'] }}</p>
                    <p><strong>Dirección:</strong> {{ $datos['direccion'] }}</p>
                    <p><strong>Colonia:</strong> {{ $datos['colonia'] }}</p>
                    <p><strong>Ciudad:</strong> {{ $datos['ciudad'] }}</p>
                    <p><strong>Estado:</strong> {{ $datos['estado'] }}</p>
                    <p><strong>Código Postal:</strong> {{ $datos['codigo_postal'] }}</p>
                    <p><strong>Teléfono:</strong> {{ $datos['telefono'] }}</p>
                </div>
            </div>
            <strong><p>Paga aqui tu pedido:</p></strong><br>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div id="paypal-button-container" style="width: 300px; max-width: 100%;"></div>
        </div>
        <form id="payment-form" method="POST" action="{{ route('pedidos.store') }}" style="display: none;">
            @csrf
            <input type="hidden" name="carrito_id" value="{{ $carrito->id }}">
            <input type="hidden" name="nombre_completo" value="{{ $datos['nombre_completo'] }}">
            <input type="hidden" name="direccion" value="{{ $datos['direccion'] }}">
            <input type="hidden" name="colonia" value="{{ $datos['colonia'] }}">
            <input type="hidden" name="ciudad" value="{{ $datos['ciudad'] }}">
            <input type="hidden" name="estado" value="{{ $datos['estado'] }}">
            <input type="hidden" name="codigo_postal" value="{{ $datos['codigo_postal'] }}">
            <input type="hidden" name="telefono" value="{{ $datos['telefono'] }}">
        </form>
    @else
        <div class="text-center">
            <h2>No hay nada en el carrito</h2>
            <br>
            <img class="sin-carrito" src="{{ asset('images/sin-carrito.png') }}" alt="No hay un carrito aún">
        </div>
    @endif

    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID') }}&currency=MXN&locale=es_MX"></script>
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    application_context: {
                        shipping_preference: "NO_SHIPPING"
                    },
                    purchase_units: [{
                        amount: {
                            value: '{{ $carrito->total_cost }}',
                            currency_code: 'MXN'
                        }
                    }]
                });
            },

            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    document.getElementById('payment-form').submit();
                });
            },

            onError: function(err) {
                alert('No se pudo realizar el pago. Intenta de nuevo.');
            }
        }).render('#paypal-button-container');
    </script>
@endsection