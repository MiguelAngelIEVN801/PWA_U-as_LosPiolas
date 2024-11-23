<!-- resources/views/admin/contacts/edit.blade.php -->

@extends('layouts.admin')

@section('title', 'Editar Contacto')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-4 mb-3">Editar Contacto</h1>
            <p class="lead text-muted">Actualiza los detalles del contacto a continuación.</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card mb-4">
                <div class="card-header">Editar Contacto</div>
                <div class="card-body">
                    <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $contact->name) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $contact->email) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Mensaje</label>
                            <textarea name="message" id="message" rows="3" class="form-control" required>{{ old('message', $contact->message) }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100 mt-3">
                            <i class="bi bi-check-circle me-2"></i>Actualizar Contacto
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
