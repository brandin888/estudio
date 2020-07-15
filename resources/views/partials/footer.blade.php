<style type="text/css">
	
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
    background-image: url("../images/cover4.jpg");
}
#action-parallax3 {
    background-image: url("img/parallax/pa.jpg");
}
#action-parallax4 {
    
    background-image: url("{{ asset('img/parallax/footer.jpg') }}");
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
.container {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
.row {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
.col-6 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
    padding-left: 5px;
}
.col-md-3 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
    padding-left: 5px;
}
.footer__titulo {
    font-size: 0.80rem;
    font-weight: bold;
    
}
.fab {
    font-family: 'Font Awesome 5 Brands';
}
.lista-footer__item a {
    font-size: 15px;
}
.redes__link {
    color: white;
}
.pl-3, .px-3 {
    padding-left: 1rem !important;
}
.pl-3, .px-3 {
    padding-left: 1rem!important;
}
.fab {
    font-family: 'Font Awesome 5 Brands';
}
.fa, .fas, .far, .fal, .fab {
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    display: inline-block;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    line-height: 1;
}
.lista-footer {
    padding-top: 30px;
    list-style: none;
    font-family: 'Lato', sans-serif;
    font-weight: 500;
    padding-left: 15px;
}
.lista-footer__item::before {
    content: "\2022";
    color: #f99300;
    display: inline-block;
    width: 1em;
    margin-left: -1em;

}

</style>

<footer data-type="background" data-speed="4" class="parallax fixed_p" id="action-parallax4" style="background-position: 50% 33.75px;
 z-index: 1;



"><div data-wow-duration="4s" class="container wow fadeIn  animated" style="visibility: visible; animation-duration: 4s; animation-name: fadeIn;">
    <div class="container" style="text-align: left;">
    <div class="row">
      

      <div class="col-6 ">
        <div class="footer__titulo">
          ENLACES
        </div>
        <ul class="lista-footer">
          <li class="lista-footer__item pt-0"><a href="{{ url('/') }}/contacto" class="navbar__link club-odssy pl-0">Contáctanos</a></li>
          <li class="lista-footer__item"><a href="{{ url('/') }}/contacto" class="navbar__link pl-0">Ubicación</a></li>
          <li class="lista-footer__item"><a href="{{ url('/') }}/" class="navbar__link pl-0">Productos populares</a></li>
          
        </ul>
      </div>

      <div class="col-6 ">
        <div class="footer__titulo">
          SÍGUENOS
        </div>
        <ul class="lista-footer lista-footer--padding-min">
          <li class="lista-footer__item lista-footer__item--nobullet pt-0"><a class="redes__link" href="https://www.facebook.com/ElMayoristasolopreciosxcaja/" target="_blank"><i class="fab fa-facebook-f"></i><span class="pl-3">Facebook</span></a></li>
          
    <li class="lista-footer__item lista-footer__item--nobullet"><a class="redes__link" href="   " target="_blank"><i class="fab fa-instagram"></i><span class="pl-3">Instagram</span></a></li>           
 </ul>
      </div>

    
     
    </div>
  </div>

</div>
</footer>
