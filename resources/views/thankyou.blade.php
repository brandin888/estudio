@extends('layout')

@section('title', 'Thank You')

@section('extra-css')

@endsection

@section('body-class', 'sticky-footer')

@section('content')

   <div class="thank-you-section">
        <h1>¡Gracias por <br> Su pedido!</h1>
       <p>Un correo de confirmación fue enviado</p>

        @guest
 
		@else
			<p>Puede revisar el estado de su pedido en el siguiente enlace:</p>
 			 <a href="{{ url('/my-orders') }}" class="button">Mis órdenes</a>
		@endauth
       <div class="spacer"></div>
       <div>
           <a href="{{ url('/') }}" class="button">Inicio</a>
       </div>
   </div>




@endsection
