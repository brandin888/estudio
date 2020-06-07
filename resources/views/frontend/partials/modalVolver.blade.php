<!-- Modal -->
<div class="modal fade" id="modalVolver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modalVolver modal-dialog-centered" role="document">
    <div class="modal-content" style="background-image:url({{url('images/banner/bg-modal-volver.png')}});">
      <div class="modal-body modalVolver__body d-flex align-items-center">
        <button type="button" class="close modalVolver__body__icon" data-dismiss="modal" aria-label="Close">
          <img src="{{ asset('images/icons/cerrar.png') }}" alt="">
        </button>
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-12 col-sm-12">
              <h2 class="modalVolver__body__titulo">Volver a:</h2>
            </div>
            <div class="col-12 col-md-4 col-md-4">
              <a href="{{url('boletos')}}">
                <div class="modalVolver__body__item" style="background-image:url({{url('images/banner/modalCarrito1.png')}});">
                  <div class="boleto"></div>
                  <h3>Boletos</h3>
                </div>
              </a>
            </div>
            <div class="col-12 col-md-4 col-md-4">
              <a href="{{url('arma-tu-cumpleanos')}}">
                <div class="modalVolver__body__item" style="background-image:url({{url('images/banner/modalCarrito2.png')}});">
                  <div class="cumple"></div>
                  <h3>Arma tu cumpleaños</h3>
                </div>
              </a>
            </div>
            <div class="col-12 col-md-4 col-md-4">
              <a href="{{url('promociones')}}">
                <div class="modalVolver__body__item" style="background-image:url({{url('images/banner/modalCarrito3.png')}});">
                  <div class="promo"></div>
                  <h3>Promociones</h3>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
