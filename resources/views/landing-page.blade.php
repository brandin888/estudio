<!doctype html>

<style type="text/css">
    div.polaroid {
  width: 100%;
  background-color: white;
  padding: 0px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
@media only screen and (max-width: 1200px) {
  .products-section .products {
  display: grid;
  grid-template-columns: 1fr 1fr ;
  grid-gap: 30px 30px;
  }
}

img {width: 100%}

div.container {
  text-align: center;
  padding: 10px 20px;
}

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform: scale(0.1)} 
  to {transform: scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
.polaroid:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 140, 186, 0.5);
  
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}


section#action, section#action-transparent {
    padding: 70px 0;
}
#action, #action-parallax, #action-parallax2, #action-parallax3, #action-parallax4, #action-parallax-seo, .action-parallax {
    background: none repeat scroll 0 0 #1b1f23;
}
#action, #action-parallax, #action-parallax2, #action-parallax3, #action-parallax4,#action-parallax-seo, .action-parallax , #action-transparent, #action a, #action-parallax a, #action-parallax-seo a, #action-parallax2 a, #action-parallax3 a, #action-parallax4 a, #action-transparent a {
    color: #fff;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
}
#action-parallax, #action-parallax2, #action-parallax3, #action-parallax4,#action-parallax-seo, #action-transparent, .action-parallax {
    background: none no-repeat scroll 50% 50% / cover rgba(0, 0, 0, 0);
    margin: 0 auto;
    position: relative;
    width: 100%;
    z-index: -1;
}
#action-parallax {
    background-image: url("storage/banners/slider2.jpg");
}
#action-parallax2 {
   background-image: url("img/parallax/parallax2.jpg");
}
#action-parallax3 {
    background-image: url("img/parallax/parallax3.jpg");
}
#action-parallax4 {
    background-image: url("img/parallax/parallax5.jpg");
}
#action-parallax5 {
    background-image: url("../images/cover-portal-empleado.jpg");
}
#action-parallax-seo {
    background-image: url("../images/cover-seo.jpg");
}
#action-parallax-empleado {
    background-image: url("../images/parallax-empleado.jpg");
}
#action-transparent {
    background: none repeat scroll 0 0 #1b1f23;
}
#action-transparent {
    background: none repeat scroll 0 0 #1b1f23;
}
#action-transparent .overlay-dark {
    z-index: 0;
}
#action-transparent .icon-heading {
    display: block;
    line-height: 1px;
    padding-top: 30px;
}

.overlay-dark {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.6);
}
.overlay, .overlay-dark {
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    z-index: -1;
}

.fixed_p {
    background-attachment: fixed !important;
}
.cyan.lighten-2 {
  background-color: #4dd0e1 !important;
}



.menu__responsive {
  width: 100%;
  height: 58px;
  background: #0e1126;
  position: fixed;
  top: 0;
  z-index: 1234;
  display: none;
}

.menu__responsive .logo__responsive {
  width: 100%;
  padding: 18px;
}

.menu__responsive .logo__responsive img {
  width: 100px;
}

.menu__responsive .carrito_top {
  position: absolute;
  top: 27px;
  right: 70px;
}

.menu__responsive .carrito_top a i {
  color: #f99300;
}

.menu__responsive .carrito_top a span {
  color: #fff;
}

#menu-icon {
  width: 30px;
  height: 20px;
  position: relative;
  margin: 0 auto;
  top: 50%;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
}

#menu-icon-shape {
  width: 60px;
  height: 60px;
  position: fixed;
  top: 12px;
  right: 20px;
  display: none;
  z-index: 1234;
  cursor: pointer;
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

#top,
#middle,
#bottom {
  width: 100%;
  height: 2px;
  background: #e18604;
  -webkit-transition: all 0.35s ease;
  transition: all 0.35s ease;
}

#middle {
  margin: 4px 0;
}

/* Transform menu icon into close icon */

#top.active {
  -webkit-transform: translateY(8px) translateX(0) rotate(45deg);
  transform: translateY(8px) translateX(0) rotate(45deg);
}

#middle.active {
  opacity: 0;
}

#bottom.active {
  -webkit-transform: translateY(-4px) translateX(0) rotate(-45deg);
  transform: translateY(-4px) translateX(0) rotate(-45deg);
}

/* Navigation */

