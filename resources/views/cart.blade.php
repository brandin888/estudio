@extends('layout')

@section('title', 'Shopping Cart')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
<style scoped>
@media (max-width: 700px) {
  .breadcrumbs .breadcrumbs-container {
    flex-direction: column !important;
    height: 130px !important;
  }
}
</style>
@endsection

@section('content')


    @component('components.breadcrumbs')
      
    @endcomponent

<div class="d-flex justify-content-center mt-3">
        
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
    <div class="container" style="padding-top: 120px">
        @if (Cart::count() > 0)
        <div class="row">
            <div class="cart-section col-12">
                <div>  
                    <h2>{{ Cart::count() }} producto(s) en tu Carrito de compras</h2>
                    <div class="table-responsive">
                        <table class="table mb-0 text-center">
                            <thead class="font-weight-bold text-white" style="background-color:var(--primary)">
                            <tr><strong>

                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col"></th>
                                </strong>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $item)
                                <tr style="background-color:white">
                                <!-- <div class="cart-table-row mb-2"> -->
                                    <td class="d-md-flex justify-content-around align-items-center cart-table-row-left">
                                        <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ productImage($item->model->image) }}" alt="item" class="cart-table-img" style="max-height:100px"></a>
                                        <div class="cart-item-details text-center">
                                            <div class="cart-table-item"><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></div>
                                            
                                        </div>
                                    </td>
                                    <td>
                                        <select class="quantity" data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->quantity }}">
                                            @for ($i = 1; $i < 5 + 1 ; $i++)
                                            <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <!-- <input class="quantity" min="0" name="quantity" value="1" type="number"> -->         
                                    </td>
                                    <td>
                                        <div>{{ presentPrice($item->subtotal) }}</div>
                                        <div class="cart-table-actions">
                                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                
                                                <!-- <button type="submit" class="cart-options">Quitar</button> -->
                                                <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                                            </form>
                                            
                                            <!-- <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="POST">
                                                {{ csrf_field() }}
            
                                                <button type="submit" class="cart-options">Mover a Deseos</button>
                                            </form> -->
                                        </div>
                                    </td>
                                <!-- </div> -->
                                </tr>
                                @endforeach                  
                            </tbody>
                        </table>
                        
                    </div> <!-- end cart-table -->
                    
                            
                </div>
                
            </div> <!-- end cart-section -->
            
            <div class="cart-section-2 col-12">
                <div class="card-body bg-white d-flex">
                    <div class="text-center cart-totals col-4 order-2 d-flex justify-content-around pr-5 align-items-center">
                        <h2 class="mb-0">Total</h2>{{ presentPrice($newTotal) }}
                    </div>
                            <div class="col-8 text-justify">
                                <div>El costo de envío no esta incluido en el precio de los productos.<br>El pago de los productos y el envío se realiza <strong>via depósito</strong>, deberá enviar una foto del voucher respondiendo al correo que le enviaremos <strong>al finalizar su pedido.</strong>
                                </div>
                            </div>                      
                </div>
                        <div class="row d-flex justify-content-around align-items-center order-1 mt-4">
                            <a class="font-weight-bold" class="button text-white" style="text-decoration:none;font-size:16px" href="{{ route('shop.index') }}">Seguir comprando</a>
                            <a href="{{ route('checkout.index') }}" class="button text-white" style="text-decoration:none;background-color:var(--primary);border:none">Ir a comprar</a>
                        </div>  
            </div>
        
        </div>
          
        @else
                <div class="container mt-5">
                <h3 class="font-weight-bold">Su carrito esta vacío.</h3>
                    <div class="spacer"></div>
                    <a href="{{ route('shop.index') }}" class="button" style="text-decoration: none;">Agregar productos</a>
                    <div class="spacer"></div>
                </div>    
                    
        @endif
     
    </div>
    @include('partials.might-like')

    
@endsection

@section('extra-js')
<script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')

            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    const productQuantity = element.getAttribute('data-productQuantity')

                    console.log(this.value)
                    console.log(productQuantity)

                    axios.patch(`cart/${id}`, {
                        quantity: this.value,
                        productQuantity: productQuantity
                    })
                    .then(function (response) {
                        // console.log(response);
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        // console.log(error);
                        window.location.href = '{{ route('cart.index') }}'
                    });
                })
            })
        })();
    </script>

    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection
