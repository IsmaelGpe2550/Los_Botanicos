@extends('layouts.app')

@section('content')
<body class="body-index">
    <h2 class="h2-perfil">Guardados</h2>
    <div class="container my-4">
        <div class="product-row">
            @foreach($plantas as $planta)
                <div class="product-card position-relative">
                    <a href="{{ route('plantas.show', $planta->id) }}" class="text-decoration-none text-dark">
                        <img src="{{ asset($planta->photo) }}" alt="{{ $planta->nombre }}" class="product-image mb-3">
                        <h5 class="product-name">{{ $planta->name }}</h5>
                        <p class="product-price text-success">{{ $planta->price }} USD</p>
                        <p class="product-description">
                            {{ Str::limit($planta->description, 80) }}
                        </p>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="pagination">
            {{ $plantas->links() }}
        </div>
    </div>
</body>
@endsection