#overlay-nav {
  width: 100%;
  height: 0;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 123;
  background: #0e1126;
  opacity: 0;
  visibility: hidden;
  -webkit-transition: opacity 0.35s, visibility 0.35s, height 0.6s ease;
  transition: opacity 0.35s, visibility 0.35s, height 0.6s ease;
}

/* Open navigiation */

#overlay-nav.active {
  width: 100%;
  height: 100%;
  opacity: 100;
  visibility: visible;
  overflow: scroll;
}

#nav-content {
  position: relative;
  top: 50%;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
}

#nav-content ul {
  margin: 0 auto;
  padding: 0;
  list-style: none;
  text-align: center;
}

#nav-content ul li ul.submenu {
  padding: 0px 32px;
}

#nav-content ul li ul.submenu li {
  display: inline-block;
  color: #cdcdcd91;
  padding: 0px 5px;
}

#nav-content ul li ul.submenu li a {
  color: #cdcdcd91;
  font-weight: 300;
}

#nav-content ul li a {
  width: 100%;
  padding: 1.5% 0;
  display: block;
  font-family: 'Lato', sans-serif;
  font-weight: 700;
  font-size: 15px;
  letter-spacing: 0.6px;
  text-decoration: none;
  color: #fff;
  position: relative;
  -webkit-transition: all 0.35s ease;
  transition: all 0.35s ease;
}

#nav-content ul li a:hover {
  background: #0c0f1f;
}

#nav-content ul li a span {
  position: relative;
  padding-left: 2.3rem;
}

#nav-content ul li a span.icon:before {
  content: "";
  background-image: url(../images/icon.png?194a9580b33fd556d68f2c377f138da3);
  background-repeat: no-repeat;
  width: 28px;
  height: 28px;
  position: absolute;
  top: -9px;
  left: 0;
}

#nav-content ul li a span.icon.icon-boleto:before {
  background-position: -26px -30px;
}

#nav-content ul li a span.icon.icon-cumple:before {
  background-position: -0px -30px;
}

#nav-content ul li a span.icon.icon-promo:before {
  background-position: -50px -30px;
}

@media screen and (max-width: 600px) {
  #menu-icon-shape {
    top: 2px;
    right: 9px;
  }

  #nav-content ul li a {
    padding: 1.5% 0;
  }
}

@media (min-width: 992px) {
  .container-nav {
    position: absolute;
    top: 0;
    background: transparent;
    left: 0;
    right: 0;
    margin: 0 auto;
  }

  .navbar {
    padding-top: 0;
    margin-top: -9px;
  }

  .navbar__logo {
    max-width: 100%;
  }

  .navbar-brand {
    padding-top: 72px;
  }

  .menu-secondary {
    padding-top: 49px;
  }

  .menu-secondary ul li a {
    font-size: 14px;
    font-weight: 900;
    padding: 10px 25px;
    position: relative;
  }

  .menu-secondary ul li a:hover {
    color: #f58508;
  }

  .menu-secondary ul li a .icon {
    background-image: url(../images/icon.png?194a9580b33fd556d68f2c377f138da3);
    background-repeat: no-repeat;
    width: 28px;
    height: 28px;
    position: absolute;
    top: 0;
  }

  .menu-secondary ul li a:hover .icon-boleto {
    background-position: -26px -30px;
  }

  .menu-secondary ul li a .icon-boleto {
    background-position: -26px 0px;
  }

  .menu-secondary ul li a:hover .icon-cumple {
    background-position: -0px -30px;
  }

  .menu-secondary ul li a .icon-cumple {
    background-position: -0px 0px;
  }

  .menu-secondary ul li a:hover .icon-promo {
    background-position: -50px -30px;
  }

  .menu-secondary ul li a .icon-promo {
    background-position: -50px 0px;
  }

  .menu-secondary ul li a span {
    margin-left: 5px;
  }

  .telefonos-container {
    position: absolute;
    left: 0;
    padding: 0rem 1rem;
  }

  .telefonos-container a {
    font-family: 'Lato', sans-serif;
    font-size: 13px;
    font-weight: 600;
  }

  .telefonos-container a i {
    font-size: 10px;
  }

  .telefonos-container__content {
    margin-top: 11px;
    margin-left: 17px;
    border-bottom-right-radius: 10px;
    border-bottom-left-radius: 10px;
    padding: 0;
    background: #f7f7f7;
  }

  .telefonos-container__content__item {
    padding: 15px 54px 15px 30px;
  }

  .telefonos-container__content__item:hover {
    background: #2EC4B6;
  }

  .telefonos-container__content__item:last-child:hover {
    border-bottom-right-radius: 10px;
    border-bottom-left-radius: 10px;
  }

  .telefonos-container__content__item:last-child {
    margin-bottom: 0px;
  }

  .telefonos-container__content__item .titulo {
    font-family: 'Lato', sans-serif;
    display: block;
    color: #253b56;
    font-weight: 900;
    margin-bottom: 8px;
  }

  .telefonos-container__content__item .numero {
    display: block;
    color: #253b56;
    font-weight: 400;
  }

  .telefonos-container__content__item .numero i {
    color: #f99300;
    margin-right: 10px;
  }
}

