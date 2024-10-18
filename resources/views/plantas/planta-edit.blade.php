@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Planta</h1>
        
        <form action="{{ route('plantas.update', $planta->id) }}" method="POST" enctype="multipart/form-data" class="mb-3">
            @csrf
            @method('PUT')
            <div class="form-group text-center">
                <label for="profile_photo">Foto de la planta:</label>
                <div class="mb-2">
                    <img id="preview-profile-photo" src="{{ asset($planta->photo) }}" alt="Imagen de la planta" class="img-fluid rounded-circle" style="width: 300px; height: auto;">
                </div>
                <div class="text-center">
                    <label class="btn btn-warning" for="photo">Seleccionar Archivo</label>
                    <input type="file" class="form-control-file" id="photo" name="photo" style="display: none;" onchange="previewImage(event)" required>
                    @error('photo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="name">Nombre</label >
                <input type="text" class="form-control" name="name" id="name" value="{{ $planta->name }}" required>
                @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $planta->description }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" class="form-control" name="price" id="price" value="{{ $planta->price }}" step="0.01" required>
                @error('precio')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" name="stock" id="stock" value="{{ $planta->stock }}" required>
                @error('stock')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Planta</button>
        </form>
    </div>
@endsection
