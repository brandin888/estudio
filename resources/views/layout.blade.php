<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>El Mayorista | Tienda Online</title>

        <link href="/img/favicon.ico" rel="SHORTCUT ICON" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css?v=1.4') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css?v=1.2') }}">
        <link href="{{ asset('css/all.css?v=1.1') }}" rel="stylesheet">
        


        

        
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

        @yield('extra-css')
    </head>


<body class="@yield('body-class', '')" >
    @include('partials.nav')

    @yield('content')

    @include('partials.footer')


   
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
    @yield('extra-js')

</body>
</html>
</script>