@media (max-width: 425px) {
  .menu__responsive .carrito_top {
    top: 17px;
    right: 57px;
  }
}

@media (min-width: 426px) and (max-width: 991px) {
  .menu__responsive {
    height: 74px;
  }

  .menu__responsive .logo__responsive {
    padding: 26px;
  }
}

@media (max-width: 991px) {
  body {
    margin-top: 58px;
  }
 #aa-search-input{
  width: 280px;
 }

  .menu__responsive {
    display: block;
    -webkit-box-shadow: 0px 1px 10px #0000007a;
            box-shadow: 0px 1px 10px #0000007a;
  }

  #menu-icon-shape {
    display: block;
  }

  .header {
    display: none;
  }
  .sidebar{
    display: none;
  }
  .products-section {
    display: grid;
    grid-template-columns: 1fr;
    margin: 50px auto 50px;
  }

}

@media (min-width: 992px) and (max-width: 1171px) {
  .navbar__link {
    padding: 9px 4px;
    font-size: 12px;
  }

  
}

</style>


<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>El mayorista</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css?v=1.4') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css?v=1.2') }}">
        <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
    </head>
    <body style="background-image: url('img/parallax/image.jpg'); 
        background-repeat: no-repeat;
         background-size: 100% 100%;
          z-index: -1;
        ">
        <div id="app" >
            <header class="with-background" style="background-image: url('img/parallax/parallax9.jpg'); background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  height: 600px">
                <div class="top-nav container">
                    <div class="top-nav-left">
                        <div class="logo">El mayorista</div>
                        {{ menu('main', 'partials.menus.main') }}
                    </div>
                    <div class="top-nav-right">
                        @include('partials.menus.main-right')
                    </div>
                </div> <!-- end top-nav -->
                <div class="hero container">
                    <div class="hero-copy">
                        <h1>Tu Tienda Virtual El Mayorista</h1>
                        <p>Ofrecemos productos variados para el hogar.</p>
                        <div class="hero-buttons">
                            <a href="https://www.youtube.com/playlist?list=PLEhEHUEU3x5oPTli631ZX9cxl6cU_sDaR" class="button button-white">Tienda</a>
                            <a href="https://github.com/drehimself/laravel-ecommerce-example" class="button button-white">Contáctanos</a>
                        </div>
                    </div> <!-- end hero-copy -->

                    
                </div> <!-- end hero -->
            </header>

           <div class="menu__responsive">
  <div class="logo__responsive">
    <a href="{{ url('/') }}/"><img src="{{ asset('images/odyssey.png') }}" alt=""></a>
  </div>
  <div class="carrito_top">
    <li class="nav-item"><a class="navbar__link" href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart"></i>
    @if (Cart::instance('default')->count() > 0)
    <span class="pl-2"><span>({{ Cart::instance('default')->count() }})</span></span>
    @endif
    </a>
  </li>



    {{-- @foreach($items as $menu_item)
        <li>
            <a href="{{ $menu_item->link() }}">
                {{ $menu_item->title }}
                @if ($menu_item->title === 'Cart')
                    @if (Cart::instance('default')->count() > 0)
                    <span class="cart-count"><span>{{ Cart::instance('default')->count() }}</span></span>
                    @endif
                @endif
            </a>
        </li>
    @endforeach --}}
    <!-- <a class="navbar__link" href="{{ url('/')}}/mi-carrito"><i class="fas fa-shopping-cart"></i><span class="pl-2">(0)</span></a> -->
  </div>
  <div id="menu-icon-shape">
    <div id="menu-icon">
      <div id="top"></div>
      <div id="middle"></div>
      <div id="bottom"></div>
    </div>
  </div>
</div>


