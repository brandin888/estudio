@extends('layout')
@section('extra-css')

<link href="{{ asset('css/contacto.css?v=1.0') }}" rel="stylesheet">
<link href="{{ asset('css/algolia.css?v=1.0') }}" rel="stylesheet">

@endsection


@section('content')


<section class="contacto">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12 col-sm-12">
        <h2><strong>HABLA CON UNO DE NUESTROS ASESORES</strong></h2>
      </div>
      <div class="col-lg-8">
        <!-- <div data-aos="fade-right" class="formulario__content box"> -->
        <div class="formulario__content box">
          <h3><strong>Estamos a su disposición</strong></h3>

          <form class="row" id="formContacto" name="formContacto" method="post" action="{{ url('contacto') }}">
            <input type="hidden" name="_token" id="csrf_toKen2" value="{{ csrf_token() }}">
            <div class="form-group col-md-6">
              <label for="">Nombres y apellido</label>
              <input type="text" class="form-control" id="nombres" name="nombres" aria-describedby="emailHelp" placeholder="Julio Gonzales Salazar">
              <label for="nombres" generated="true" class="error"></label>
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputPassword1">Email</label>
              <input type="text" class="form-control" id="email_contacto" name="email" placeholder="Ejem: usuario@dominio.com">
              <label for="email" generated="true" class="error"></label>
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputPassword1">Asunto</label>
              <input type="text" class="form-control" name="asunto" id="asunto" placeholder="Ejem: Pedidos">
              <label for="asunto" generated="true" class="error"></label>
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputPassword1">Teléfono</label>
              <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Ejem: 945 945 945">
              <label for="telefono" generated="true" class="error"></label>
            </div>
            <div class="form-group col-md-12">
              <label for="exampleInputPassword1">Mensaje</label>
              <textarea name="mensaje" id="mensaje" class="form-control" rows="5" placeholder="Consulta"></textarea>
              <label for="mensaje" generated="true" class="error"></label>

            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input input-check" name="politica">
              <span class="politica">Al hacer clic en "Enviar" certifico que acepto <a href="#" data-toggle="modal" data-target="#modalPolitica">las Condiciones de Uso y la Política de Privacidad.</a></span>
            </div>
            <span>
                <strong id='mensajePolitica'></strong>
            </span>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary btn__enviar">Enviar</button>
            </div>
          </form>
        </div>
      </div>
      <div class="d-lg-block col-md-4 infor">
          <!-- <img src="{{ asset('img/contacto02.png') }}" class="contacto__img" alt=""> -->
          <h4><strong style="color: #292e31;">Información de Contacto</strong></h4>
          <ul>
            <li style="color: #292e31;"> Asociación praderas de pariachi Mz. E Lt. 25, Ate Vitarte<br>
                  Lima - Perú<br>
                  <br>
                  Oficina: 51+(1) 401 3742<br>
                  <img src="{{ asset('img/wasa.png') }}" width="20" height="19" alt="Whatsapp Litercorp"> <a href="https://api.whatsapp.com/send?phone=+51945774749&amp;text=Solicite%20su%20Cotización" target="_blank" style="color:#11950b"> <b> Whatsapp +51 945 774 749</b> </a><br>
                  <br>
              <h4><strong style="color: #292e31;">Horario de Atención</strong></h4>
              Lunes a Viernes de 9:00AM a 6:00PM<br>
              <a href="mailto:info@litercorp.com"><i class="fas fa-envelope"></i> info@litercorp.com</a><br><br>

              <h4><strong style="color: #292e31;">Redes Sociales</strong></h4>
              <a href="https://www.facebook.com/Litercorp-111473320648629" target="_blank"><i class="fab fa-facebook"></i> Litercorp</a>
              
            </li>
        </ul>




      </div>
    </div>
  </div>
</section>

<section class="ubicaciones">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2><strong>Ubicaciones</strong></h2>
      </div>
      <!-- colocar una logica si los locales son 3 colocar col-4 si es mas de 3 dejar el col-3 -->

      @foreach($locales as $key => $l)
      <div class="col-md-6 col-xs-12 col-sm-6">
        <div class="ubicaciones__card">
          <h3 class="ubicaciones__card__titulo"><strong>{{ $l->nombre }}</strong></h3>
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


