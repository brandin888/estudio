<!doctype html>

<style type="text/css">
  header {
    height: 600px;

  }
  @media (max-width: 992px) {
    header {
    height: 120px;

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
  box-shadow: 0 4px 8px 0 rgba(192, 87, 210, 0.5);
  
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
    background-image: url("img/parallax/footer.jpg");
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
  background: #00053e;
  position: fixed;
  top: 0;
  z-index: 1234;
  display: none;
}

.menu__responsive .logo__responsive {
  width: 100%;
  
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
  color: #ff2a00;
  border-color: #110041;
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
  background: #ff2a00;
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
    padding: 5px;
  }
}

@media (max-width: 991px) {
  
  
  header .top-nav {
    
    display: none;
  }
 .top-nav-right{
    display: none;
 }

  #algolia-autocomplete-listbox-0 {
 
  width: 280px;
 }

  .menu__responsive {
    display: flex;
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
.top-nav {
  background-color: white;
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
  top: 20px;
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
  color: #110041;
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
  border-bottom: solid 1px #ffc500;
}
.nav-expand-content .nav-link {
  background-color: #f7e5ff;
}
.nav-expand-content .nav-back-link {
  display: -webkit-box;
  display: flex;
  -webkit-box-align: center;
          align-items: center;
  background-color: #f58634 !important;
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
  background-color: #f7e5ff;
}
.nav-expand .nav-expand-content .nav-link {
  background-color: #ffe9d8;
}
.nav-expand .nav-expand-content .nav-expand-content {
  background-color: #aff1e6;
}
.nav-expand .nav-expand-content .nav-expand-content .nav-link {
  background-color: #ffe9d8;
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





.carousel2 {
  
  position: relative;
  width: 100%;
  height: 50em;
  margin: 0 auto;
  transform-style: preserve-3d;
  transition: transform 0.5s ease;

  
}
.carousel2[data-slide="1"] {
  transform: rotateY(0deg);
}
.carousel2[data-slide="2"] {
  transform: rotateY(-90deg);
}
.carousel2[data-slide="3"] {
  transform: rotateY(-180deg);
}
.carousel2[data-slide="4"] {
  transform: rotateY(-270deg);
}
.slides {
  position: absolute;
  width: 100%;
  
  background: white;
  height: 400px;
}
.slides img {
  width: 100%;
  height: 400px;
}
.back, .slides:nth-child(3) {
  transform: translateZ(-25em) rotateY(180deg);
}
.right, .slides:nth-child(2) {
  transform: rotateY(-270deg) translateX(50%);
  transform-origin: top right;
}
.left, .slides:nth-child(4) {
  transform: rotateY(270deg) translateX(-50%);
  transform-origin: center left;
}
.front, .slides:nth-child(1) {
  transform: translateZ(25em);
}
.next, .prev {
  position: absolute;
  top: 70%;
  right: 0;
  width: 6em;
  margin-top: -2.5em;
  border-radius: 3px;
  background-color: transparent;
  text-align: center;
  line-height: 3;
  letter-spacing: 5px;
  color: #dc84b3;
  transform: translateY(-50%);
  cursor: pointer;
  font-size: 60px;
}
.prev:hover {
   color: #fff;
  opacity: .9;
}
.prev {
  left: 25%;
}
.next:hover { 
   
  color: #fff;
  opacity: .9;
}
.cf:before, .slides:before,
.cf:after,
.slides:after {
  content: " ";
  display: table;
}
.cf:after, .slides:after {
  clear: both;
}
.cf, .slides {
  *zoom: 1;
}
.col-md-3S{
      flex: 0 0 20%;
    max-width: 20%;
    position: relative;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    background-color: transparent;
}

.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #6b307b;
    border-color: #6b307b;
}
</style>


<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#dd8cb4" />
        <title>Litercorp | Ferreteria</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('img/diseño/icono.png') }}" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{ asset('css/all.css?v=1.1') }}" rel="stylesheet"> <!--load all styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css?v=1.6') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css?v=1.4') }}">
        <link rel="stylesheet" href="{{ asset('css/algolia.css?v=1.1') }}">

        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<style type="text/css">
  .page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #6b307b;
    border-color: #6b307b;
}</style>
    </head>
    <body>

        <!-- Load Whatsapp -->
          


        <div>
          <a class="appWhatsapp" target="_blanck" href="https://api.whatsapp.com/send?phone=51945774749&Hola&nbsp;Litercorp&nbsp;quisiera&nbsp;cotizar&nbsp;el&nbsp;siguiente&nbsp;producto">
            <img src="{{ asset('img/whatsapp.png') }}" alt="whatsapp">
          </a> 
        </div>
        <!-- end Whatsapp -->
        
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
        page_id="103421061443777"
  logged_in_greeting="Hola Aletoysi..!!!"
  logged_out_greeting="Hola Aletoysi..!!!">
      </div>
     
       <!-- Your Chat Plugin code -->


      

        <div >

            <header >
                <div class="top-nav " style=" position: fixed;z-index: 2;width: 100%" >
                  
                  <div style="width: 100%; height: 100px; display: flex;">
                      <div > <a href="{{ url('/') }}/"><img src="{{ asset('img/diseño/logoweb2.png') }}" style=" width: 400px; padding-left: 60px"></a></div>
                   
                    
                      
                    <div class="top-nav-right"  style="text-align: left;">
                      <img style="width: 100px; height: 100px" src="{{ asset('img/diseño/avatar.png') }}">
                      @include('partials.menus.main-right')
                        
                    </div>

                  </div>
                
                

                    <div class="" style="text-align: center; display: flex; padding: 0px 100px; margin-right: 50px; height:   35% ;">
                     
                      <a class="nav-link" style="border-top: 2px solid #f58634" href="{{ url('/nosotros') }}/"><i class="fa fa-user" aria-hidden="true"></i>Quienes somos</a>
                      <a class="nav-link" style="border-top: 2px solid #f58634" href="{{ url('/') }}/promociones"><i class="fa fa-tag" aria-hidden="true"></i>Promociones</a>
                      <a class="nav-link" style="border-top: 2px solid #f58634" class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gavel" aria-hidden="true"></i>
                          Categorías
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
                          <div style="display: grid; grid-template-columns: auto auto auto;">
                            @foreach($categories as $category)
                          <a class="dropdown-item" href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                      
                          
                          @endforeach
                          </div>
                          

                          
                        </div>
                        
                         <a class="nav-link" style="border-top: 2px solid #f58634" href=""><i class="fa fa-shopping-bag" aria-hidden="true"></i>Productos más vendidos</a>
                         <a class="nav-link" style="border-top: 2px solid #f58634" href=""><i class="fa fa-phone" aria-hidden="true"></i>Contáctanos</a>
                         <div style="border-top: 2px solid #f58634 ">
                              @include('partials.search')
                          </div>
                        
                         
                      </div>


                </div> <!-- end top-nav -->

                <div style="margin-top: 20px;">
                 <div class="row" style="margin-left: 0px; margin-right: 0px; height: 25em">
                  <div class="col-lg-3 carouselcontainer" style=" padding-left: 0px; padding-right: 0px ; height: 100%">

                    <ul class="list-group" style="overflow-y: scroll; height: 100%; border-bottom: 1px solid #f58634; z-index: 1; position: relative;     ">
                  <a class="list-group-item" style="border-bottom: 1px solid #f58634" >Categorías</a>
                       @foreach($categories as $category)

                   <a class="list-group-item" style="border-bottom: 1px solid #f58634;" href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                              
                      @endforeach
                      
                      
                    </ul></div>
                  <div class="col-lg-9 carousel2" style="padding-left: 0px; padding-right: 0px" data-slide="1">
                    @foreach($banners as $banner)
                    <div class="slides">
                      <img src="{{ categoryImage($banner->imagen) }}" />
                    </div>
          
                      @endforeach
                    
                    
                    <div class="slides">
                      <img src="{{ asset('img/diseño/slider2.jpg') }}" />
                    </div>
                    <div class="slides">
                      <img src="{{ asset('img/diseño/slider1.jpg') }}" />
                    </div>
                     <div class="slides">
                      <img src="{{ asset('img/diseño/slider4.jpg') }}" />
                    </div>
                </div>
                </div>
  <div class="next"> &#8680;</div>
  <div class="prev">&#8678; </div>
