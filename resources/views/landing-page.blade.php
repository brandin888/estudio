<!doctype html>

<style type="text/css">
  header {
    height: 600px;

  }
  @media (max-width: 992px) {
    header {
    height: 450px;

  }
  }
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

img {width: 100%;
max-height: 150;}

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
  background: linear-gradient(to right, #4ec1ffa3 0%, #01579b8f 50%, #003b69ad 100%);
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
  padding: 10px;
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
  top: 57%;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
}

#nav-content ul {
  margin: 0 auto;
  padding: 0;
  list-style: none;
  text-align: left;
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
    padding: 16px;
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






@import "https://fonts.googleapis.com/css?family=Fira+Sans:300,400";
@import "https://fonts.googleapis.com/icon?family=Material+Icons";
* {
  box-sizing: border-box;
}


body::after {
  content: '';
  
  z-index: 99;
  
  height: 100vh;
  width: 100vw;
  -webkit-transition: 0.4s;
  transition: 0.4s;
  opacity: 0;
  visibility: hidden;
}

a {
  text-decoration: none;
}

.nav-top {
  display: -webkit-box;
  display: flex;
  -webkit-box-align: center;
          align-items: center;
  position: fixed;
  z-index: 101;
  padding: 10px 20px;
  width: 100%;
  height: 50px;
  background-color: #188976;
}
.nav-top .hamburger {
  margin-left: auto;
  color: #fff;
  cursor: pointer;
}

.nav-drill {
  margin-top: 50px;
  -webkit-transform: translateX(100%);
          transform: translateX(100%);
}

.nav-is-toggled .nav-drill {
  -webkit-transform: translateX(0);
          transform: translateX(0);
}
.nav-is-toggled::after {
  opacity: 1;
  visibility: visible;
}

.nav-drill {
  display: -webkit-box;
  display: flex;
  position: fixed;
  z-index: 100;
  top: 0;
  right: 0;
  width: 250px;
  height: 90vh;
  background-color: #fff;
  overflow-y: auto;
  overflow-x: hidden;
  -webkit-overflow-scrolling: touch;
  -webkit-transition: 0.45s;
  transition: 0.45s;
}
.nav-items {
  -webkit-box-flex: 0;
          flex: 0 0 100%;
}
.nav-item:not(:last-child) {
  border-bottom: solid 1px #daf9f4;
}
.nav-link {
  display: block;
  padding: 0.875em 1em;
  background-color: #fff;
  color: #4d729c;
  font-size: 1rem;
  line-height: 1.5em;
  font-weight: 300;
}
.nav-expand-content {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  -webkit-transform: translateX(100%);
          transform: translateX(100%);
  background-color: #daf9f4;
  -webkit-transition: 0.3s;
  transition: 0.3s;
  visibility: hidden;
}
.nav-expand-content .nav-item:not(:last-child) {
  border-bottom: solid 1px #1565C0;
}
.nav-expand-content .nav-link {
  background-color: #daf9f4;
}
.nav-expand-content .nav-back-link {
  display: -webkit-box;
  display: flex;
  -webkit-box-align: center;
          align-items: center;
  background-color: #1565C0 !important;
  color: #fff;
}
.nav-expand-content .nav-back-link::before {
  content: "-";
  margin-right: 0.5em;
  font-family: "Material Icons";
}
.nav-expand-link {
  display: -webkit-box;
  display: flex;
  -webkit-box-pack: justify;
          justify-content: space-between;
}
.nav-expand-link::after {
  content: "+";
  -webkit-box-flex: 0;
          flex: 0 1 auto;
  font-family: "Material Icons";
}
.nav-expand.active > .nav-expand-content {
  -webkit-transform: translateX(0);
          transform: translateX(0);
  visibility: visible;
}
.nav-expand .nav-expand-content {
  background-color: #daebf9;
}
.nav-expand .nav-expand-content .nav-link {
  background-color: #daebf9;
}
.nav-expand .nav-expand-content .nav-expand-content {
  background-color: #aff1e6;
}
.nav-expand .nav-expand-content .nav-expand-content .nav-link {
  background-color: #aff1e6;
}
.nav-expand .nav-expand-content .nav-expand-content .nav-expand-content {
  background-color: #84e9d9;
}
.nav-expand .nav-expand-content .nav-expand-content .nav-expand-content .nav-link {
  background-color: #84e9d9;
}
.nav-expand .nav-expand-content .nav-expand-content .nav-expand-content .nav-expand-content {
  background-color: #59e1cb;
}
.nav-expand .nav-expand-content .nav-expand-content .nav-expand-content .nav-expand-content .nav-link {
  background-color: #59e1cb;
}
.fa-shopping-bag:before {
  content: "\F290";
}
.fa, .fas {
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
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
        <link href="{{ asset('css/all.css?v=1.1') }}" rel="stylesheet"> <!--load all styles -->

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css?v=1.4') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css?v=1.4') }}">
        <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">


         <!-- Global site tag (gtag.js) - Google Analytics -->
        <script data-ad-client="ca-pub-8718908287387658" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-169774086-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-169774086-1');
          gtag('set', {'user_id': 'USER_ID'}); // Establezca el ID de usuario mediante el user_id con el que haya iniciado sesión.
          
        </script>







       <!-- Facebook Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '271128407569193');
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=271128407569193&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Facebook Pixel Code -->
    </head>
    <body style="background-color: white; 
        background-repeat: no-repeat;
         background-size: 100% 100%;
          z-index: -1;
        ">
        <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v7.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_ES/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="2174827419500879"
  logged_in_greeting="Bienvenido a el mayorista. ¿En qué podemos ayudarte?"
  logged_out_greeting="Bienvenido a el mayorista. ¿En qué podemos ayudarte?">
      </div>
       <!-- Your Chat Plugin code -->

      
        <div id="app" >
            <header class="with-background" style="background-image: url('img/parallax/parallax9.jpg'); background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;">
                <div class="top-nav container">
                    <div class="top-nav-left">
                        <div class="logo">El mayorista</div>
                        {{ menu('main', 'partials.menus.main') }}
                    </div>
                    <div class="top-nav-right">
                        @include('partials.menus.main-right')
                    </div>
                </div> <!-- end top-nav -->
                <div class="hero container"  >
                    <div class="hero-copy">
                        <h1>El Mayorista</h1>
                        <h2>Ofrecemos productos variados para el hogar.</h2>
                        <div class="hero-buttons" style="padding-top: 20px">
                            <a href="{{ url('/') }}/shop" class="button button-white">Tienda</a>
                            <a href="{{ url('/') }}/contacto" class="button button-white">Contáctanos</a>
                        </div>
                    </div> <!-- end hero-copy -->

                    
                </div> <!-- end hero -->
            </header>

           <div class="menu__responsive">
  <div class="logo__responsive">
    <a href="{{ url('/') }}/"> <span class="cart-count"><span style="color:#e18604;  font-size: 25px; font-weight: bold"> El Mayorista</span></span></a>
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





