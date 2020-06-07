<footer class="footer container-fluid">

  <div class="container">
    <div class="row">
      <div class="col-12 col-md-3">
        <img src="{{ asset('images/logo-footer.png') }}" class="img-fluid" alt="">

        <ul class="list-inline pt-3">
          <li class="list-inline-item"><img src="{{ asset('images/visa.png') }}" class="img-fluid" alt=""></li>
        </ul>
        <div class="webtilia d-none d-sm-block">
          © 2018 ODYSSEY Todos los derechos reservados.
          <br><a href="https://webtilia.com" target="_blank" class="webtilia__link">By Webtilia</a>
        </div>
      </div>

      <div class="col-6 col-md-3">
        <div class="footer__titulo">
          ENLACES
        </div>
        <ul class="lista-footer">
          <li class="lista-footer__item pt-0"><a href="{{ url('/') }}/club-odyssey" class="navbar__link club-odssy pl-0">Club Odyssey</a></li>
          <li class="lista-footer__item"><a href="{{ url('/') }}/boletos" class="navbar__link pl-0">Boletos</a></li>
          <li class="lista-footer__item"><a href="{{ url('/') }}/promociones" class="navbar__link pl-0">Promociones</a></li>
          <li class="lista-footer__item"><a href="{{ url('/') }}/trabaja-con-nosotros" class="navbar__link pl-0">Trabaja con nosotros</a></li>
        </ul>
      </div>

      <div class="col-6 col-md-3">
        <div class="footer__titulo">
          SÍGUENOS
        </div>
        <ul class="lista-footer lista-footer--padding-min">
          <li class="lista-footer__item lista-footer__item--nobullet pt-0"><a class="redes__link" href="https://www.facebook.com/odysseyperu/" target="_blank"><i class="fab fa-facebook-f"></i><span class="pl-3">Facebook</span></a></li>
          {{-- <li class="lista-footer__item lista-footer__item--nobullet"><a class="redes__link" href="#"><i class="fab fa-instagram"></i><span class="pl-3">Instagram</span></a></li>
          <li class="lista-footer__item lista-footer__item--nobullet"><a class="redes__link" href="#"><i class="fab fa-youtube"></i><span class="pl-3">Youtube</span></a></li> --}}
        </ul>
      </div>

      <div class="col-12 col-md-3">
        <div class="footer__titulo pl-0">
          SUSCRÍBETE
        </div>
        <p class="footer__parrafo pl-0">Ingresa tus datos y únete a la mejor experiencia de entretenimiento.</p>
        <form id="formSuscripcion" name="formSuscripcion" method="post" action="{{url('suscripcion')}}">
          <p>
              <input type="hidden" name="_token" id="csrf_toKen" value="{{ csrf_token() }}">
              <input type="email" class="form-control bg-transparent footer__input" name="correo" id="correo" placeholder="Correo" aria-label="Correo" aria-describedby="Correo">
              <label for="correo" generated="true" class="error"></label>
          </p>
          <p class="envio">Al enviar mi correo certifico que acepto <a href="#" data-toggle="modal" data-target="#modalCondicion">las Condiciones de Uso</a> y <a href="#" data-toggle="modal" data-target="#modalPolitica">la Política de Privacidad.</a></p>
          <p>
            <button type="submit" class="btn btn-primary">CONTINUAR</button>
          </p>
        </form>
      </div>
      <div class="col-12">
        <div class="webtilia d-block d-sm-none">
          © 2018 ODYSSEY Todos los derechos reservados.
          <br><a href="https://webtilia.com" target="_blank" class="webtilia__link">By Webtilia</a>
        </div>
      </div>
    </div>
  </div>

</footer>
