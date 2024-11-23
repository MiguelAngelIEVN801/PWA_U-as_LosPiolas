@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Crear Nueva Cita</h2>

    <form method="POST" action="{{ route('admin.citas.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="appointment_time" class="form-label">Fecha y Hora</label>
            <input type="datetime-local" name="appointment_time" id="appointment_time" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Notas</label>
            <textarea name="notes" id="notes" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
