@extends('layout')

@section('title', $product->name)

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
    <meta property="og:title" content="{{ $product->name }}">
    <meta property="og:description" content="{{ $product->details }}">
    <meta property="og:url" content="{{ route('shop.show', $product->slug) }}">
    <meta property="og:image" content="{{ productImage($product->image) }}">
    <meta property="product:brand" content="MickySRL">
    <meta property="product:availability" content="in stock">
    <meta property="product:condition" content="new">
    <meta property="product:price:amount" content="{{ $product->presentPrice() }}">
    <meta property="product:price:currency" content="PEN">
    <meta property="product:retailer_item_id" content="{{ $product->id }}">
    <meta property="product:item_group_id" content="{{ $product->id }}">
    <meta property="product:category" content="1253">
@endsection

@section('content')



    <div class="container" style="padding-bottom: 35px;">
        <!-- @if (session()->has('success_message'))
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
        @endif -->
    </div>

    <div class="container" style="font-size:25px">
    <i class="fas fa-home" style="color:var(--primary)"></i> > <strong><a href="/shop">Tienda</a></strong> > {{ $product->name}}
    </div>
    <div class="product-section container">
        <div style="padding-left: 0px" class="d-flex">
            <div class="product-section-images col-2">
                <div class="product-section-thumbnail selected">
                    <img src="{{ productImage($product->image) }}" alt="product">
                </div>

                @if ($product->images)
                    @foreach (json_decode($product->images, true) as $image)
                    <div class="product-section-thumbnail">
                        <img src="{{ productImage($image) }}" alt="product">
                    </div>
                    @endforeach
                @endif
            </div>
            <div class="product-section-image bg-white col-9">
                <img src="{{ productImage($product->image) }}" alt="product" class="active" id="currentImage">
            </div>

        </div>
        <div class="product-section-information">
            <h1 class="mb-0 product-title">{{ $product->name }}</h1>
            <div style="margin-bottom:40px">{!! $stockLevel !!} @if($item)

                            <a href="/cart" type="submit" class="btn btn__enviar2" ><i class="fas fa-shopping-cart"></i> Ir al carrito</a>

             @endif</div>

            <div class="card-body d-lg-flex pb-5 shadow" style="background-color:#f7f7f9;font-size:18px;border-bottom:5px solid var(--primary)">
                <div class="col-12 col-lg-6 mr-5 px-0">
                    @if($product->codigo_producto)
                    <div class="mb-3">Código: {{ $product->codigo_producto }} </div>

                    @endif





                    <div class="mb-3">Descripción:</div>
                    {{ $product->details }}
                </div>
                <div class="col-12 col-lg-6 dataproduct px-0">

                    <div class="mb-3">Precio : {{ $product->presentPriceUnidad() }}</div>
                    @if($product->pricemayor > 0)
                    <div class="product-section-subtitle" style="color:#171260">Precio por mayor: {{ $product->presentPriceMayor() }}</div>
                    @endif
                    @if ($product->quantity > 0)
                        <!-- <form action="{{ route('cart.store', $product) }}" method="POST"> -->
                            <!-- {{ csrf_field() }} -->
                            <a t-attf-href="#" class="btn btn-link js_add_cart_json d-md-inline-block" aria-label="Remove one" title="Remove one"><i class="fas fa-minus"></i></a>
                            @if($item)
                            <label type="text">{{ $item->qty }}</label>
                            @else
                            <label type="text">0</label>
                            @endif
                            <a t-attf-href="#" class="btn btn-link js_add_cart_json d-md-inline-block" aria-label="Remove one" title="Remove one"><i class="fas fa-plus"></i></a>
                            @if($item)
                            <button type="submit" class="btn btn__enviar" data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->quantity }}" data-pricemayor="{{ $item->model->pricemayor }}" data-price="{{ $item->model->price }}"><i class="fas fa-shopping-cart"></i> Agrega al Carrito</button>
                            @else
                            <button type="submit" class="btn inicio" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}"><i class="fas fa-shopping-cart"></i> Agrega al Carrito</button>
                            @endif

                            <!-- </form> -->
                    @endif
                </div>
            <!-- <div>{!! $stockLevel !!}</div> -->
            </div>
        </div>
    </div> <!-- end product-section -->
    <div class="container d-flex align-items-center">
        <div class="col-12 col-lg-6">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" style="border-bottom:solid 1px #dee2e6">
                    <a class="nav-link active" style="font-weight:700" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Características Técnicas</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" style="font-weight:700" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Asistencia</a>
                </li> -->
            </ul>
            <div class="tab-content p-3 bg-white" id="myTabContent" style="border:1px solid #dee2e6;border-top:0px">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">{!! $product->description !!}</div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
            </div>
        </div>
        <div class="col-lg-6 d-flex imagenone justify-content-center">
            <a href="{{ url('/') }}/contacto" class="d-flex justify-content-center">
            <img class="img-fluid border bg-white imagenpersona" src="{{ asset('images/producto/accesorio.jpg') }}" alt="imagen-ferreteria-persona" style="max-width:70%;">
            </a>
        </div>
    </div>
    @include('partials.might-like')

@endsection

@section('extra-js')
<script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function(){
            const currentImage = document.querySelector('#currentImage');
            const images = document.querySelectorAll('.product-section-thumbnail');

            images.forEach((element) => element.addEventListener('click', thumbnailClick));

            function thumbnailClick(e) {
                currentImage.classList.remove('active');

                currentImage.addEventListener('transitionend', () => {
                    currentImage.src = this.querySelector('img').src;
                    currentImage.classList.add('active');
                })

                images.forEach((element) => element.classList.remove('selected'));
                this.classList.add('selected');
            }

        })();
        $('.inicio').click(function(){
                const $id = this.getAttribute('data-id')
                const $name = this.getAttribute('data-name')
                const $price = this.getAttribute('data-price')
                let $value = $(this).parents('.dataproduct').find('label').html()
                axios.post(`cart/create`, {
                    id: $id,
                    name: $name,
                    price: $price,
                    qty: $value
                })
                .then(function (response) {
                    location.reload()
                    // window.location.href = '{{ route('cart.index') }}'
                })
                .catch(function (error) {
                    location.reload()
                    // window.location.href = '{{ route('cart.index') }}'
                });
        });
        $('.btn-link').click(function(){
            $input = $(this).parents('.dataproduct').find('label')
            var min = 0
            var max = 10
            var previousQty = parseInt($input.html() || 0, 10);
            var quantity = ($(this).has(".fa-minus").length ? -1 : 1) + previousQty;
            var newQty = quantity > min ? (quantity < max ? quantity : max) : min;
            $input.html(newQty)
        });
        $('.btn__enviar').click(function(){
                const id = this.getAttribute('data-id')
                const productQuantity = this.getAttribute('data-productQuantity')
                const productPricemayor = this.getAttribute('data-pricemayor')
                const productPrice = this.getAttribute('data-price')
                let value = $(this).parents('.dataproduct').find('label').html()
                if (parseInt(value) > 0){
                    axios.patch(`cart/${id}`, {
                        quantity: value,
                        productQuantity: productQuantity,
                        productPricemayor: productPricemayor,
                        productPrice: productPrice
                    })
                    .then(function (response) {
                        location.reload()
                        // window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        location.reload()
                        // window.location.href = '{{ route('cart.index') }}'
                    });

                }else{
                    const id = this.getAttribute('data-id')
                    axios.delete(`cart/${id}`)
                    .then(function (response) {
                        location.reload()
                        // window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        location.reload()
                        // window.location.href = '{{ route('cart.index') }}'
                    });
                }
        })
    </script>

    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>

@endsection
