@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Crear usuario</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('users.store') }}" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre:</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Apellido:</label>
                        <input type="text" name="lastname" class="form-control" id="lastname" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Nombre de usuario:</label>
                        <input type="text" name="username" class="form-control" id="username" required>
                    </div>
                    {{-- contraseña --}}
                    @csrf
                    <button type="submit" class="btn btn-primary">Cargar</button>
                </form>
            </div>
        </div>
    </div>
@endsection