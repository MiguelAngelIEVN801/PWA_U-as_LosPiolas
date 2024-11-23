<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <!-- Encabezado -->
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-4 mb-4">Bienvenido al Panel de Administración</h1>
            <p class="lead">Gestiona eficientemente los recursos de tu aplicación desde un solo lugar.</p>
        </div>
    </div>

    <!-- Tarjetas de Resumen -->
    <div class="row mt-5">
        <!-- Productos -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0">
                <div class="card-body text-center">
                    <div class="icon mb-3" style="font-size: 50px; color: #007bff;">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <h5 class="card-title">Productos</h5>
                    <p class="card-text">Gestiona todos los productos de la tienda.</p>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-primary btn-sm">Ver Productos</a>
                </div>
            </div>
        </div>

        <!-- Usuarios -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0">
                <div class="card-body text-center">
                    <div class="icon mb-3" style="font-size: 50px; color: #007bff;">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h5 class="card-title">Usuarios</h5>
                    <p class="card-text">Gestiona los usuarios registrados.</p>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-sm">Ver Usuarios</a>
                </div>
            </div>
        </div>

        <!-- Mensajes de Contacto -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0">
                <div class="card-body text-center">
                    <div class="icon mb-3" style="font-size: 50px; color: #007bff;">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <h5 class="card-title">Mensajes de Contacto</h5>
                    <p class="card-text">Administra los mensajes recibidos.</p>
                    <a href="{{ route('admin.contacts.index') }}" class="btn btn-primary btn-sm">Ver Mensajes</a>
                </div>
            </div>
        </div>

        <!-- Citas Agendadas -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0">
                <div class="card-body text-center">
                    <div class="icon mb-3" style="font-size: 50px; color: #007bff;">
                        <i class="bi bi-calendar-check-fill"></i>
                    </div>
                    <h5 class="card-title">Citas Agendadas</h5>
                    <p class="card-text">Administra las citas de los clientes.</p>
                    <a href="{{ route('admin.citas.index') }}" class="btn btn-primary btn-sm">Ver Citas</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
