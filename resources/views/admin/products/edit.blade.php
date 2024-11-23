@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-4 mb-3">Editar Producto</h1>
            <p class="lead text-muted">Actualiza los detalles del producto a continuación.</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre del Producto:</label>
                            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Precio:</label>
                            <input type="number" name="price" class="form-control" step="0.01" value="{{ $product->price }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción:</label>
                            <textarea name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Imagen:</label>
                            <input type="file" name="image" class="form-control">
                            @if($product->image)
                            <div class="mt-2">
                                <label for="current_image">Imagen Actual:</label>
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Imagen actual" style="width: 150px; height: 150px; object-fit: cover;">
                            </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-success w-100 mt-3">
                            <i class="bi bi-check-circle me-2"></i>Actualizar Producto
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
