@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Agregar Producto</h1>
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">Precio:</label>
            <input type="number" name="price" class="form-control" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Imagen:</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-success mt-3">Guardar</button>
    </form>
</div>
@endsection
