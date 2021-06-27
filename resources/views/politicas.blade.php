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
                            <h2>Políticas de Privacidad</h2>
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

                    <div class="row">
                        <p>Cómo manejamos la Información Recolectada
Requerimos esta información para comprender sus necesidades y brindarle un mejor servicio, y en particular por las siguientes razones:

Mantenimiento de registros internos.
Podemos utilizar la información para mejorar nuestros  servicios
Es posible que enviemos periódicamente correos electrónicos promocionales sobre nuevos productos, ofertas especiales u otra información que creemos que puede resultarle interesante utilizando la dirección de correo electrónico que ha proporcionado.
De vez en cuando, también podemos utilizar su información para comunicarnos con usted con fines de investigación de mercado. Podemos comunicarnos con usted por correo electrónico, teléfono, fax o correo. Podemos utilizar la información para personalizar el sitio web de acuerdo con sus intereses.
Seguridad
Estamos comprometidos a garantizar que su información esté segura. Para evitar el acceso o la divulgación no autorizados, hemos implementado procedimientos físicos, electrónicos y administrativos adecuados para salvaguardar y asegurar la información que recopilamos en línea.</p>
                        

                    </div>
                </div>
            </div>
            <!-- Service End -->
    
            

@endsection

@section('extra-js')

    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js?v=1.2') }}"></script>


@endsection