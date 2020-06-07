<!-- Modal -->
<div class="modal fade" id="modalTrabaja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modalTrabaja modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body modalTrabaja__body">
        <button type="button" class="close modalTrabaja__body__icon" data-dismiss="modal" aria-label="Close">
          <img src="{{ asset('images/icons/cerrar-azul.png') }}" alt="">
        </button>
        <div class="container">
          <div class="row">
            <div class="col-md-6" style="padding-left:0;">
              <div class="body-img">
                <img src="{{ asset('images/bg-modal-postular.png') }}" class="img-fluid" alt="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="">
                <div class="formulario__content">
                  <h3>Postularme</h3>
                  <form class=""  id="formTrabaja" name="formTrabaja" method="post" action="{{url('trabaja-con-nosotros')}}">
                    <input type="hidden" name="_token" id="csrf_toKen-trabaja" value="{{ csrf_token() }}">

                    <div class="row" id="pasalo_">

                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Nombres</label>
                        <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Ejem: Melissa">
                        <label for="nombres" generated="true" class="error"></label>

                      </div>
                      <div class="form-group col-md-6">
                        <label>Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Ejem: Perez Perez">
                        <label for="apellidos" generated="true" class="error"></label>

                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>DNI</label>
                        <input type="text" class="form-control" name="dni" id="dni" placeholder="Ejem: 723 964 46">
                        <label for="dni" generated="true" class="error"></label>

                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputPassword1">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Ejem: 987 987 981">
                        <label for="telefono" generated="true" class="error"></label>

                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="exampleInputPassword1">EMAIL</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Ejem: usuario@gmail.com">
                        <label for="email" generated="true" class="error"></label>
                      </div>

                    </div>

                    <div class="form-check col-md-12">
                      <input type="checkbox" class="form-check-input input-check" id="politica" name="politica">
                      <span class="politica">Al hacer clic en "Enviar solicitud" certifico que acepto <a href="#" data-toggle="modal" data-target="#modalCondicion">las Condiciones de Uso</a> y <a href="#" data-toggle="modal" data-target="#modalPolitica">la Política de Privacidad.</a></span>
                    </div>
                    <span >
                        <strong id='mensajePolitica'></strong>
                    </span>
                    <div class="col-md-12">
                      <button type="submit" id="Postularme" class="btn btn-primary btn__enviar">Postularme</button>
                      <div class="adjuntar">
                        <h5 class="adjuntar__titulo">Adjuntanos tu CV al siguiente correo </h5>
                        <a href="mailto:rrhh@odyssey.com" class="adjuntar__link">rrhh@odyssey.com</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
