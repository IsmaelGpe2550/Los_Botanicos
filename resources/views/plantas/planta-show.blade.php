@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col-md-6 d-flex justify-content-center">
            <img src="{{ asset($planta->photo) }}" alt="{{ $planta->nombre }}" class="img-fluid rounded-circle mb-3" style="width: 400px; height: 400px; object-fit: cover;">
        </div>
        <div class="col-md-6">
            <h1>{{ $planta->name }}</h1>
            <p class="text-success h4">{{ $planta->price }} MXN</p>
            <p><strong>Disponibles:</strong> {{ $planta->stock }}</p> 
            <form action="{{ route('carritos.store') }}" method="POST">
                @csrf
                <input type="hidden" name="planta_id" value="{{ $planta->id }}">
                <div class="form-group">
                    <label for="amount">Cantidad:</label>
                    <input type="number" name="amount" id="cantidad" class="form-control" min="1" max="{{ $planta->stock }}" value="1">
                </div>
                <button type="submit" class="btn btn-primary btn-planta mt-2 w-100">Agregar al Carrito</button>
            </form>
            @if(Auth::check())
                <form action="{{ route('guardar') }}" method="POST" class="btn-guardado position-relative">
                    @csrf
                    <input type="hidden" name="planta_id" value="{{ $planta->id }}">
                    <button type="submit" title="Guardar planta" class="btn-guardado">
                        <img src="{{ asset($guardado ? 'images/heart-filled.png' : 'images/heart-icon.png') }}" alt="Guardar" class="heart-icon" id="corazon-{{ $planta->id }}">
                    </button>
                </form>
            @endif
        </div>
    </div>
    <br>
    <br>
    <hr>
    <h3>Descripción</h3>
    <p id="descripcion" class="descripcion">{!! nl2br(e(Str::limit($planta->description, 100))) !!}</p>
    @if (strlen($planta->description) > 100)
        <button id="ver-mas" class="btn btn-link" onclick="mostrarDescripcionCompleta({{ json_encode($planta->description) }})">Ver más</button>
        <button id="ver-menos" class="btn btn-link" onclick="mostrarDescripcionCorta({{ json_encode(Str::limit($planta->description, 100)) }})" style="display: none;">Ver menos</button>
    @endif
    <br>
    <br>
    <hr>
    @if($plantas)
        <h3>Más Productos del mismo vendedor</h3>
        <br>
        <div class="product-row">
            @foreach($plantas as $p)
                <div class="product-card">
                    <a href="{{ route('plantas.show', $p->id) }}" class="text-decoration-none text-dark">
                        <img src="{{ asset($p->photo) }}" alt="{{ $p->nombre }}" class="product-image mb-3">
                        <h5 class="product-name-landing">{{ $p->name }}</h5>
                        <p class="product-price text-success">{{ $p->price }} MXN</p>
                        <p class="product-description">
                            {{ Str::limit($p->description, 80) }}
                        </p>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
    <br>
    <hr>
    <h3>Comentarios</h3>
    @if(Auth::check())
        <br>
        <h4>Agregar un comentario</h4>
        <form action="{{ route('agregar_comentario') }}" method="POST">
            @csrf
            <input type="hidden" name="planta_id" value="{{ $planta->id }}">
            <div class="mb-3">
                <textarea name="contenido" class="form-control" rows="3" placeholder="Escribe tu comentario aquí..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-planta">Agregar Comentario</button>
        </form>
    @endif
    <br>
    <div id="comentarios">
        @if($comentarios->isEmpty())
            <p>No hay comentarios para esta planta.</p>
        @else
            @foreach($comentarios as $comentario)
                <div class="comentario mb-3" style="border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                    <strong>{{ $comentario->user->name }}</strong>
                    @if($comentario->user_id === Auth::id())
                        <form action="{{ route('eliminar_comentario') }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="comentario_id" value="{{ $comentario->id }}">
                            <button type="submit" class="btn btn-link p-0" title="Eliminar comentario">
                                <img src="{{ asset('images/delete-icon.png') }}" alt="Eliminar" style="width: 20px; height: 20px;">
                            </button>
                        </form>
                    @endif
                    <p>{{ $comentario->content }}</p>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection