@extends('layouts.footer')
@extends('layouts.main')

@section('content')

<div class="container container-main">
    <div class="row">
        <div class="col-12">
            <div id="div-banner-mate">
                <img src="{{ asset('img/banner-mate.jpeg') }}" alt="banner mate" class="img-fluid imagen">
            </div>
            <h1 class="subtitulo">LO MÁS VENDIDO</h1>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <ul>
            @foreach ($products->chunk(4) as $chunk)
                <div class="card-group">
                    @foreach($chunk as $product)
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="card">
                                <img src="{{ asset('storage/'.$product->main_image) }}" class="card-img-top" alt="Product image" height="319" width="319">                      
                                <div class="card-block">
                                    <h4 class="card-title centrado nombre-productos">{{ $product->name }}</h4>
                                    <p class="card-text centrado">${{ $product->price }}</p>
                                    <div class="div-agregar-productos">
                                        <a href="{{ route('product.add', $product) }}" class="boton-agregar-carrito">Agregar al carrito</a>
                                    </div>   
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @break
            @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection