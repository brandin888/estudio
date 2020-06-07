<!-- Modal -->
<div class="modal fade" id="modalReset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email3" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Recuperar contraseña
                        </button>
                    </div>
                </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
