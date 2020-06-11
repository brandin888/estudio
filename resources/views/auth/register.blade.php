@extends('layout')

@section('title', 'Sign Up for an Account')

@section('content')
<div class="container" style="
    margin-top: 100px;
">
    <div class="auth-pages">
        <div>
            @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
            @endif @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <h2>Crear Cuenta</h2>
            <div class="spacer"></div>

            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>

                <input id="password" type="password" class="form-control" name="password" placeholder="Password" placeholder="Password" required>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password"
                    required>

                <div class="login-container">
                    <button type="submit" class="auth-button">Crear Cuenta</button>
                    <div class="already-have-container">
                        <p><strong>¿Usted ya tiene una cuenta?</strong></p>
                        <a href="{{ route('login') }}">Iniciar Sesión</a>
                    </div>
                </div>

            </form>
        </div>

        <div class="auth-right">
            <h2>Nuevo Cliente</h2>
            <div class="spacer"></div>
            <p><strong>Ahorra tiempo.</strong></p>
            <p>Creando una cuenta podras ordenar más rápido en el futuro, facil acceso a tu historial de órdenes.</p>

            &nbsp;
            <div class="spacer"></div>
            <p><strong>Beneficios</strong></p>
            <p>Podrás recibir promociones de nuestros nuevos productos.</p>
        </div>
    </div> <!-- end auth-pages -->
</div>
@endsection
