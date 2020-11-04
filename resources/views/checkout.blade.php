@extends('layout')

@section('title', 'Checkout')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
    <style>
        .mt-32 {
            margin-top: 32px;
        }
    </style>

    <!-- <script src="https://js.stripe.com/v3/"></script> -->
    <script type="text/javascript">
    var resultadoGlobal="";
    const site_url = '{{ url('/') }}/';
        
</script>

@endsection

@section('content')


    
    <div class="container">

        @if (session()->has('success_message'))
            <div class="spacer"></div>
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="checkout-section d-md-flex">
            <div class="p-4 col-12 col-md-6 bg-white" style="background-color:white">
                <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                    {{ csrf_field() }}
                    <h2>Información de contacto</h2>
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                    </div>
                    <div class="half-form">
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            @if (auth()->user())
                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                            @else
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone">Celular</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                        </div>
                    </div> <!-- end half-form -->

                    <div class="half-form">
                        <div class="form-group">
                            <label for="department">Departamento</label>
                            <select id="department" name="department" class="form-control" value="{{ old('department') }}">
                            </select>                
                        </div>
                        <div class="form-group">
                            <label for="province">Provincia</label>
                            <select id="province" name="province" class="form-control" value="{{ old('province') }}">
                            </select>                
                        </div>
                    </div> <!-- end half-form -->

                    <div class="half-form">
                        <div class="form-group">
                            <label for="district">Distrito</label>
                            <select id="district" name="district" class="form-control" value="{{ old('district') }}">
                            </select>                    
                        </div>
                    </div>
                   
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input input-check" id="checkbox" name="politica" required>
                        <span class="politica">Al hacer clic en "Realizar Compra" certifico que acepto <a href="#" data-toggle="modal" data-target="#modalPolitica">las Condiciones de Uso y la Política de Privacidad.</a></span>
                    </div>
                    <div class="spacer"></div>
                                      

                    <button type="submit" id="complete-order" class="button-primary full-width">Realizar Compra</button>


                </form>
            </div>



            <div class="p-4 col-12 col-md-5 offset-md-1 mb-auto bg-white">
                <h2>Resumen del pedido</h2>
                <div class="checkout-table">
                    <table class="w-100">
                        <tbody>
                            @foreach (Cart::content() as $item)
                            <tr class="d-flex justify-content-between align-items-center">
                                <td style="position:relative">
                                    <div class="checkout-cantidad">
                                        <strong>{{ $item->qty }}</strong>
                                    </div>
                                    <span>
                                        <img src="{{ productImage($item->model->image) }}" alt="item" class="checkout-table-img" style="max-height:100px">
                                    </span>
                                </td>
                                <td>{{ $item->model->name }}</td>
                                
                                @if($item->qty > 11 and $item->model->pricemayor > 0 )
                               
                                <td>{{ $item->model->presentPriceMayor() }}</td>
                                @else

                                <td>{{ $item->model->presentPrice() }}</td>
                                @endif


                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div> <!-- end checkout-table -->

                <div class="checkout-totals">
                    <div class="checkout-totals-left">
                        <!-- Subtotal <br>
                        @if (session()->has('coupon'))
                            Discount ({{ session()->get('coupon')['name'] }}) :
                            <br>
                            <hr>
                            New Subtotal <br>
                        @endif
                        Tax ({{config('cart.tax')}}%)<br> -->
                        <span class="checkout-totals-total">Total</span>

                    </div>

                    <div class="checkout-totals-right">
                        <!-- {{ presentPrice(Cart::subtotal()) }} <br>
                        @if (session()->has('coupon'))
                            -{{ presentPrice($discount) }} <br>
                            <hr>
                            {{ presentPrice($newSubtotal) }} <br>
                        @endif
                        {{ presentPrice($newTax) }} <br> -->
                        <span class="checkout-totals-total">{{ presentPrice($newTotal) }}</span>

                    </div>
                </div> <!-- end checkout-totals -->
            </div>

        </div> <!-- end checkout-section -->
    </div>


    
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="modalPolitica" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content text-justify">
      <div class="modal-body modalIngresar__body d-flex align-items-center">
        <div class="container" style="font-size:12px">
          <div class="row">
            <div class="col-md-12">
                <div class="modal-header px-0 align-items-center" style="border-bottom:0px">
                    <h2 class="modal-title modal__titulo">CONDICIONES DE USO Y POLÍTICA DE PRIVACIDAD</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              <!-- <h2 class="modal__titulo">CONDICIONES DE USO Y POLÍTICA DE PRIVACIDAD</h2> -->
              <div class="modal__parrafo">
                <p>El presente Política de Privacidad establece los términos en la que Micky SRL, usa y protege la información proporcionada por sus usuarios al momento de utilizar su sitio web. Esta compañía está comprometida con la seguridad de los datos de sus usuarios. Cuando le pedimos llenar los campos de información personal con la cual usted pueda ser identificado, lo hacemos asegurando que sólo se empleará de acuerdo con los términos de este documento. Sin embargo esta Política de Privacidad puede cambiar con el tiempo o ser actualizada por lo que le recomendamos y enfatizamos revisar continuamente esta página para asegurarse que está de acuerdo con dichos cambios.</p>
              </div>
              <div class="modal__parrafo">
               <strong>Información que es recogida</strong>
               <p>Nuestro sitio web podrá recoger información personal por ejemplo: Nombre,  información de contacto como  su dirección de correo electrónica e información demográfica. Así mismo cuando sea necesario podrá ser requerida información específica para procesar algún pedido o realizar una entrega o facturación.</p>
              </div>
              <div class="modal__parrafo">
                <strong>Uso de la información recogida</strong>
                <p>Nuestro sitio web emplea la información con el fin de proporcionar el mejor servicio posible, particularmente para mantener un registro de usuarios, de pedidos en caso que aplique, y mejorar nuestros productos y servicios.  Es posible que sean enviados correos electrónicos periódicamente a través de nuestro sitio con ofertas especiales, nuevos productos y otra información publicitaria que consideremos relevante para usted o que pueda brindarle algún beneficio, estos correos electrónicos serán enviados a la dirección que usted proporcione y podrán ser cancelados en cualquier momento.</p>
                <p>Micky SRL está altamente comprometido para cumplir con el compromiso de mantener su información segura. Usamos los sistemas más avanzados y los actualizamos constantemente para asegurarnos que no exista ningún acceso no autorizado.</p>
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
              </div>
              <div class="modal__parrafo">
                <strong>Entrega del Producto</strong>
                <p>Las fechas de entrega son aproximadas y estimadas, y no están garantizadas. Micky SRL no será responsable de cualquier daño al Comprador ocasionado por la demora en la entrega.</p>
                <p>Micky SRL en ningún caso podrá ser responsable de ningún daño especial, incidental, indirecto o consecuencial, incluyengo
                  , pero no limitandose a las perdidas de beneficios, perdidas de actividad, ahorro, negocio, clientela, datos de cualquier tipo, reclamaciones de terceros o retraso de entrega.
                </p>
                <p>Micky SRL Se reserva el derecho de cambiar los términos de la presente Política de Privacidad en cualquier momento.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

