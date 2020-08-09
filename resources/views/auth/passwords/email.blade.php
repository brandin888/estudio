@extends('layout')
@section('title', 'Reset Password')
@section('content')
<div class="container">
    <div class="auth-pages">
        <div class="auth-left">
            @if (session()->has('status'))
            <div class="alert alert-success">
                {{ session()->get('status') }}
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
            <h2 style="color:#171260">¿Olvidó su contraseña?</h2>
            <div class="spacer"></div>
            <form action="{{ route('password.email') }}" method="POST">
                {{ csrf_field() }}
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Correo electrónico" required autofocus>
                <div class="spacer"></div>
                <div class="login-container">
                    <button type="submit" class="auth-button">Enviar enlace</button>
                </div>


            </form>
        </div>
        <div class="auth-right">
            <h2 style="color:#212529">Información de pérdida de contraseña</h2>
            <div class="spacer"></div>
            <p style="color:#212529">Se enviará un mensaje a su correo electrónico.</p>
            <div class="spacer"></div>
            <p style="color:#212529">De esta forma podra recuperar su contraseña.</p>
        </div>
    </div>
</div>
@endsection

