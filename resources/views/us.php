
<style type="text/css">
    div.polaroid {
  width: 100%;
  background-color: white;
  padding: 0px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
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

.nosotros {
  padding: 100px 0px;
  position: relative;
}

.nosotros .demonio {
  position: absolute;
  bottom: 0;
  left: 0;
  z-index: 1;
}

.nosotros .dinoRex {
  position: absolute;
  bottom: -18px;
  left: 16.4rem;
}

.nosotros .mono {
  position: absolute;
  bottom: -33px;
  left: 14rem;
  z-index: 1;
}

.nosotros__content__parrafo {
  font-family: 'Lato', sans-serif;
  color: #253b56;
  font-size: 22px;
  font-weight: 700;
  line-height: 30px;
  margin-top: 60px;
}

.nosotros__content__parrafo span {
  color: #f99300;
  font-weight: 900;
}

.nosotros__video {
  background-color: #253b56;
  background-repeat: no-repeat;
  background-position: 50%;
  background-size: cover;
  background-attachment: fixed;
  height: 100vh;
  margin-top: -75px;
  position: relative;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -webkit-animation: zoomin 20s ease-in infinite;
  animation: zoomin 20s ease-in infinite;
  -webkit-transition: all 8s ease-in-out;
  transition: all 8s ease-in-out;
  overflow: hidden;
}

.nosotros__video__play {
  position: absolute;
  width: 111px;
  height: 111px;
  padding: 9px;
  left: 0;
  right: 0;
  margin: auto;
  border-radius: 50%;
  background: #f7744f;
  background: -webkit-gradient(left top, right top, color-stop(0%, #f7744f), color-stop(50%, #f8802b), color-stop(100%, #f99100));
  background: -webkit-gradient(linear, left top, right top, from(#f7744f), color-stop(50%, #f8802b), to(#f99100));
  background: linear-gradient(to right, #f7744f 0%, #f8802b 50%, #f99100 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f7744f', endColorstr='#f99100', GradientType=1 );
}

.zoomout {
  width: 100%;
  height: 100vh;
  text-align: center;
  background: none;
  -webkit-animation: zoomout 20s ease-in infinite;
  animation: zoomout 20s ease-in infinite;
  -webkit-transition: all .5s ease-in-out;
  transition: all .5s ease-in-out;
  overflow: hidden;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}
</style>



@extends('layout')

@section('title', 'Products')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@endsection

@section('content')

    

    <section class="nosotros" id="nosotros">
  <img  data-aos="fade-right" src="{{ asset('images/nosotros/demonio.png') }}" class="demonio" alt="">
  <img  data-aos="fade-left" src="{{ asset('images/nosotros/dinoRex.png') }}" class="dinoRex hidden-xs" alt="">
  <img  data-aos="fade-up" src="{{ asset('images/nosotros/mono.png') }}" class="mono hidden-xs" alt="">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-4">
        <div class="nosotros__content">
          <p class="nosotros__content__parrafo">Es un <span>parque temático</span> de <span>realidad virtual</span> que te permitirá vivir una <span>experiencia distinta</span> y que hará de tus días algo <span>inolvidable.</span></p>
        </div>
      </div>
      <div class="col-md-6 col-sm-8 offset-md-2">
        <img src="{{ asset('images/nosotros/nosotros.png') }}" class="img-fluid" alt="">
      </div>
    </div>
  </div>
</section>
<div class="hiden-video">
  <section class="nosotros__video" style="background-image:url(storage/{{$video->imagen}});">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="zoomout">
            <a href="{{$video->link}}" data-toggle="modal" data-target="#nosotrosVideo1">
              <div class="nosotros__video__play">
                <div class="nosotros__video__play--icon">
                  <img src="{{asset('images/icons/icon-play.png') }}" alt="">
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<section class="parque__Atraccion">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="parque__Atraccion__item parque__Atraccion__item--center">
          <img  data-aos="fade-left" src="{{ asset('images/nosotros/bruja.png') }}" class="bruja hidden-xs" alt="">
          <img  data-aos="fade-right" src="{{ asset('images/nosotros/parque_atraccion_1.png') }}" class="img-fluid hidden-xs" alt="">
        </div>
      </div>
      <div class="col-md-4">
        <div class="parque__Atraccion__item parque__Atraccion__item--center">
          <img  data-aos="fade-right" src="{{ asset('images/promociones/murcielago.png') }}" class="murci1" alt="">
          <img  data-aos="fade-left" src="{{ asset('images/promociones/murcielago.png') }}" class="murci2" alt="">
          <img  data-aos="fade-right" src="{{ asset('images/nosotros/parque_atraccion_2.png') }}" class="img-fluid" alt="">
          <img  data-aos="fade-left" src="{{ asset('images/nosotros/muneco.png') }}" class="muneco" alt="">
        </div>
      </div>
      <div class="col-md-4 d-flex align-items-center">
        <div class="parque__Atraccion__item">
          <h2>PARQUE DE ATRACCIONES</h2>
          <p>Aquí encontrarás atracciones únicas de experiencia inmersiva para toda la familia. </p>
          <p>¡Te esperamos de lunes a domingo en<span> MegaPlaza Lima Norte</span> y <span>Open Plaza Angamos</span> y <span>Real Plaza Cusco!</span> </p>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('extra-js')
<style>
  .col-md-3S{
      flex: 0 0 20%;
    max-width: 20%;
    position: relative;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    background-color: transparent;
}
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
    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js?v=1.2') }}"></script>
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

@endsection
