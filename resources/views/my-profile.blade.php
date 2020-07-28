@extends('layout')

@section('title', 'My Profile')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@endsection

@section('content')

   

    <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="products-section container d-md-flex">
        <div class="sidebar col-12 col-md-2 mr-5">
            <ul>
                <li>
                    <a href="{{ route('users.edit') }}" class="d-flex">
                        <div style="width:25px" class="text-center">
                            <i class="far fa-user"></i>
                        </div>
                        Mi Perfil
                    </a>
                </li>
                <li class="active">
                    <a href="{{ route('orders.index') }}" class="d-flex">
                        <div style="width:25px" class="text-center">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        Mis Órdenes
                    </a>
                </li>
            </ul>
        </div> <!-- end sidebar -->
        <div class="my-profile bg-white col-12 col-md-10">
            <div class="products-header">
                <h1 class="stylish-heading mb-4">Mi Perfil</h1>
            </div>

            <div>
                <form action="{{ route('users.update') }}" method="POST">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <input class="form-control" id="name" type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="email" type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Email" required>
                        <span class="badge" style="font-size:14px">Dejar en blanco si no quiere cambiar la contraseña</span>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="password" type="password" name="password" placeholder="Contraseña">
                        
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="password-confirm" type="password" name="password_confirmation" placeholder="Confirmar Contraseña">
                    </div>
                    <div>
                        <button type="submit" class="my-profile-button">Actualizar Perfil</button>
                    </div>
                </form>
            </div>

            <div class="spacer"></div>
        </div>
    </div>

@endsection

@section('extra-js')
    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection
