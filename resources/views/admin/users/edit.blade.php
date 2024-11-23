@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-4 mb-3">Editar Usuario</h1>
            <p class="lead text-muted">Actualiza los detalles del usuario seleccionado.</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre:</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico:</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña:</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmar Contraseña:</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Rol:</label>
                            <select name="role" class="form-control">
                                <option value="Usuario" {{ $user->role == 'Usuario' ? 'selected' : '' }}>Usuario</option>
                                <option value="Administrador" {{ $user->role == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success w-100 mt-3">
                            <i class="bi bi-check-circle me-2"></i>Actualizar Usuario
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
