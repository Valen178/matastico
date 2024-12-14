@extends('layouts.footer')
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Productos</h1>
            <h2>{{ auth()->user()->name }}</h2>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div>
                <a href="{{ route('products.create') }}" class="btn btn-primary">Agregar un producto</a>
            </div>
            <ul>
                @foreach ($products as $product)
                    <li>{{ $product->name }}
                        @if ($product->main_image)
                            <img width="50" src="{{ asset('storage/'.$product->main_image) }}" alt="{{ $product->name }}">
                        @else
                            <img width="50" src="{{ asset('assets/img/No-Image-Placeholder.svg') }}" alt="sin imagen">
                        @endif
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    {{ $products->links() }}
</div>
@endsection