<!-- Overlay menu -->
<div id="overlay-nav">
  <div id="nav-content">
    <ul>
      
      <li><a class="navbar__link"  style="padding-top: 60% ; font-size: 25px"><span class="icon icon-cumple">Categorías</span></a></li>
      
         @foreach($categories as $category)
            <li><a class="navbar__link pr-0" href="{{ route('shop.index', ['category' => $category->slug]) }}"><span class="icon icon-promo">{{ $category->name }}</span></a></li>
      <li>
            @endforeach
        <ul class="submenu">
          
          <li><a class="navbar__link" href="{{ url('/') }}/login">Iniciar Sesión</a></li>
          <li>.</li>
          <li><a class="navbar__link" href="{{ url('/') }}/register">Registrarse</a></li>
          <li></li>
         
          <li>.</li>
          <li><a class="navbar__link" href="{{ url('/') }}/contactanos">Contáctanos</a></li>
        </ul>
      </li>
      <!-- <li class="nav-item">
        <a class="navbar__link" href="#" data-toggle="modal" data-target="#modalIngresar"><i class="fas fa-key"></i><span class="pl-2">Ingresar</span></a>
      </li> -->

      <!-- <li class="nav-item">
        <a class="navbar__link" href="{{ route('register') }}"><i class="fas fa-user"></i><span class="pl-2">Crear cuenta</span></a>
      </li> -->
      @guest
          
          @if (Route::has('register'))
         
          @endif
      @else
          <li class="nav-item dropdown" >
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right logout-responsive" aria-labelledby="navbarDropdown">
                @if(Auth::user()->role_id == 2)
                  <a class="dropdown-item" href="{{ route('perfil') }}">Mi Perfil</a>
                @endif
                  <a class="dropdown-item " href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{-- {{ __('Logout') }} --}}
                      Cerrar Sesión
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
      @endguest

      <li>
        <ul class="list-inline redes">
          <li class="list-inline-item"><a class="redes__link" href="#"><i class="fab fa-facebook-f"></i></a></li>
          {{-- <li class="list-inline-item pl-2"><a class="redes__link" href="#"><i class="fab fa-instagram"></i></a></li>
          <li class="list-inline-item pl-2"><a class="redes__link" href="#"><i class="fab fa-youtube"></i></a></li> --}}
        </ul>
      </li>
    </ul>
  </div>
</div>




 <section data-type="background" data-speed="4" class="parallax fixed_p"  style="background-position: 50% 33.75px; height: 250px"><div data-wow-duration="4s" class="container wow fadeIn  animated" style="visibility: visible; animation-duration: 4s; animation-name: fadeIn;"><div class="row"><div class="col-lg-10 col-lg-offset-1 text-center">
<i class="icon icon-heading ion-pie-graph size-96"></i>
<br><h2>El Mayorista</h2><p class="lead">
Somos una empresa <strong>mayorista</strong> de productos del hogar, nos encontramos en Lima-Cercado, por favor visítanos.</p></div></div></div>
</section>           
            

             @component('components.breadcrumbs')
        <a href="/">Inicio</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>Tienda</span>
    @endcomponent
     <div class="container">
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

    <div class="products-section container">
        <div class="sidebar">
            <h3>Categorías</h3>
            <ul>
                @foreach ($categories as $category)
                    <li class="{{ setActiveCategory($category->slug) }}"><a href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div> <!-- end sidebar -->
        <div>
            <div class="products-header">
                <h1 class="stylish-heading">{{ $categoryName }}</h1>
                <div>
                    <strong>Precio: </strong>
                    <a href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'low_high']) }}">Menor a mayor</a> |
                    <a href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'high_low']) }}">Mayor a menor</a>

                </div>
            </div>

            <div class="products text-center">
                @forelse ($products as $product)
                    <div class="product polaroid ">
                        <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt="product"></a>
                        <a href="{{ route('shop.show', $product->slug) }}"><div class="product-name">{{ $product->name }}</div></a>
                        <div class="product-price">{{ $product->presentPrice() }}</div>

                    </div>
                @empty
                    <div style="text-align: left">No items found</div>
                @endforelse


               




            </div> <!-- end products -->

            <div class="spacer"></div>
            {{ $products->appends(request()->input())->links() }}
        </div>
    </div>




            @include('partials.footer')

           

        </div> <!-- end #app -->
        <script src="js/app.js"></script>
        <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js?v=1.2') }}"></script>
    <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
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
    </body>
</html>


