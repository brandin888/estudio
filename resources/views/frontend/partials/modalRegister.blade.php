<!-- Modal -->
<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modalIngresar modal-dialog-centered" role="document">
    <div class="modal-content" style="background-image:url(../resources/images/banner/bg-modal-ingresar.png);">
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
            <form class="col-md-10 col-12 col-sm-12 m-auto" method="POST" action="{{ route('register') }}">
              @csrf

              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text"><img src="{{ asset('images/icons/usuario.png') }}" alt=""> </div>
                </div>
                  <input id="nombre_register" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Nombre" required autofocus>
                  @if ($errors->has('name'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
              </div>

              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text"><img src="{{ asset('images/icons/usuario.png') }}" alt=""> </div>
                </div>
                  <input id="apellido_register" type="text" class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" name="apellido" value="{{ old('apellido') }}" placeholder="Apellidos" required autofocus>
                  @if ($errors->has('apellido'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('apellido') }}</strong>
                      </span>
                  @endif
              </div>

              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text"><img src="{{ asset('images/icons/mail.png') }}" alt=""> </div>
                </div>
                <input id="email_register" type="email-register" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Correo" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>

              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text"><img src="{{ asset('images/icons/phone.png') }}" alt=""> </div>
                </div>
                <input  type="text" class="form-control" name="telefono" value="" placeholder="Teléfono" required>
                @if ($errors->has('telefono'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('telefono') }}</strong>
                    </span>
                @endif
              </div>

              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text"><img src="{{ asset('images/icons/contrasena.png') }}" alt=""> </div>
                </div>
                <input id="password_register" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" autocomplete="off" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>

              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text"><img src="{{ asset('images/icons/contrasena.png') }}" alt=""> </div>
                </div>
                <input id="password-confirm-register" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña" autocomplete="off" required>
              </div>

              <div class="input-group">
                 <button type="submit" class="btn btn-primary btn-ingresa">Crear cuenta</button>
              </div>

            {{-- <!--  <a href="{{ url('login/facebook') }}" class="btn__facebook"><i class="fab fa-facebook-f"></i> Ingresa o registrate con facebook</a>--> --}}
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Register con Ajax -->
<div class="modal fade" id="modalRegister2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modalIngresar modal-dialog-centered" role="document">
    <div class="modal-content" style="background-image:url(../resources/images/banner/bg-modal-ingresar.png);">
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
            <form class="col-md-10 col-12 col-sm-12 m-auto" id="formRegistro2" method="post" action="{{ url('registro-ajax') }}">
              <input type="hidden" name="_token" id="toKen2" value="{{ csrf_token() }}">

              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text"><img src="{{ asset('images/icons/usuario.png') }}" alt=""> </div>
                </div>
                  <input id="nombre_b" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Nombre" required autofocus>
              </div>

              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text"><img src="{{ asset('images/icons/usuario.png') }}" alt=""> </div>
                </div>
                  <input type="text" class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" name="apellido" value="{{ old('apellido') }}" placeholder="Apellidos" required autofocus>
              </div>

              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text"><img src="{{ asset('images/icons/mail.png') }}" alt=""> </div>
                </div>
                <input  type="email-register" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Correo" required>
                <span class="mensaje-u-register" role="alert">
                <strong id="mensaje-usuario3"> </strong>
                </span>
              </div>

              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text"><img src="{{ asset('images/icons/phone.png') }}" alt=""> </div>
                </div>
                <input  type="text" class="form-control" name="telefono" value="" placeholder="Teléfono" required>

              </div>

              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text"><img src="{{ asset('images/icons/contrasena.png') }}" alt=""> </div>
                </div>
                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" autocomplete="off" required>
              </div>

              {{-- <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text"><img src="{{ asset('images/icons/contrasena.png') }}" alt=""> </div>
                </div>
                <input id="contrasenia-confirm-b" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña" required>
              </div> --}}

              <div class="input-group">
                 <button type="submit" class="btn btn-primary btn__enviar">Crear cuenta</button>
              </div>

            {{-- <!--  <a href="{{ url('login/facebook') }}" class="btn__facebook"><i class="fab fa-facebook-f"></i> Ingresa o registrate con facebook</a>--> --}}
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
