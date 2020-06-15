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

<div class="breadcrumbs" style="background-color: #edf6ff">
    <div class="breadcrumbs-container container">
        <div>
            <div class="d-flex align-items-center">
                <i style="font-size:30px" class="fa fa-shopping-cart mr-2"></i>
                <h2 class="mb-0">Mi Carrito</h2>
            </div>
        </div>
        <div>
            @include('partials.search')
        </div>
        <div>
            <div class="d-flex align-items-center">
                <i style="font-size:20px" class="fa fa-reply mr-2"></i>
                <a class="font-weight-bold" style="text-decoration:none;font-size:16px" href="{{ route('shop.index') }}">Seguir comprando</a>
            </div>
        </div>
    </div>
</div>

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
    <div class="cart-container row mr-5 ml-5">
        @if (Cart::count() > 0)
        <div class="cart-section col-12 col-lg-8">
            <div>  
                <h2>{{ Cart::count() }} producto(s) en tu Carrito de compras</h2>
                
                <div class="table-responsive">
                    <table class="table mb-0 text-center">
                        <thead class="font-weight-bold text-white" style="background-color:#01579b">
                        <tr><strong>

                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad (Cajas)</th>
                            <th scope="col">Precio / Caja</th>
                            <th scope="col"></th>
                            </strong>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $item)
                            <tr style="background-color:white">
                            <!-- <div class="cart-table-row mb-2"> -->
                                <td class="d-md-flex align-items-center cart-table-row-left">
                                    <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ productImage($item->model->image) }}" alt="item" class="cart-table-img"></a>
                                    <div class="cart-item-details w-100">
                                        <div class="cart-table-item"><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }} ({{ $item->model->cantidad_caja }} unidades por caja)</a></div>
                                        
                                    </div>
                                </td>
                                <td style="padding-top:5%">
                                    <select class="quantity" data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->quantity }}">
                                        @for ($i = 1; $i < 5 + 1 ; $i++)
                                        <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <!-- <input class="quantity" min="0" name="quantity" value="1" type="number"> -->         
                                </td>
                                <td style="padding-top:5%">
                                    <div>{{ presentPrice($item->subtotal) }}</div>
                                    <div class="cart-table-actions">
                                        <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            
                                            <!-- <button type="submit" class="cart-options">Quitar</button> -->
                                            <td style="padding-top:5%"class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
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
        
        <div class="cart-section-2 col-12 col-lg-4 mr-auto">
            <div class="card-body bg-white mt-5">
                <div class="cart-totals text-center">
                    <div class="mb-3" style="border-bottom: 1px solid #ddd">
                        <h2>Resumen de tu pedido</h2>
                    </div>
                    <div class="row pb-4">
                        <div class="col-6">
                                <strong>Total</strong>
                            </div>
                            <div class="col-6">
                                <span class="cart-totals-total">{{ presentPrice($newTotal) }}</span>
                            </div>
                        </div>
                        <div class="pb-2">
                            <div style="font-size:15px">El costo de envío no esta incluido en el precio de los productos.<br><br> El pago de los productos y el envío se realiza via depósito, si tiene alguna duda puede comunicarse al siguiente número
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <a href="{{ route('checkout.index') }}" class="button text-white" style="text-decoration:none;background-color:#01579b;border:none">Ir a comprar</a>
                        </div>                        
                    </div> <!-- end cart-totals -->
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
