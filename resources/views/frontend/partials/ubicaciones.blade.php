<section class="ubicaciones">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Ubicaciones</h2>
      </div>
      <!-- colocar una logica si los locales son 3 colocar col-4 si es mas de 3 dejar el col-3 -->

      @foreach($locales as $key => $l)
      <div class="col-md-3 col-xs-12 col-sm-6">
        <div class="ubicaciones__card">
          <h3 class="ubicaciones__card__titulo">{{ $l->nombre }}</h3>
          <span class="ubicaciones__card__subtitulo">{{ $l->distrito }}</span>
          <ul class="ubicaciones__card__datos">
            <li><i class="fas fa-map-marker-alt"></i><span> {{ $l->direccion }}</span> </li>
            <li><i class="fas fa-phone icon__telefono"></i><span> {{ $l->telefono }}</span> </li>
            {{-- <li><a href="{{url('donde-estamos')}}" class="ubicaciones__card__datos--link"> Ver en mapa</a></li> --}}
            <li><a class="ubicaciones__card__datos--link" onclick="cargarMapa({{$l->id}})"  href="#" data-toggle="modal" data-target="#modalUbicacion">Ver en mapa</a></li>
          </ul>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</section>
