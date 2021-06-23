



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
                                <p>JNP Abogados & Consultores</p>
                                <h2>Quienes Somos</h2>
                            </div>
                            <div class="about-text">
                                <p>
                                    Firma peruana que brinda asesoría y consultoría en asuntos legales en el Perú y en el extranjero. 
                                </p>
                                <p>Nuestra trayectoria nos permite desarrollar estrategias que arriban a resultados en cortos y medianos plazos. </p>
                                <p>JNP Abogados & Consultores permanentemente reconforma de forma dinámica su equipo de abogados, los cuales en base a sus cualidades y sobre todo a su experiencia en litigios civiles laborales y administrativos brindan el mejor servicio y atención a cada uno de sus clientes. </p>

                                <a class="btn" href="https://api.whatsapp.com/send?phone=51989218856&Hola&&nbsp;solicito&nbsp;información&nbsp;de&nbsp;sus&nbsp;servicios&nbsp;legales">Contáctate</a>
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
                                <div class="col-10">
     
                                    <div class="fact-text">
              
                                        <h2 class="center">VISIÓN</h2>
                                        <p class="center">Nuestro estudio jurídico busca consolidarse como una de las principales firmas de asesores legales, tanto a nivel nacional e internacional. </p>
                                    </div>
                                </div>
  
                            </div>
                        </div>
                        <div class="col-md-6 fact-right wow slideInRight">
                            <div class="row">
                                <div class="col-10">

                                    <div class="fact-text">
  
                                        <h2 class="center">MISIÓN</h2>
                                        <p class="center">Brindar un servicio altamente competitivo y donde el fin supremo sea la satisfacción del cliente.</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fact End -->

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
                                <p>Socio fundador</p>
                                <h2>Jonatan Mirko Ñahuin Puente</h2>
                            </div>
                            <div class="about-text">
                                <p>
                                    Abogado egresado de la Universidad Nacional Federico Villarreal en 2009 y miembro del Ilustre Colegio de Abogados de Lima desde 2013. Asimismo, cuenta con estudios de posgrado en Derecho Procesal en la Pontificia Universidad Católica del Perú (2015-2016). Asimismo, desde el año 2008 se desempeñó como Secretario Judicial en el Poder Judicialde la Sala Transitoria Laboral permaneciendo hasta el año 2014; asimismo, en el año 2015 y 2016 se desempeñó como Secretario Judicial en el Juzgados Tributarios y de Propiedad Intelectual.  
                                </p>
                                <p>Su experiencia dentro del ámbito jurisdiccional le ha permitido conocer desde dentro el funcionamiento de la impartición de justicia en diversas áreas del derecho, lo cual le ha servido para actualmente litigar con éxito en la actualidad.  </p>
                                <p>Es Socio Fundador y Director Gerente de JNP ABOGADOS& CONSULTORES. </p>

                                <a class="btn" href="https://api.whatsapp.com/send?phone=51989218856&Hola&&nbsp;solicito&nbsp;información&nbsp;de&nbsp;sus&nbsp;servicios&nbsp;legales">Contáctate</a>
                            </div>
                        </div>
                    </div>
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
