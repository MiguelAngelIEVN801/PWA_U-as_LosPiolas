<!-- resources/views/admin/users/create.blade.php -->

@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Agregar Nuevo Usuario</h2>
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="role">Rol:</label>
            <select name="role" class="form-control">
                <option value="Usuario">Usuario</option>
                <option value="Administrador">Administrador</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3">Guardar</button>
    </form>
</div>
@endsection
