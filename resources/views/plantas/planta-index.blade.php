@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Lista de Plantas</h1>
        <a href="{{ route('plantas.create') }}" class="btn btn-primary">Añadir nueva planta</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <!-- Eliminamos la columna ID -->
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
                        <!-- Imagen de la planta, con un enlace a la vista show -->
                        <td>
                            <a href="{{ route('plantas.show', $planta->id) }}">
                                <img src="{{ asset($planta->photo) }}" alt="{{ $planta->name }}" width="100" height="100">
                            </a>
                        </td>

                        <!-- Nombre de la planta -->
                        <td>{{ $planta->name }}</td>

                        <!-- Precio de la planta -->
                        <td>${{ $planta->price }}</td>

                        <!-- Stock disponible -->
                        <td>{{ $planta->stock }}</td>

                        <!-- Botones para editar y eliminar -->
                        <td>
                            <a href="{{ route('plantas.edit', $planta->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('plantas.destroy', $planta->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
