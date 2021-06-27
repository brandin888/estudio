<style type="text/css">

</style>



@extends('layout')

@section('title', 'Products')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@endsection

@section('content')
            <!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Faqs</h2>
                        </div>
                        <div class="col-12">
                            <a href="{{ url('/') }}/">Inicio</a>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->


            <!-- Service Start -->
            <div class="service">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Especialidades</p>
                        <h2>Asesoramiento en controversias jurídicas</h2>
                    </div>
                    <div class="row">
                            @foreach($specialties as $specialty)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item">
                                <div class="service-img">
                                    <img src="{{ postImage($specialty->image) }}" alt="Image">
                                    <div class="service-overlay">
                                        <p>
                                            {{$specialty->meta_description}}
                                        </p>
                                    </div>
                                </div>
                                <div class="service-text">
                                    <h3>{{$specialty->name}}</h3>
                                    <a class="btn" href="{{ route('specialty.show', $specialty->slug) }}" data-lightbox="service">+</a>
                                </div>
                            </div>
                        </div>                                        
                            @endforeach
                        

                    </div>
                </div>
            </div>
            <!-- Service End -->
    
            
            <!-- FAQs Start -->
            @include('partials.faq')
            <!-- FAQs End -->

@endsection

@section('extra-js')

    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js?v=1.2') }}"></script>


@endsection