<!-- resources/views/admin/contacts/create.blade.php -->

@extends('layouts.admin')

@section('title', 'Agregar Nuevo Contacto')

@section('content')
<div class="container">
    <h2>Agregar Nuevo Contacto</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('admin.contacts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
            <label for="message">Mensaje:</label>
            <textarea name="message" class="form-control" required>{{ old('message') }}</textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Guardar</button>
    </form>
</div>
@endsection
