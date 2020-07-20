@extends('layout')

@section('title', 'My Orders')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
    <style>
#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 2; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform: scale(0.1)} 
  to {transform: scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 100px;
  right: 35px;
  color: #000000;;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
  z-index: 4;
  opacity: 1;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
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

    <div class="products-section my-orders container">
        <div class="sidebar">
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
        <div class="my-profile">
            <div class="products-header">
                <h1 class="stylish-heading mb-4">Mis Órdenes</h1>
            </div>

            <div>
                @foreach ($orders as $order)
                <div class="order-container">
                    <div class="order-header">
                            <table class="w-100">
                                <tbody>
                                    <tr class="d-flex justify-content-between align-items-center">
                                        <td>
                                        <div>
                                            <div class="uppercase font-bold">Fecha</div>
                                            <div>{{ presentDate($order->created_at) }}</div>
                                        </div>
                                        </td>
                                        <td>
                                        <div>
                                            <div class="uppercase font-bold">Id de Orden</div>
                                            <div>{{ $order->id }}</div>
                                        </div>
                                        </td>
                                        <td>
                                        <div>
                                            <div class="uppercase font-bold">Total</div>
                                            <div>{{ presentPrice($order->billing_total) }}</div>
                                        </div>
                                        </td>
                                        <td>
                                        <div class="uppercase font-bold">Estado</div>
                                        @if($order->shipped==1)
                                            <div class="uppercase font-bold" style="color: #008f39">Enviado</div>
                                        @else 
                                            <div class="uppercase font-bold" style="color: #cb3234">No Enviado</div>
                                        @endif
                                        </td>
                                        <td>
                                            <strong>
                                                <a href="{{ route('orders.show', $order->id) }}">
                                                    Detalle de orden
                                                    <i class="fas fa-arrow-alt-circle-right"></i>
                                                </a>
                                            </strong>
                                        </td>

                                    </tr>
                                    </tr>
                                </tbody>
                            </table>
                        <div>
                            @if(isset($order->imagen_factura))
                                <div class="order-header-items">
                                <div><img id="myImg" width="100" height="100" src="{{ orderImage($order->imagen_factura) }}" alt="Comprobante de Pago"></div>
                                <div id="myModal" class="modal">
                                  <span class="close">&times;</span>
                                  <img class="modal-content" id="img01">
                                  <div id="caption"></div>
                                </div>
                                
                                </div>

                            @else
                             
                            @endif
                            


                        </div>
                    </div>
                    <div class="order-products">
                        @foreach ($order->products as $product)
                            <div class="order-product-item">
                                <div><img src="{{ productImage($product->image) }}" alt="Product Image"></div>
                                <div>
                                    <div>
                                        <a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                                    </div>
                                    <div>Precio por caja : {{ $product->presentPrice() }}</div>
                                    <div>Cantidad de cajas: {{ $product->pivot->quantity }}</div>
                                    <div>Unidades por caja: {{ $product->cantidad_caja }}</div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div> <!-- end order-container -->
                @endforeach
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
    <script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
      modal.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
      modal.style.display = "none";
    }
    </script>
@endsection