@section('extra-js')
    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>

    <script>
        (async function(){ 
            // Create a Stripe client
            // var stripe = Stripe('{{ config('services.stripe.key') }}');
            // Create an instance of Elements
            // var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
              base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                  color: '#aab7c4'
                }
              },
              invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
              }
            };


            // Add an instance of the card Element into the `card-element` <div>
            // card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            // card.addEventListener('change', function(event) {
            //   var displayError = document.getElementById('card-errors');
            //   if (event.error) {
            //     console.log(event.error)
            //     displayError.textContent = event.error.message;
            //   } else {
            //     displayError.textContent = '';
            //   }
            // });

            // Handle form submission
            var form = document.getElementById('payment-form');
            
            form.addEventListener('submit', function(event) {
                
              event.preventDefault();

              // Disable the submit button to prevent repeated clicks
            //   document.getElementById('complete-order').disabled = true;
            //   console.log($('#province option:selected').text())

              var options = {
                // name: document.getElementById('name_on_card').value,
                address_line1: document.getElementById('address').value,
                address_city: 'LIMA',
                address_state: 'LIMA',
                // address_zip: document.getElementById('postalcode').value
              }
              var form = document.getElementById('payment-form');

              form.submit();

            //   stripe.createToken(card, options).then(function(result) {
            //     if (result.error) {
            //       // Inform the user if there was an error
            //       var errorElement = document.getElementById('card-errors');
            //       errorElement.textContent = result.error.message;
            //       console.log('result')
                    
                
            //       // Enable the submit button
            //       document.getElementById('complete-order').disabled = false;
            //     } else {
            //       // Send the token to your server
            //       stripeTokenHandler(result.token);
            //     }
            //   });
            });


            //Locations
            async function getData(url){
                const response = await fetch(url)
                const data = await response.json()
                return data
            }

            const getLocations = await getData(site_url+'/checkout/tables');
            all_departments = getLocations.departments
            all_provinces = getLocations.provinces
            all_districts = getLocations.districts
                
            $('#department').append($("<option></option>").attr("value",0).text("Seleccionar")); 
            $('#province').append($("<option></option>").attr("value",0).text("Seleccionar"));
            $('#district').append($("<option></option>").attr("value",0).text("Seleccionar")); 
            
            
            $.each(all_departments, function(key, value) {   
                    $('#department').append($("<option></option>").attr("value",value.description).text(value.description)); 
            });

            $('#department').change(function(){ 
                $("#province").empty()
                $('#province').append($("<option></option>").attr("value",0).text("Seleccionar")); 
                $("#district").empty()
                $('#district').append($("<option></option>").attr("value",0).text("Seleccionar")); 

                var value = $('#department option:selected').text()
                var departamentbase
                all_departments.forEach(element => {
                    if(element.description == value){
                        departamentbase = element.id
                    }
                })
                
                provinces = all_provinces.filter(f => {
                    return f.department_id == departamentbase
                })
                
                $.each(provinces, function(key, value) {   
                    $('#province')
                        .append($("<option></option>")
                                    .attr("value",value.description)
                                    .text(value.description)); 
                });
            });


            $('#province').change(function(){ 
                var value2 = $('#province option:selected').text()
                var provincebase
                all_provinces.forEach(element => {
                    if(element.description == value2){
                        provincebase = element.id
                    }
                })
                $("#district").empty()
                $('#district').append($("<option></option>").attr("value",0).text("Seleccionar")); 
                districts = all_districts.filter(f => {
                    return f.province_id == provincebase
                })

                $.each(districts, function(key, value) {   
                    $('#district')
                        .append($("<option></option>")
                                    .attr("value",value.description)
                                    .text(value.description)); 
                });
            });

        })();
    </script>
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection
