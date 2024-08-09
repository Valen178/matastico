@extends('layouts.footer2')
@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="titulo">Checkout</h1>
            @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
            @endif
        </div>
        @if ($order)
            <h2 class="subtitulo-carrito">Numero de orden: {{ $order->id }}</h2>
            <h2 class="subtitulo-carrito">Total: {{ $order->total }}</h2>
            <h3 class="subtitulo-carrito">Productos</h3>
            <ul class="ul-productos">
                @foreach (json_decode($order->products) as $product )
                    <li class="li-productos">{{ $product->name }} ${{ $product->price }}
                        @if (auth()->check())
                            <a href="{{ route('product.remove', $product->id) }}" class="a-productos">Eliminar</a>
                        @endif
                    </li>
                @endforeach
            </ul>
        @else
            <h2>El carrito se encuentra vacio.</h2>
        @endif
    </div>
</div>

@endsection