</div>
                
            </header>

            <section class="section_definir section_fuente">
  <div class="container-fluid">
    <div class="row justify-content-md-center" >
      
      <div class="col-sm-6 col-md-6 pr-pl0 " style="padding-left: 0px;">
        <img src="{{ asset('img/diseño/present.jpg') }}" alt="">
      </div>
      
      <div class="col-sm-6 col-md-6 col-md-offset-2 text-center ">
        <div class="col-md-12">
          <p class="diseño_virtual"><strong>Bienvenidos a Litercorp</strong></p><br>
        </div> 
        <p class="wow fadeIn animated texto " data-wow-delay="0.2s" >Somos una Empresa dedicada a la Distribución de productos de Ferretería 
        a los sectores que lo requieren, mediante el innovador y permanente Servicio; generando Progreso y Estabilidad a las Personas que hacen posible la Existencia de 
        esta Empresa, siendo así un aliado Estratégico de Nuestros Clientes, Proveedores y Colaboradores, comprometidos con el Bienestar de la Sociedad.</p>

        
      </div>
      

      

    </div>

  </div>



</section>

           <div class="menu__responsive"  style="background-image: url('{{ asset('img/diseño/fondo.jpg') }}');">

              <div class="logo__responsive">
                <a href="{{ url('/') }}/"> <span class="cart-count"><img src="{{ asset('img/diseño/logoweb2.png') }}" style=" width: 200px; height: 60px"></span></a>

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
                        <div ><a href="{{ route('shop.show', $product->slug) }}"><div class="product-name" style=" color: #171260;">{{ $product->name }} </div></a>
                        <div class="product-price" style="font-weight: bold; color: #171260;">{{ $product->presentPrice() }}</div></div>
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

