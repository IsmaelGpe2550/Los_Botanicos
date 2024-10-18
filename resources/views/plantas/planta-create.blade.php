@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Añadir Nueva Planta</h1>
        <form action="{{ route('plantas.store') }}" method="POST" enctype="multipart/form-data" class="mb-3">
            @csrf

            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea class="form-control" id="description" name="description" rows="4">{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                    <label for="price">Precio</label>
                    <input type="number" class="form-control" name="price" id="price" step="0.01" value="{{ old('price') }}" required>
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>

            <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" name="stock" id="stock" value="{{ old('stock') }}" required>
                    @error('stock')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>

            <div class="form-group text-center">
                <label for="profile_photo">Imagen</label>
                <div class="text-center">
                    <label class="btn btn-warning" for="photo">Seleccionar Archivo</label>
                    <input type="file" class="form-control-file" id="photo" name="photo" style="display: none;" onchange="previewImage(event)">
                    @error('photo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Contenedor solo para los botones -->
            <div class="text-center">
                <button type="submit" class="btn btn-success w-25 me-2">Guardar Cambios</button>
            </div>
        </form> 
    </div>
@endsection
