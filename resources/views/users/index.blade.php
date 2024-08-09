@extends('layouts.footer')
@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="row">
            <div class="col-12">
                <h1>Lista de usuarios</h1>
                <h2>{{ auth()->user()->name }}</h2>
                <div>
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Agregar usuario</a>
                </div>
                <ul>
                    @foreach ($users as $user)
                        <li>{{ $user->name }} - {{ $user->email }} - {{ $user->role }}
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                                <button type="submit" class="btn btn-danger">Borrar</button>
                                @csrf
                                @method('DELETE')
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
        {{ $users->links() }}
    </div>
@endsection
