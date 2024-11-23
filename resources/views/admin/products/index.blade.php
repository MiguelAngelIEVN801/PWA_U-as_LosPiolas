@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-4 mb-2">Gestión de Productos</h1>
            <p class="lead text-muted">Aquí puedes gestionar los productos registrados en la tienda.</p>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-lg">
                <i class="bi bi-plus-circle me-2"></i>Agregar Nuevo Producto
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Descripción</th>
                                <th>Imagen</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>${{ number_format($product->price, 2) }}</td>
                                <td>{{ Str::limit($product->description, 50) }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="Imagen de {{ $product->name }}" style="width: 60px; height: 60px; object-fit: cover;">
                                </td>
                                <td>
                                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square me-1"></i>Editar
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">
                                            <i class="bi bi-trash me-1"></i>Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
