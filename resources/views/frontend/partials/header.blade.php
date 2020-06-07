<header class="header">
  <hr>
  <!--Componente navbar-->
  <div class="container container-nav">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
      <a class="navbar-brand" href="{{ url('/') }}/">
        <img src="{{ asset('images/odyssey.png') }}" alt="" class="navbar__logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse flex-md-column" id="navbarCollapse">
        <div class="telefonos-container">
          <a class="navbar__link dropdown-toggle" href="" id="dropdownPhone" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-phone fa-rotate-90"></i><span class="pl-2">Teléfonos</span><i class="fas fa-angle-down pl-3"></i></a>
          <div class="dropdown-menu telefonos-container__content" aria-labelledby="dropdownPhone">
            @foreach($locales as $local)
            <a class="dropdown-item telefonos-container__content__item">
              <span class="titulo"><strong>{{ $local->nombre }}</strong> </span>
              <span class="numero"><i class="fas fa-phone fa-rotate-90"></i>{{ $local->telefono }}</span>
            </a>
            @endforeach
          </div>
        </div>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="navbar__link club-odssy" id="club" href="{{ url('/') }}/club-odyssey">Club Odyssey</a>
          </li>
          <li>.</li>
          <li class="nav-item">
            <a class="navbar__link" id="nosotros" href="{{ url('/') }}/nosotros">Quiénes Somos</a>
          </li>
          <li>.</li>
          <li class="nav-item">
            <a class="navbar__link" id="donde" href="{{ url('/') }}/donde-estamos">Dónde estamos</a>
          </li>
          <li>.</li>
          <li class="nav-item">
            <a class="navbar__link" id="contacto" href="{{ url('/') }}/contactanos">Contáctanos</a>
          </li>
          <!-- <li class="nav-item">
            <a class="navbar__link" href="#" data-toggle="modal" data-target="#modalIngresar"><i class="fas fa-key"></i><span class="pl-2">Ingresar</span></a>
          </li>
          <li class="nav-item">
            <a class="navbar__link" href="{{ url('/')}}/register"><i class="fas fa-user"></i><span class="pl-2">Crear cuenta</span></a>
          </li> -->
          @guest
              <li class="nav-item" id="ingrese_header">
                <a class="navbar__link" href="#" data-toggle="modal" data-target="#modalIngresar"><i class="fas fa-key"></i><span class="pl-2">Ingresar</span></a>
              </li>
              @if (Route::has('register'))
              <li class="nav-item" id="registro_header">
                <a class="navbar__link" href="#" data-toggle="modal" data-target="#modalRegister"><span class="pl-2">Crear cuenta</span></a>
                <!-- <a class="navbar__link" href="{{ route('register') }}"><i class="fas fa-user"></i><span class="pl-2">Crear cuenta</span></a> -->
              </li>
              @endif

              <li class="nav-item dropdown" id="pintarUsuario" style="display:none">
                  <a id="navbarDropdown"  class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: white; margin-top: -8px;">

                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{-- {{ __('Logout') }} --}}
                          Cerrar Sesión
                      </a>

                      <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>

          @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: white; margin-top: -8px;">
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  @if(Auth::user()->role_id == 2)
                    <a class="dropdown-item" href="{{ route('perfil') }}">Mi Perfil</a>
                  @endif
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{-- {{ __('Logout') }} --}}
                      Cerrar Sesión

                  </a>

                  <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>

          @endguest
          <!-- <li class="nav-item">
            <a class="navbar__link" href="{{ url('/')}}/mi-carrito"><i class="fas fa-shopping-cart"></i><span class="pl-2">(0)</span></a>
          </li> -->
          <!-- mi carrito -->
          <li class="nav-item"><a class="navbar__link" href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart"></i>
          @if (Cart::instance('default')->count() > 0)
            <span class="pl-2 " id="cart1" ><span>({{ Cart::instance('default')->count() }})</span></span>
            <span class="pl-2 cart" id="cart2" ></span>
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

          <li class="nav-item">
            <ul class="list-inline redes">
              <li class="list-inline-item"><a class="redes__link" href="https://www.facebook.com/odysseyperu/" target="_blank" ><i class="fab fa-facebook-f"></i></a></li>
              {{-- <li class="list-inline-item pl-2"><a class="redes__link" href="#"><i class="fab fa-instagram"></i></a></li>
              <li class="list-inline-item pl-2"><a class="redes__link" href="#"><i class="fab fa-youtube"></i></a></li> --}}
            </ul>
          </li>
        </ul>
        <div class="input-group menu-secondary">
          <ul class="navbar-nav ml-auto small">
            <li class="nav-item active">
              <a class=" navbar__link" id="boletos" href="{{ url('/')}}/boletos"><div class="icon icon-boleto"></div><span class="pl-2">BOLETOS</span></a>
            </li>
            <li class="nav-item">
              <a class="navbar__link" id="cumpleanio" href="{{ url('/')}}/arma-tu-cumpleanos"><div class="icon icon-cumple"></div><span class="pl-2">ARMA TU CUMPLEÑOS</span></a>
            </li>
            <li class="nav-item">
              <a class="navbar__link pr-0" id="promociones" href="{{ url('/')}}/promociones"><div class="icon icon-promo"></div><span class="pl-2">PROMOCIONES</span></a>
            </li>
          </ul>
        </div>
        </form>
      </div>
    </nav>
  </div>
  <!--Fin componente navbar-->
</header>

<!--menu responsive-->
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
      <li><a class=" navbar__link" href="{{ url('/')}}/boletos"><span class="icon icon-boleto" >BOLETOS</span></a></li>
      <li><a class="navbar__link" href="{{ url('/')}}/arma-tu-cumpleanos"><span class="icon icon-cumple">ARMA TU CUMPLEÑOS</span></a></li>
      <li><a class="navbar__link pr-0" href="{{ url('/')}}/promociones"><span class="icon icon-promo">PROMOCIONES</span></a></li>
      <li>
        <ul class="submenu">
          <li><a class="navbar__link" href="{{ url('/') }}/club-odyssey">Club Odyssey</a></li>
          <li>.</li>
          <li><a class="navbar__link" href="{{ url('/') }}/nosotros">Quiénes Somos</a></li>
          <li></li>
          <li><a class="navbar__link" href="{{ url('/') }}/donde-estamos">Dónde estamos</a></li>
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
          <li class="nav-item">
            <a class="navbar__link" href="#" data-toggle="modal" data-target="#modalIngresar"><i class="fas fa-key"></i><span class="pl-2">Ingresar</span></a>
          </li>
          @if (Route::has('register'))
          <li class="nav-item">
            <a class="navbar__link" href="#" data-toggle="modal" data-target="#modalRegister"><span class="pl-2">Crear cuenta</span></a>
          </li>
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