<nav class="nav-drill">
  <ul class="nav-items nav-level-1">
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/') }}/cart">
        Carrito  @if (Cart::instance('default')->count() > 0)
    <span class="pl-2"><span>({{ Cart::instance('default')->count() }})</span></span>
    @endif
      </a>

    </li>
    
    <li class="nav-item nav-expand">
      <a class="nav-link nav-expand-link" href="#">
        Categorías
      </a>
      <ul class="nav-items nav-expand-content">
      @foreach($categories as $category)
            <li  class="nav-item"><a class="nav-link" href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
      <li>
      @endforeach
      
        
       
        
      </ul>
    </li>
    

    @guest
    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrarse</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a></li>
    @else
    <li class="nav-item nav-expand">
        <a class="nav-link nav-expand-link" href="#">Mi cuenta</a>

        <ul class="nav-items nav-expand-content">
      
            <li  class="nav-item"><a class="nav-link" href="{{ route('users.edit') }}">Mi Perfil</a></li>
            <li>

            <li  class="nav-item"><a class="nav-link" href="{{ route('orders.index') }}">Mis Órdenes</a></li>
            <li>
      
        


       
        
      </ul>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Salir Sesión
        </a>
    </li>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    @endguest

    

    <li class="nav-item">
      <a class="nav-link" href="{{ url('/') }}/contacto">
        Contáctanos
      </a>
    </li>
    
  </ul>
</nav>




 <section data-type="background" data-speed="4" class="parallax fixed_p"  style="background-color: #; height: 250px"><div data-wow-duration="4s" class="container wow fadeIn  animated" style="visibility: visible; animation-duration: 4s; animation-name: fadeIn; padding-top: 18px;"><div class="row"><div class="col-lg-10 col-lg-offset-1 text-center">
<i class="icon icon-heading ion-pie-graph size-96"></i>
<br><h2>El Mayorista</h2><p class="lead">
Somos una empresa <strong>Mayorista</strong> de productos del hogar, hacemos ventas por caja a todo Perú,  puedes encontrarnos en <a style="color: #01579b ; font-weight: bold;" href="{{ url('/') }}/contacto"> Lima Cercado </a>, visita nuestra página de  <a style="color: #01579b ; font-weight: bold;" href="https://www.facebook.com/ElMayoristasolopreciosxcaja/" target="_blank"> Facebook </a>.</p></div></div></div>
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
                  @if($product->quantity > 0)
                    <div class="product polaroid ">
                        <div ><a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt="product"></a></div>
                        <div ><a href="{{ route('shop.show', $product->slug) }}"><div class="product-name">{{ $product->name }}</div></a>
                        <div class="product-price">{{ $product->presentPrice() }}</div></div>
                    </div>
                  @endif
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
console.clear();

const navExpand = [].slice.call(document.querySelectorAll('.nav-expand'));
const backLink = `<li class="nav-item">
  <a class="nav-link nav-back-link" href="javascript:;">
    Volver
  </a>
</li>`;

navExpand.forEach(item => {
  item.querySelector('.nav-expand-content').insertAdjacentHTML('afterbegin', backLink);
  item.querySelector('.nav-link').addEventListener('click', () => item.classList.add('active'));
  item.querySelector('.nav-back-link').addEventListener('click', () => item.classList.remove('active'));
});


// ---------------------------------------
// not-so-important stuff starts here

const ham = document.getElementById('menu-icon-shape');
ham.addEventListener('click', function () {
  document.body.classList.toggle('nav-is-toggled');
});
</script>
    </body>
</html>


