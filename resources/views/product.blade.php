@extends('layout')

@section('title', $product->name)

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@endsection

@section('content')

    

    <div class="container" style="padding-bottom: 35px;">
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

    <div class="container" style="font-size:25px">
    <i class="fas fa-home" style="color:var(--primary)"></i> > <strong><a href="/shop" style="color:var(--primary)">Tienda</a></strong> > {{ $product->name}}
    </div>
    <div class="product-section container">
        <div style="padding-left: 0px">
            <div class="product-section-image bg-white">
                <img src="{{ productImage($product->image) }}" alt="product" class="active" id="currentImage">
            </div>
            <div class="product-section-images">
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
        </div>
        <div class="product-section-information" style="padding-left: 40px;">
            <h1>{{ $product->name }} </h1>
            <div class="card-body d-lg-flex pb-5" style="background-color:#f7f7f9;font-size:18px;border-bottom:5px solid var(--primary)">
                <div class="col-12 col-lg-6 mr-5 px-0">
                    <div class="mb-3">Descripción:</div>
                    {{ $product->details }}
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-3">Precio : {{ $product->presentPriceUnidad() }}</div>
                    @if($product->pricemayor > 0)
                    <div class="product-section-subtitle" style="color:#171260">Precio por mayor: {{ $product->presentPriceMayor() }}</div>
                    @endif
                    @if ($product->quantity > 0)
                        <form action="{{ route('cart.store', $product) }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn__enviar"><i class="fas fa-shopping-cart"></i> Agrega al Carrito</button>
                        </form>
                    @endif
                </div>
            <!-- <div>{!! $stockLevel !!}</div> -->
                
            </div>
            

            <p>&nbsp;</p>
        </div>
    </div> <!-- end product-section -->
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" style="font-weight:700" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Característica Técnicas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="font-weight:700" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Asistencia</a>
            </li>
            </ul>
        <div class="tab-content pt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">{!! $product->description !!}</div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
        </div>
    </div>
    @include('partials.might-like')

@endsection

@section('extra-js')
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
    </script>

    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>

@endsection
