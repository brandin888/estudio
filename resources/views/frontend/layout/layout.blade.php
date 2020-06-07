<!doctype html>
<html lang="es">
<head>
  {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/> --}}

<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="theme-color" content="#0e1126" />
<meta name="description" content="Odyssey es un parque temático con lo último en tecnología de entretenimiento. Aquí encontrarás atracciones únicas de experiencia inmersiva para toda la familia. ¡Te esperamos de lunes a domingo en MegaPlaza Lima Norte, Open Plaza Angamos y Real Plaza Cusco!">
<title>Oyssey | Parque temático con lo último en tecnología de entretenimiento</title>
<link rel="icon" href="{{ asset('images/favicon.ico')}}"/>
<link rel="stylesheet" href="{{ asset('css/app.css?v=2.5') }}">
<link rel="stylesheet" href="{{ asset('css/animate.css?v=1.0') }}">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">



@yield('extra-css')
</head>
<body>
@include('frontend.partials.header')
<!--<div class="contenedor_carga">
  <div class="contenedor_carga__giro"></div>
</div>-->
@yield('content')
@include('frontend.partials.footer')
@include('frontend.partials.modalIngresa')
@include('frontend.partials.modalUbicacion')
@include('frontend.partials.modalRegister')
@include('frontend.partials.modalPolitica')
@include('frontend.partials.modalCondicion')
@include('frontend.partials.modal')

<script src="{{ asset('js/wow.min.js?v=1.0') }}"></script>
<script src="{{ asset('js/app.js?v=2.3') }}"></script>
<script type="text/javascript" src="{{ asset('js/scripts.js?v=2.6') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript" src="//maps.google.com/maps/api/js?key=AIzaSyC4yN2BPmYWLa-GjR-5Z8V5YfkKgwygEF8"></script>
<script src="{{ asset('../resources/js/vendor/gmaps.js')}}"></script>
<script type="text/javascript">
  const site_url = '{{ url('/') }}/';
</script>
<script>
  new WOW().init();
</script>
<script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>

@yield('scripts')
</body>
</html>
