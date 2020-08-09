@extends('layout')

@section('title', 'My Order')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
   
@endsection

@section('content')
 <style type="text/css">
        #action-parallax4 {
    background-image: url(../img/parallax/parallax2.jpg);
}
    </style>

    

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

    <div class="products-section my-orders container d-md-flex">
        <div class="sidebar col-12 col-md-2 mr-5">
            <ul>
                <li>
                    <a class="d-flex" href="{{ route('users.edit') }}">
                        <div style="width:25px" class="text-center">
                        <i class="far fa-user"></i>
                        </div>
                        Mi Perfil
                    </a>
                </li>
                <li class="active">
                    <a class="d-flex" href="{{ route('orders.index') }}">
                        <div style="width:25px" class="text-center">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        Mis Órdenes
                    </a>
                </li>
            </ul>
        </div> <!-- end sidebar -->
        <div class="my-profile col-12 col-md-10">
            <div class="products-header">
                <h1 class="stylish-heading mb-4">N° de Orden: {{ $order->id }}</h1>
            </div>

            <div>
                <div class="order-container mb-3">
                    <div class="order-header text-white" style="background-color:#353535">
                        <div class="order-header-items">
                            <div>
                                <div class="uppercase font-bold">Fecha de la Orden</div>
                                <div>{{ presentDate($order->created_at) }}</div>
                            </div>
                            <div>
                                <div class="uppercase font-bold">ID de la Orden</div>
                                <div>{{ $order->id }}</div>
                            </div>
                            <div>
                                <div class="uppercase font-bold">Total</div>
                                <div>{{ presentPrice($order->billing_total) }}</div>
                            </div>
                        </div>
                        <div>
                            
                        </div>
                    </div>
                    <div class="order-products">
                        <table class="table" style="width:50%">
                            <tbody>
                                <tr>
                                    <td>Nombre</td>
                                    <td>{{ $order->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Dirección</td>
                                    <td>{{ $order->billing_address }}</td>
                                </tr>
                                <tr>
                                    <td>Ciudad</td>
                                    <td>{{ $order->billing_city }}</td>
                                </tr>
                               
                                
                                <tr>
                                    <td>Total</td>
                                    <td>{{ presentPrice($order->billing_total) }}</td>
                                </tr>                 
                            </tbody>
                        </table>

                    </div>
                </div> <!-- end order-container -->

                <div class="order-container">
                    <div class="order-header text-white" style="background-color:#353535">
                        <div class="order-header-items">
                            <div>
                                Productos del Pedido
                            </div>

                        </div>
                    </div>
                    <div class="order-products">
                        @foreach ($products as $product)
                            <div class="order-product-item">
                                <div><img src="{{ productImage($product->image) }}" alt="Product Image"></div>
                                <div>
                                    <div>
                                        <a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                                    </div>
                                    <div>{{ $product->presentPrice() }}</div>

                                    <div>Unidades: {{ $product->pivot->quantity }}</div>
                                    <!-- <div>Cantidad de cajas: {{ $product->pivot->quantity }}</div>
                                    <div>Unidades por caja: {{ $product->cantidad_caja }}</div> -->
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div> <!-- end order-container -->
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
