<!-- Modal -->
<div class="modal fade" id="modalIngresar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modalIngresar modal-dialog-centered" role="document">
    <div class="modal-content" style="background-image:url( {{ asset('images/banner/bg-modal-ingresar.png') }} );">
      <div class="modal-body modalIngresar__body d-flex align-items-center">
        <button type="button" class="close modalIngresar__body__icon" data-dismiss="modal" aria-label="Close">
          <img src="{{ asset('images/icons/cerrar.png') }}" alt="">
        </button>
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-12 col-sm-12">
              <div class="modalIngresar__body__logo">
                <img src="{{ asset('images/logo-blanco.png') }}" class="img-fluid" alt="">
              </div>
            </div>
            <form class="col-md-10 col-12 col-sm-12 m-auto" method="POST" action="{{ route('login') }}">
              @csrf
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text"><img src="{{ asset('images/icons/usuario.png') }}" alt=""> </div>
                </div>
                <input type="hidden" name="previus" value="{{ Route::currentRouteName() }}">
              
                <!-- <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Usuario"> -->
                <input id="email-ingresa" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Usuario" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text"><img src="{{ asset('images/icons/contrasena.png') }}" alt=""> </div>
                </div>
                <!-- <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Contraseña"> -->
                <input id="password-ingresa" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" autocomplete="off" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
              <div class="input-group">
                 <!-- <a href="#" class="btn btn-primary btn-ingresa">INGRESAR</a> -->
                 <button type="submit" class="btn btn-primary btn-ingresa">INGRESAR</button>
              </div>

           <a href="{{ url('login/facebook') }}" class="btn__facebook"><i class="fab fa-facebook-f"></i> Ingresa o registrate con facebook</a>

            {{-- <a class="btn btn-primary" href="{{ url('login/facebook') }}">
                Facebook
            </a> --}}

            </form>
            <div class="col-md-6 col-12 col-sm-12">
              <div class="modalIngresar__body__link">
                <span>¿Eres nuevo? <a href="#" data-toggle="modal" data-target="#modalRegister">Click aquí</a></span>

              </div>
            </div>
            <div class="col-md-6 col-12 col-sm-12">
              <div class="modalIngresar__body__link">
                {{-- <a href="#" data-toggle="modal" data-target="#modalReset">Olvido su contraseña</a> --}}
                <a href="{{ url('password/reset') }}" >Olvidé mi contraseña</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