<script type="text/javascript">

/** Code By Webdevtrick ( https://webdevtrick.com ) **/
var $carousel = $('.carousel2'),
    currentSlide, nextSlide;
 
$('.next').click(function() {
  currentSlide = $carousel.attr('data-slide');
  nextSlide = +currentSlide === 4 ? 1 : +currentSlide + 1;
  $carousel.attr('data-slide', nextSlide);
});
 
$('.prev').click(function() {
  currentSlide = $carousel.attr('data-slide');
  nextSlide = +currentSlide === 1 ? 4 : +currentSlide - 1;
  $carousel.attr('data-slide', nextSlide);
});
</script>
    </body>
</html>


<script>
$('#recipeCarousel').carousel({
  interval: 10000
})

$('.carousel .carousel-item').each(function(){
    var minPerSlide = 10;
    var next = $(this).next();
    if (!next.length) {
    next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
    
    for (var i=0;i<minPerSlide;i++) {
        next=next.next();
        if (!next.length) {
        	next = $(this).siblings(':first');
      	}
        
        next.children(':first-child').clone().appendTo($(this));
      }
});



</script>
<style>
@media (max-width: 768px) {
    .carousel-inner .carousel-item-right.active,
    .carousel-inner .carousel-item-next {
      transform: translateX(33.33%);
    }
    
    .carousel-inner .carousel-item-left.active, 
    .carousel-inner .carousel-item-prev {
      transform: translateX(-33.33%);
    }
    .col-md-3S{
      flex: 0 0 33.33%;
    max-width: 33.33%;
  
}
}

.carousel-inner .carousel-item.active,
.carousel-inner .carousel-item-next,
.carousel-inner .carousel-item-prev {
    display: flex;
}

/* display 3 */
@media (min-width: 768px) {
    
    .carousel-inner .carousel-item-right.active,
    .carousel-inner .carousel-item-next {
      transform: translateX(20%);
    }
    
    .carousel-inner .carousel-item-left.active, 
    .carousel-inner .carousel-item-prev {
      transform: translateX(-20%);
    }
}

.carousel-inner .carousel-item-right,
.carousel-inner .carousel-item-left{ 
  transform: translateX(0);
}


</style>
    </body>
</html>
