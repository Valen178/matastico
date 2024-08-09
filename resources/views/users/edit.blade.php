@extends('layouts.footer')
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Editar Usuario</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('users.update', $user) }}" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $user->name) }}">
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Apellido:</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" value="{{ old('last_name', $user->last_name) }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $user->email) }}">
                </div>
                <div class="mb-3">
                    <label for="user_name" class="form-label">Nombre de usuario:</label>
                    <input type="text" name="user_name" class="form-control" id="user_name" value="{{ old('user_name', $user->user_name) }}">
                </div>
                {{-- contraseña --}}
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
