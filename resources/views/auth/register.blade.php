@extends('layout')

@section('title', 'Sign Up for an Account')

@section('content')
<div class="container" style="
<<<<<<< Updated upstream
    margin-top: 50px;
=======
    margin-top: 0px;
>>>>>>> Stashed changes
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
            <h2 style="color:#292e31">Crear Cuenta</h2>
            <div class="spacer"></div>

            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre y Apellido" required autofocus>
                </div>
                <div class="form-group">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo electrónico" required>
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required>
                </div>
                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmación de contraseña"required>
                </div>
                <div class="login-container">
                    <button type="submit" class="auth-button col-sm-6" >Crear Cuenta</button>
                    <div class="already-have-container">
                        <p><strong>¿Usted ya tiene una cuenta?</strong></p>
                        <a href="{{ route('login') }}">Iniciar Sesión</a>
                    </div>
                </div>

            </form>
        </div>

        <div class="auth-right">
            <h2 style="color:#292e31">Nuevo Cliente</h2>
            <div class="spacer"></div>
            <p><strong>Ahorra tiempo</strong></p>
            <p>Creando una cuenta podras ordenar más rápido en el futuro, facil acceso a tu historial de órdenes.</p>

            <div class="spacer"></div>
            <p><strong>Beneficios</strong></p>
            <p>Podrás recibir promociones de nuestros nuevos productos.</p>
        </div>
    </div> <!-- end auth-pages -->
</div>
@endsection
