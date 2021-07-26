



@extends('layout')

@section('title', 'Nosotros')

@section('extra-css')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@endsection

@section('content')
            <!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>JÑP ABOGADOS</h2>
                        </div>
                        <div class="col-12">
                            <a href="{{ url('/') }}/">Inicio</a>
                            <a href="{{ url('/') }}/us">Nosotros</a>
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
                                <img src="{{ asset('img/about2.jpg') }}" alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="section-header text-left">
                                   @foreach($uss as $us)
                            <p>{{$us->descsub}}</p>
                              
                                 
                                
                                <h2>{{$us->desct}}</h2>
                            </div>
                            <div class="about-text">
                                <p>{{$us->descrtxt}}
                                     </p>

                                <a class="btn" href="https://api.whatsapp.com/send?phone=51989218856&Hola&&nbsp;solicito&nbsp;información&nbsp;de&nbsp;sus&nbsp;servicios&nbsp;legales">Contáctate</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About End -->
            
            
            <!-- Fact Start -->
            <div class="fact">
                <div class="container-fluid">
                    <div class="row counters">
                        @foreach($uss as $us)
                          
                              
                                 
                        
                       
                        <div class="col-md-6 fact-left wow slideInLeft">
                            <div class="row">
                                <div class="col-12">
     
                                    <div class="fact-text">
              
                                        <h2 class="center">VISIÓN</h2>
                                        <p class="center"> {{$us->vision}} </p>
                                    </div>
                                </div>
  
                            </div>
                        </div>
                        <div class="col-md-6 fact-right wow slideInRight">
                            <div class="row">
                                <div class="col-12">

                                    <div class="fact-text">
  
                                        <h2 class="center">MISIÓN</h2>
                                        <p class="center">{{$us->mision}}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                         @endforeach
                    </div>
                </div>
            </div>
            <!-- Fact End -->

            <!-- About Start -->
            <div class="about wow fadeInUp" data-wow-delay="0.1s">
                <div class="container">
                    @foreach($uss as $us)
                            
  
                    
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-6">
                            <div class="about-img">
                                <img src="{{ asset('img/about2.jpg') }}" alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="section-header text-left">
                                <p>{{$us->ceodesc1}}</p>
                                <h2>{{$us->ceodesc2}}</h2>
                            </div>
                            <div class="about-text">
                                <p>
                                   {{$us->ceodesc3}} </p>

                                <a class="btn" href="https://api.whatsapp.com/send?phone=51989218856&Hola&&nbsp;solicito&nbsp;información&nbsp;de&nbsp;sus&nbsp;servicios&nbsp;legales">Contáctate</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- About End -->
            
            

            <!-- FAQs Start -->
            @include('partials.faq')
            <!-- FAQs End -->



        </div>
@endsection

@section('extra-js')

@endsection
