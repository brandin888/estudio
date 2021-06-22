@extends('layout')

@section('title', $specialty->name)

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">

@endsection

@section('content')


            <!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>{{ $specialty->name }}</h2>
                        </div>
                        <div class="col-12">
                            <a href="">Inicio</a>
                            <a href="">Artículos</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->

 
            <!-- About Start -->
            <div class="about wow fadeInUp" data-wow-delay="0.1s">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-6">
                            <div class="about-img">
                                <img src="{{ postImage($specialty->image) }}" alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="section-header text-left">
                                <p>Especialistas en:</p>
                                <h2>{{ $specialty->name }}</h2>
                            </div>
                            <div class="about-text">
                                <p>
                                    {!! $specialty->description !!} 
                                </p>
                                <a class="btn" href="">Contáctate</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About End -->

            <!-- FAQs Start -->
            @include('partials.faq')
            <!-- FAQs End -->


@endsection

@section('extra-js')


    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>

@endsection
