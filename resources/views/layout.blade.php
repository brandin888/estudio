<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <!-- Chola -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Micky SRL | Distribuidora e Importadora</title>
        <meta name="theme-color" content="#353535" />
        <meta name="description" content="Somos una Distribuidora, hacemos ventas por mayor a todo Perú,  puedes encontrarnos en  Lima Cercado">

       <link rel="shortcut icon" href="{{ asset('img/diseño/icono.png') }}" />
      
        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">

         
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
        <script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js " > </script> 
        <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
 
        <!-- Include a polyfill for ES6 Promises (optional) for IE11 -->
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css?v=1.6') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css?v=1.4') }}">
        <link href="{{ asset('css/algolia.css?v=1.0') }}" rel="stylesheet">
        <link href="{{ asset('css/all.css?v=1.1') }}" rel="stylesheet">

        
        
        <script  src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"> </script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
          
        
        @yield('extra-css')
        <style type="text/css">
        .page-item.active .page-link {
          z-index: 3;
          color: #fff;
          background-color: #ff5a00;
          border-color: #ff5a00;
        }
        .redes__link{
          color: black;
        }

        header{
          height: 0px;
        }
        </style>
    </head>

 <div  style="background-color: rgba(255, 255, 255, 0.84);">
<body class="@yield('body-class', '')" style="background-color: white">
    <!-- Load Whatsapp -->
    <div>
      <a class="appWhatsapp" target="_blanck" href="https://api.whatsapp.com/send?phone=51994084591&Hola&nbsp;MickySRL&nbsp;quisiera&nbsp;cotizar&nbsp;el&nbsp;siguiente&nbsp;producto">
        <img src="{{ asset('img/whatsapp.png') }}" alt="whatsapp">
      </a> 
    </div>
    <!-- end Whatsapp -->

 
   
      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="111473320648629"
  theme_color="#ff5a00"
  logged_in_greeting="Bienvenido a MickySRL. ¿Cuál es el producto que desea cotizar?"
  logged_out_greeting="Bienvenido a MickySRL  . ¿Cuál es el producto que desea cotizar?">
      </div>
      
    @include('partials.nav')

    @yield('content')

    @include('partials.footer')

</div>
   <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
  <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
  <script src="{{ asset('js/algolia.js?v=1.2') }}"></script>
<script src="js/app.js"></script>
    <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type="text/javascript" src="//maps.google.com/maps/api/js?key=AIzaSyC4yN2BPmYWLa-GjR-5Z8V5YfkKgwygEF8"></script>
    <script src="{{ asset('js/gmaps.js')}}"></script>
<script type="text/javascript">

  //Active Menu

var  pestana = $('#pestana_vista').attr('valor');
$('#'+pestana).addClass('activo');

//menu responsive

$(document).ready(menu);
function menu() {
  $('#menu-icon-shape').on('click', function() {
    $('#menu-icon-shape').toggleClass('active');
    $('#top, #middle, #bottom').toggleClass('active');
    $('#overlay-nav').toggleClass('active');
  });
}
</script>
<script type="text/javascript">
  const site_url = '{{ url('/') }}/';
</script>
    @yield('extra-js')

</body>


</html>