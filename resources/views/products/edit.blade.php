@extends('layouts.footer')
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Editar producto</h1>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('products.update', $product) }}" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre:</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $product->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Descripcion:</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control" required>{{ old('content', $product->content) }}</textarea>
                    </div>
                    <div class="mb-3 input-group">
                        <label class="input-group-text" for="main_image">Imagen Principal</label>
                        <input type="file" name="main_image" class="form-control" id="main_image">
                    </div> {{-- No se si cambia la foto --}}
                    <div class="mb-3">
                        <label for="price" class="form-label">Precio:</label>
                        <input type="number" name="price" class="form-control" id="price" value="{{ old('price', $product->price) }}" required>
                    </div>
                    <div class="mb-3">
                        <select name="category_id" id="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>{{ $category->name }} -
                                    {{ $category->id }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary">Agregar cambios</button>
                </form>
            </div>
        </div>
    </div>
@endsection
