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
            <strong><p>Agrega tu dirección de envío aquí:</p></strong><br>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('validar_direccion') }}" method="POST">
                        @csrf
                        <h3 class="text-center">Datos de Envío</h3>

                        <div class="form-group">
                            <label for="nombre_completo">Nombre Completo:</label>
                            <input type="text" class="form-control" name="nombre_completo" id="nombre_completo" required value="{{ old('nombre_completo') }}">
                            @error('nombre_completo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="direccion">Dirección:</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" required value="{{ old('direccion') }}">
                            @error('direccion')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="colonia">Colonia:</label>
                            <input type="text" class="form-control" name="colonia" id="colonia" required value="{{ old('colonia') }}">
                            @error('colonia')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="ciudad">Ciudad:</label>
                            <input type="text" class="form-control" name="ciudad" id="ciudad" required value="{{ old('ciudad') }}">
                            @error('ciudad')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="estado">Estado:</label>
                            <input type="text" class="form-control" name="estado" id="estado" required value="{{ old('estado') }}">
                            @error('estado')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="codigo_postal">Código Postal:</label>
                            <input type="text" class="form-control" name="codigo_postal" id="codigo_postal" pattern="^\d{5}$" required value="{{ old('codigo_postal') }}">
                            @error('codigo_postal')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="telefono">Teléfono:</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" pattern="^\d{10}$" required value="{{ old('telefono') }}">
                            @error('telefono')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <input type="hidden" name="carrito_id" id="carrito_id" value="{{ $carrito->id }}">

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-25 mt-3">Aceptar</button>
                        </div>
                    </form>
                </div>
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