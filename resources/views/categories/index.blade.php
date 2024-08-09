@extends('layouts.footer')
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Categorias</h1>
            <h2>{{ auth()->user()->name }}</h2>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div>
                <a href="{{ route('categories.create') }}" class="btn btn-primary">Agregar una categoria</a>
            </div>
            <ul>
                @foreach ($categories as $category)
                <li>{{ $category->name }}
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Editar</a>
                        <button type="submit" class="btn btn-danger">Borrar</button>
                        @csrf
                        @method('DELETE')
                    </form>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    {{ $categories->links() }}
</div>
@endsection
