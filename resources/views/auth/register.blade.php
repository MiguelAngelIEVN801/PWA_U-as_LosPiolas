@extends('layouts.admin')

@section('content')
<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="card shadow-lg" style="width: 100%; max-width: 450px;">
        <div class="card-header text-center bg-success text-white">
            <h4 class="mb-0">{{ __('Registrar Cuenta') }}</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="form-label">{{ __('Nombre Completo') }}</label>
                    <input id="name" type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           name="name" value="{{ old('name') }}"
                           required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="form-label">{{ __('Correo Electrónico') }}</label>
                    <input id="email" type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}"
                           required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Password Confirmation -->
                <div class="mb-4">
                    <label for="password-confirm" class="form-label">{{ __('Confirmar Contraseña') }}</label>
                    <input id="password-confirm" type="password"
                           class="form-control" name="password_confirmation"
                           required autocomplete="new-password">
                </div>

                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-person-plus me-1"></i> {{ __('Registrar') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
