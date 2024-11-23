@extends('layouts.admin')

@section('content')
<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="card shadow-lg" style="width: 100%; max-width: 450px;">
        <div class="card-header text-center bg-primary text-white">
            <h4 class="mb-0">{{ __('Iniciar Sesión') }}</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="form-label">{{ __('Correo Electrónico') }}</label>
                    <input id="email" type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}"
                           required autocomplete="email" autofocus>
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
                           name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                           {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Recuérdame') }}
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-box-arrow-in-right me-1"></i> {{ __('Ingresar') }}
                    </button>
                </div>

                <!-- Forgot Password -->
                <div class="text-center mt-3">
                    @if (Route::has('password.request'))
                        <a class="text-decoration-none" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
