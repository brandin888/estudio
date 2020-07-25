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
  background: #ffffff;
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
  color: #110041;
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
  background: #110041;
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
<header >
  
 <div class="top-nav " style=" position: fixed;z-index: 2;width: 100%" >
                  
                  <div style="width: 100%; height: 100px; display: flex;">
                      <div > <a href="{{ url('/') }}/"><img src="{{ asset('img/diseño/logoweb2.png') }}" style=" width: 400px; padding-left: 60px"></a></div>
                   
                    
                      
                    <div class="top-nav-right"  style="text-align: left;">
                      <img style="width: 100px; height: 100px" src="{{ asset('img/diseño/avatar.png') }}">
                      @include('partials.menus.main-right')
                        
                    </div>

                  </div>
                
                

                    <div class="" style="text-align: center; display: flex; padding: 0px 100px; margin-right: 50px">
                      
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
</header>
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


<!-- Overlay menu -->
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