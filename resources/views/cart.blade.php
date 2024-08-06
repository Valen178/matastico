@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-test" >Checkout</h1>
            @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
            @endif
        </div>
        @if ($order)
            <h2>Numero de orden: {{ $order->id }}</h2>
            <h2>Total: {{ $order->total }}</h2>
            <h3>Productos</h3>
            <ul>
                @foreach (json_decode($order->products) as $product )
                    <li>{{ $product->name }} ${{ $product->price }}
                        @if (auth()->check())
                            <a href="{{ route('product.remove', $product->id) }}">Eliminar</a>
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