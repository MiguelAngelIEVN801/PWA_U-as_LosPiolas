@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-4 mb-3">Editar Cita</h1>
            <p class="lead text-muted">Actualiza los detalles de la cita a continuación.</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card mb-4">
                <div class="card-header">Editar Cita</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.citas.update', $cita->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $cita->name) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $cita->email) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="appointment_time" class="form-label">Fecha y Hora</label>
                            <input type="datetime-local" name="appointment_time" id="appointment_time" class="form-control" value="{{ old('appointment_time', $cita->appointment_time) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="form-label">Notas</label>
                            <textarea name="notes" id="notes" class="form-control">{{ old('notes', $cita->notes) }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100 mt-3">
                            <i class="bi bi-check-circle me-2"></i>Actualizar Cita
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

