



@extends('layout')

@section('title', 'Products')

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
                            <h2>JNP ABOGADOS & 
CONSULTORES</h2>
                        </div>
                        <div class="col-12">
                            <a href="">Inicio</a>
                            <a href="">Nosotros</a>
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
                                <p>JNP Abogados & Consultores</p>
                                <h2>Quienes Somos</h2>
                            </div>
                            <div class="about-text">
                                <p>
                                    Firma peruana que brinda asesoría y consultoría en asuntos legales en el Perú y en el extranjero. 
                                </p>
                                <p>Nuestra trayectoria nos permite desarrollar estrategias que arriban a resultados en cortos y medianos plazos. </p>
                                <p>JNP Abogados & Consultores permanentemente reconforma de forma dinámica su equipo de abogados, los cuales en base a sus cualidades y sobre todo a su experiencia en litigios civiles laborales y administrativos brindan el mejor servicio y atención a cada uno de sus clientes. </p>

                                <a class="btn" href="">Nosotros</a>
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
                        <div class="col-md-6 fact-left wow slideInLeft">
                            <div class="row">
                                <div class="col-6">
                                    <div class="fact-icon">
                                        <i class="flaticon-worker"></i>
                                    </div>
                                    <div class="fact-text">
                                        <h2 data-toggle="counter-up">10</h2>
                                        <p>Asesores Legales</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="fact-icon">
                                        <i class="flaticon-building"></i>
                                    </div>
                                    <div class="fact-text">
                                        <h2 data-toggle="counter-up">285</h2>
                                        <p>Clientes Satisfechos</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 fact-right wow slideInRight">
                            <div class="row">
                                <div class="col-6">
                                    <div class="fact-icon">
                                        <i class="flaticon-address"></i>
                                    </div>
                                    <div class="fact-text">
                                        <h2 data-toggle="counter-up">132</h2>
                                        <p>Casos Resueltos</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="fact-icon">
                                        <i class="flaticon-crane"></i>
                                    </div>
                                    <div class="fact-text">
                                        <h2 data-toggle="counter-up">20</h2>
                                        <p>Casos en Proceso</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fact End -->
            
            

            <!-- FAQs Start -->
            @include('partials.faq')
            <!-- FAQs End -->



        </div>
@endsection

@section('extra-js')

@endsection
