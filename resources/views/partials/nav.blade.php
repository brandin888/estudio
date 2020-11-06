<style type="text/css">
  .cyan.lighten-2 {
  background-color: #edf6ff !important;

}
.blue.darken-4 {
    background-color: #01579b !important;
}


.menu__responsive {
  width: 100%;
  height: 58px;
  background: #003166;
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
  color: #ffb700;
  border-color: #110041;
}

.menu__responsive .carrito_top a span {
  color: #ffb700;
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
  background: #ffb700;
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
  body {
    margin-top: 58px;
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
  header .top-nav{
    display: none;
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
  top: 8px;
  right: 0;
  width: 345px;
  height: 90vh;
  background-color: white;
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
  border-bottom: solid 1px #ffb700;
}
.nav-link {
  display: block;
  
  background-color: #fff;
  color: #110041;
  font-size: 0.9rem;
  line-height: 1em;
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
  background-color: white !important;
  color: #003166;
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
  background-color: #ffb700;
}
.nav-expand .nav-expand-content .nav-link {
  background-color: #ffb700;
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
.nav-link {
    display: flex;
    background-color: transparent;
    color: #ffffff;
    align-items: flex-start;
}
.nav-link2{
  font-weight: bold;
  color: #292e31;
}
.nav-link2:hover{
  font-weight: bold;
  color: #ffffff;
}
.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #ff5a00;
    border-color: #ff5a00;
}

.redes__link{
  color: black;
  padding-left: 25%;
}

.dropdown-item.active, .dropdown-item:active {
    color: #fff;
    text-decoration: none;
    background-color: #ff5a00;

}
.pad10{
  padding-top: 12px;
  padding-bottom: 12px;
  font-size:16px;
  color:#4b4b4b;
  padding-left: 16px;
}

.pad10{
  padding-top: 12px;
  padding-bottom: 12px;
  font-size:16px;
  color:#4b4b4b;
  padding-left: 16px;
}


header .top-nav {
  
 
  background-color: #003166;
  height: 80px;
}
.partials-search{
  padding-left: 15%;
}
a:not([href]):hover, a:not([href]):focus {
    color: #ffb700;
    text-decoration: none;
}
.dropdown-item:focus, .dropdown-item:hover {
    color: white;
    text-decoration: none;
    background-color: #ffb700;
}
</style>
<header >
  
                <div class="top-nav " id="top-nav" style=" position: fixed;width: 100%" >

                  
                  
             
                
                

                    <div id="top-nav2" class="d-flex align-items-center" style="text-align: center; display: flex; margin: 5px 35px;  height:   70% ;">
                      <a href="{{ url('/') }}/"><img src="{{ asset('img/diseño/liter.png') }}" style=" width: 180px; padding-left: 0px; max-width: 180px;height: 30px"></a>
                      <a class="nav-link colorban"  href="{{ url('/') }}/">Inicio</a>
                      
                      <a class="nav-link colorban" class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Categorías
                        </a>
                        <div  class="dropdown-menu " aria-labelledby="navbarDropdown" >
                          <div style="display: grid; grid-template-columns: auto auto auto;">
                            @foreach($categories as $category)
                          <a class="dropdown-item" href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                      
                          
                          @endforeach
                          </div>
                          

                          
                        </div>
                        
                      <!-- <a class="nav-link colorban"  href="{{ url('/') }}/"><i class="fa fa-shopping-bag" aria-hidden="true"></i>PRODUCTOS MÁS VENDIDOS</a> -->
                      <a class="nav-link colorban"  href="{{ url('/') }}/seguimiento">Tu Compra</a>
                      <a class="nav-link colorban" href="{{ url('/') }}/contacto">Contactar</a>

                      <div class="partials-search" >
                              @include('partials.search')
                      </div>
                      <div class="btn-group">
  <a type="button" class="nav-link colorban" class="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 27px;">
    <i class="fa fa-user fa-3" aria-hidden="true"></i>
  </a>
  <div class="dropdown-menu">

        @guest
            <a class="dropdown-item" href="{{ route('register') }}">RegistrarseE</a>
            <a class="dropdown-item" href="{{ route('login') }}">Iniciar Sesión</a>
        @else
            <a class="dropdown-item" href="#">Mi Cuenta</a>     
            <a class="dropdown-item" href="{{ route('users.edit') }}">Mi Perfil</a></li>
            <a class="dropdown-item" href="{{ route('orders.index') }}">Mis Órdenes</a></li>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                SALIR SESIÓN
            </a>
       
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        @endguest


    
  </div>
</div>

<a style="font-size: 27px ;align-items: baseline;" class="nav-link colorban" href="{{ url('/') }}/cart"><i class="fas fa-shopping-cart"></i> @if (Cart::instance('default')->count() > 0)
        <span class="pl-2"><span>({{ Cart::instance('default')->count() }})</span></span>
        @endif</a>
            
                        
                         
                    </div>


                </div> <!-- end top-nav -->
</header>
 <div class="menu__responsive"  style="background-image: url('{{ asset('img/diseño/fondo.jpg') }}');">

              <div class="logo__responsive">
                <a href="{{ url('/') }}/"> <span class="cart-count"><img src="{{ asset('img/diseño/logoweb2.png') }}" style=" width: 200px; height: 60px"></span></a>

              </div>
             
            <div class="carrito_top" style=" padding-right: 15px;">

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
<nav class="nav-drill">
  <ul class="nav-items nav-level-1">
    <li class="nav-item pad10">
      <a class="nav-link nav-link2" href="{{ url('/') }}">
        Inicio
      </a>
    </li>
    <li class="nav-item pad10">
      <a class="nav-link nav-link2" href="{{ url('/seguimiento') }}">
        Tu Compra
      </a>
    </li>

    <li class="nav-item pad10">
      <a class="nav-link nav-link2" href="{{ url('/') }}/cart">
        CARRITO  @if (Cart::instance('default')->count() > 0)
    <span class="pl-2"><span>({{ Cart::instance('default')->count() }})</span></span>
    @endif
      </a>

    </li>
    <li class="nav-item nav-expand pad10">
      <a class="nav-link nav-link2 nav-expand-link" href="#">
        CATEGORÍAS
      </a>
      <ul class="nav-items nav-expand-content">
      @foreach($categories as $category)
            <li  class="nav-item"><a class="nav-link nav-link2" href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
      <li>
      @endforeach
      
        
       
        
      </ul>
    </li>
    

    @guest
    <li class="nav-item pad10"><a class="nav-link nav-link2" href="{{ route('register') }}">REGISTRARSE</a></li>
    <li class="nav-item pad10"><a class="nav-link nav-link2" href="{{ route('login') }}">INICIAR SESIÓN</a></li>
    @else
    <li class="nav-item nav-expand pad10">
        <a class="nav-link nav-link2 nav-expand-link" href="#">Mi cuenta</a>

        <ul class="nav-items nav-expand-content">
      
            <li  class="nav-item pad10"><a class="nav-link nav-link2" href="{{ route('users.edit') }}">Mi Perfil</a></li>
            <li>

            <li  class="nav-item pad10"><a class="nav-link nav-link2" href="{{ route('orders.index') }}">Mis Órdenes</a></li>
            <li>
      
        


       
        
      </ul>
    </li>

    <li class="nav-item pad10">
        <a class="nav-link nav-link2" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Salir Sesión
        </a>
    </li>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    @endguest

    

    <li class="nav-item pad10">
      <a class="nav-link nav-link2" href="{{ url('/') }}/contacto">
        CONTACTAR
      </a>
    </li>
    
  </ul>
</nav>


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
          <li><a class="navbar__link" href="{{ url('/') }}/contacto">Contáctanos</a></li>
        </ul>
      </li>
      <!-- <li class="nav-item">
        <a class="navbar__link" href="#" data-toggle="modal" data-target="#modalIngresar"><i class="fas fa-key"></i><span class="pl-2">Ingresar</span></a>
      </li> -->

      <!-- <li class="nav-item">
        <a class="navbar__link" href="{{ route('register') }}"><i class="fas fa-user"></i><span class="pl-2">Crear cuenta</span></a>
      </li> -->
     

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

<script type="text/javascript">
  //Active Menu

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
<script>
// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("top-nav").style.height = "65px";
   document.getElementById("top-nav").style.backgroundColor = "#003166";
   document.getElementById("top-nav").style.boxShadow = "0px 15px 15px 5px rgba(0,0,0,.2)";
     document.getElementById("top-nav2").style.padding = "5px 20px";
    
    document.getElementById("top-nav2").style.color = "black";
    
    document.getElementById("top-nav2").style.margin = "5px 5px";
    
    var y = document.getElementsByClassName("nav-link");

    for (i = 0; i < y.length; i ++) {
    y[i].style.color = "white";
    }
  } else {
    document.getElementById("top-nav").style.height = "80px";
    document.getElementById("top-nav").style.boxShadow = "0 0px 0px 0px rgba(0,0,0,0)";
    document.getElementById("top-nav2").style.padding = "0px 0px";
    
    document.getElementById("top-nav2").style.margin = "5px 35px";
    document.getElementById("top-nav").style.backgroundColor = "#003166";
    document.getElementById("top-nav2").style.color = "white";
    var y = document.getElementsByClassName("nav-link");
    for (i = 0; i < y.length; i ++) {
    y[i].style.color = "white";
    }
  }
}
</script>
