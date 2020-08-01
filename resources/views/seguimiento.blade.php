
<style type="text/css">
    
    
    .blue {
  background-color: #2196F3 !important;
}

.blue-text {
  color: #2196F3 !important;
}

.blue.lighten-5 {
  background-color: #E3F2FD !important;
}

.blue-text.text-lighten-5 {
  color: #E3F2FD !important;
}

.blue.lighten-4 {
  background-color: #BBDEFB !important;
}

.blue-text.text-lighten-4 {
  color: #BBDEFB !important;
}

.blue.lighten-3 {
  background-color: #90CAF9 !important;
}

.blue-text.text-lighten-3 {
  color: #90CAF9 !important;
}

.blue.lighten-2 {
  background-color: #64B5F6 !important;
}

.blue-text.text-lighten-2 {
  color: #64B5F6 !important;
}

.blue.lighten-1 {
  background-color: #42A5F5 !important;
}

.blue-text.text-lighten-1 {
  color: #42A5F5 !important;
}

.blue.darken-1 {
  background-color: #1E88E5 !important;
}

.blue-text.text-darken-1 {
  color: #1E88E5 !important;
}

.blue.darken-2 {
  background-color: #1976D2 !important;
}

.blue-text.text-darken-2 {
  color: #1976D2 !important;
}

.blue.darken-3 {
  background-color: #1565C0 !important;
}

.blue-text.text-darken-3 {
  color: #1565C0 !important;
}

.blue.darken-4 {
  background-color: #0D47A1 !important;
}

.blue-text.text-darken-4 {
  color: #0D47A1 !important;
}

.blue.accent-1 {
  background-color: #82B1FF !important;
}

.blue-text.text-accent-1 {
  color: #82B1FF !important;
}

.blue.accent-2 {
  background-color: #448AFF !important;
}

.blue-text.text-accent-2 {
  color: #448AFF !important;
}

.blue.accent-3 {
  background-color: #2979FF !important;
}

.blue-text.text-accent-3 {
  color: #2979FF !important;
}

.blue.accent-4 {
  background-color: #2962FF !important;
}

.blue-text.text-accent-4 {
  color: #2962FF !important;
}

.light-blue {
  background-color: #03a9f4 !important;
}

.light-blue-text {
  color: #03a9f4 !important;
}

.light-blue.lighten-5 {
  background-color: #e1f5fe !important;
}

.light-blue-text.text-lighten-5 {
  color: #e1f5fe !important;
}

.light-blue.lighten-4 {
  background-color: #b3e5fc !important;
}

.light-blue-text.text-lighten-4 {
  color: #b3e5fc !important;
}

.light-blue.lighten-3 {
  background-color: #81d4fa !important;
}

.light-blue-text.text-lighten-3 {
  color: #81d4fa !important;
}

.light-blue.lighten-2 {
  background-color: #4fc3f7 !important;
}

.light-blue-text.text-lighten-2 {
  color: #4fc3f7 !important;
}

.light-blue.lighten-1 {
  background-color: #29b6f6 !important;
}

.light-blue-text.text-lighten-1 {
  color: #29b6f6 !important;
}

</style>


@extends('layout')

@section('title', 'Login')

@section('content')
<div class="container" style="
    margin-top: 100px;
">
    <div class="auth-pages">
        <div class="auth-left">
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
            
            <h2 style="color:#171260">Seguimiento de mi compra</h2>
            <div class="spacer"></div>

            <form action="{{ route('seguimiento.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                  <input class="form-control" type="email" id="email" name="email" value="" placeholder="Email" required autofocus>
                </div>
                <div class="form-group">
                  <input class="form-control" type="number" id="order" name="order" value="" placeholder="Número de orden" required>
                </div>

                <div class="login-container">
                    <button type="submit" class="auth-button ">Buscar mi orden</button>
                    
                </div>

                <div class="spacer"></div>

                

            </form>
        </div>

        <div class="auth-right">
            <h2  style="color:#171260">¿Cómo puedo seguir mi órden?</h2>
            <div class="spacer"></div>
            <p><strong>Ingresa tu email con el que realizaste la compra.</strong></p>
            <p>El número de órden se enviará al email, Ingresa tu número de órden .</p>         
            <p>Descubre el estado de tu compra!!!.</p>
            <p>Podrás ver el resumen de tu pedido!!!.</p>
           

        </div>
    </div>
</div>
@endsection
