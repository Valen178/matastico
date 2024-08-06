@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-test">Productos</h1>
            @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
            @endif
        </div>
        <ul>
            @foreach ($products->chunk(4) as $chunk)
                <div class="card-group">
                    @foreach($chunk as $product)
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="card">
                                <img src="{{ $product->main_image }}" class="card-img-top" alt="Product image" height="319" width="319">                      
                                <div class="card-block">
                                    <h4 class="card-title">{{ $product->name }}</h4>
                                    <p class="card-text">${{ $product->price }}</p>
                                    @if (auth()->check())
                                        <a href="{{ route('product.add', $product) }}" class="btn btn-success">Agregar al carrito</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </ul>
    </div>
</div>

@endsection