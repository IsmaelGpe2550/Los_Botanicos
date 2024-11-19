@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Mis Productos</h2>
            <a href="{{ route('plantas.create') }}" class="btn button-primary">Añadir nuevo producto</a>
        </div>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plantas as $planta)
                    <tr>
                        <td>
                            <a href="{{ route('plantas.show', $planta->id) }}">
                                <img src="{{ asset($planta->photo) }}" alt="{{ $planta->name }}" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                            </a>
                        </td>
                        <td>{{ $planta->name }}</td>
                        <td>${{ $planta->price }}</td>
                        <td>{{ $planta->stock }}</td>
                        <td>
                            <div class="d-flex flex-column">
                                <a href="{{ route('plantas.edit', $planta->id) }}" class="btn btn-warning btn-sm w-100 mb-1">Editar</a>
                                <form action="{{ route('plantas.destroy', $planta->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm w-100">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