<div class="modal fade modalUbicacion" id="modalUbicacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modalUbicacion__dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="">
      <div class="modal-body modalUbicacion__body d-flex align-items-center">
        <button type="button" class="close modalUbicacion__body__icon " data-dismiss="modal" aria-label="Close">
          <img src="{{ asset('img/cerrar-azul.png') }}" alt="">
        </button>
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-12 col-sm-12">

              <div id="mapa" class="mapa__modal">
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalPolitica" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modalIngresar modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body modalIngresar__body d-flex align-items-center">
        <button type="button" class="close modalIngresar__body__icon" data-dismiss="modal" aria-label="Close">
          <img src="{{ asset('img/close.png') }}" alt="">
        </button>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="modal__titulo">CONDICIONES DE USO Y POLÍTICA DE PRIVACIDAD</h2>
              <div class="modal__parrafo">
                <p>El presente Política de Privacidad establece los términos en que Aletoysi usa y protege la información que es proporcionada por sus usuarios al momento de utilizar su sitio web. Esta compañía está comprometida con la seguridad de los datos de sus usuarios. Cuando le pedimos llenar los campos de información personal con la cual usted pueda ser identificado, lo hacemos asegurando que sólo se empleará de acuerdo con los términos de este documento. Sin embargo esta Política de Privacidad puede cambiar con el tiempo o ser actualizada por lo que le recomendamos y enfatizamos revisar continuamente esta página para asegurarse que está de acuerdo con dichos cambios.</p>
              </div>
              <div class="modal__parrafo">
               <strong>Información que es recogida</strong>
               <p>Nuestro sitio web podrá recoger información personal por ejemplo: Nombre,  información de contacto como  su dirección de correo electrónica e información demográfica. Así mismo cuando sea necesario podrá ser requerida información específica para procesar algún pedido o realizar una entrega o facturación.</p>
              </div>
              <div class="modal__parrafo">
                <strong>Uso de la información recogida</strong>
                <p>Nuestro sitio web emplea la información con el fin de proporcionar el mejor servicio posible, particularmente para mantener un registro de usuarios, de pedidos en caso que aplique, y mejorar nuestros productos y servicios.  Es posible que sean enviados correos electrónicos periódicamente a través de nuestro sitio con ofertas especiales, nuevos productos y otra información publicitaria que consideremos relevante para usted o que pueda brindarle algún beneficio, estos correos electrónicos serán enviados a la dirección que usted proporcione y podrán ser cancelados en cualquier momento.</p>
                <p>Aletoysi está altamente comprometido para cumplir con el compromiso de mantener su información segura. Usamos los sistemas más avanzados y los actualizamos constantemente para asegurarnos que no exista ningún acceso no autorizado.</p>
              </div>
              <div class="modal__parrafo">
                  <strong>Cookies</strong>
                  <p>Una cookie se refiere a un fichero que es enviado con la finalidad de solicitar permiso para almacenarse en su ordenador, al aceptar dicho fichero se crea y la cookie sirve entonces para tener información respecto al tráfico web, y también facilita las futuras visitas a una web recurrente. Otra función que tienen las cookies es que con ellas las web pueden reconocerte individualmente y por tanto brindarte el mejor servicio personalizado de su web.</p>
                  <p>Nuestro sitio web emplea las cookies para poder identificar las páginas que son visitadas y su frecuencia. Esta información es empleada únicamente para análisis estadístico y después la información se elimina de forma permanente. Usted puede eliminar las cookies en cualquier momento desde su ordenador. Sin embargo las cookies ayudan a proporcionar un mejor servicio de los sitios web, estás no dan acceso a información de su ordenador ni de usted, a menos de que usted así lo quiera y la proporcione directamente, visitas a una web. Usted puede aceptar o negar el uso de cookies, sin embargo la mayoría de navegadores aceptan cookies automáticamente pues sirve para tener un mejor servicio web. También usted puede cambiar la configuración de su ordenador para declinar las cookies. Si se declinan es posible que no pueda utilizar algunos de nuestros servicios.</p>
              </div>
              <div class="modal__parrafo">
                <strong>Enlaces a Terceros</strong>
                <p>Este sitio web pudiera contener en laces a otros sitios que pudieran ser de su interés. Una vez que usted de clic en estos enlaces y abandone nuestra página, ya no tenemos control sobre al sitio al que es redirigido y por lo tanto no somos responsables de los términos o privacidad ni de la protección de sus datos en esos otros sitios terceros. Dichos sitios están sujetos a sus propias políticas de privacidad por lo cual es recomendable que los consulte para confirmar que usted está de acuerdo con estas.</p>
              </div>
              <div class="modal__parrafo">
                <strong>Control de su información personal</strong>
                <p>En cualquier momento usted puede restringir la recopilación o el uso de la información personal que es proporcionada a nuestro sitio web.  Cada vez que se le solicite rellenar un formulario, como el de alta de usuario, puede marcar o desmarcar la opción de recibir información por correo electrónico.  En caso de que haya marcado la opción de recibir nuestro boletín o publicidad usted puede cancelarla en cualquier momento.</p>
                <p>Esta compañía no venderá, cederá ni distribuirá la información personal que es recopilada sin su consentimiento, salvo que sea requerido por un juez con un orden judicial.</p>
                <p>Aletoysi Se reserva el derecho de cambiar los términos de la presente Política de Privacidad en cualquier momento.</p>
              </div>
              <div class="modal__parrafo">
                <strong>Entrega del Producto</strong>
                <p>Las fechas de entrega son aproximadas y estimadas, y no están garantizadas. Aletoysi no será responsable de cualquier daño al Comprador ocasionado por la demora en la entrega.</p>
                <p>Aletoysi en ningún caso podrá ser responsable de ningún daño especial, incidental, indirecto o consecuencial, incluyengo
                  , pero no limitandose a las perdidas de beneficios, perdidas de actividad, ahorro, negocio, clientela, datos de cualquier tipo, reclamaciones de terceros o retraso de entrega.
                </p>
                <p>Aletoysi Se reserva el derecho de cambiar los términos de la presente Política de Privacidad en cualquier momento.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>







@section('extra-js')


<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
  <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
  <script src="{{ asset('js/algolia.js?v=1.2') }}"></script>
<script src="js/app.js"></script>
@endsection
@section('scripts')
<script type="text/javascript">
  const site_url = '{{ url('/') }}/';
</script>
<!-- <script type="text/javascript" src="{{ url('/') }}/js/contacto.js"></script> -->
<script type="text/javascript" src="{{ asset('../resources/js/scripts/contacto.js')}}"></script>
 
@stop
