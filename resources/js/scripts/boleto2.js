//***********************Cargar pagina segun el link*************************
var loc = document.location.href;
var getString = loc.split('?')[1]
  if(window.location.hash === '#pagar?'+getString){
    $(document).ready( function() {
      $("#local_").css('display', 'none');
      $("#pulsera_").css('display', 'none');
      $("#pulsera").addClass('active');
      $("#complemento_").css('display', 'none');
      $("#complemento").addClass('active');
      $("#pagar_").css('display', 'block');
      $("#pagar").addClass('active');
      });
  }else{
    $(document).ready( function() {
      $("#local_").css('display', 'block');
      $("#pulsera_").css('display', 'none');
      $("#complemento_").css('display', 'none');
      $("#pagar_").css('display', 'none');
    });
  }

//***********************Tramitar pedido***********************************

if(loc.indexOf('?')>0)
{
  // cogemos la parte de la url que hay despues del interrogante
  var getString = loc.split('?')[1];

  // obtenemos un array con cada clave=valor
  var GET = getString.split('&');
  var get = {};
  var arreglo = {};

  // recorremos todo el array de valores
  for(var i = 0, l = GET.length; i < l; i++){
      var tmp = GET[i].split('=');
      arreglo[i] = unescape(decodeURI(tmp[1]));
  }
  var local = arreglo[0];
  var pulsera = arreglo[1];
  var codigo = arreglo[2];
  var cantidad = arreglo[3];

  llamada(local, pulsera, codigo, cantidad)
}


// *********** Controlar los div, por medio de display none y block ****************
$('body').on('click', '.wizards__content__link', function() {
  event.preventDefault();
  $("#local_").css('display', 'none');
  $("#pulsera_").css('display', 'block');
  $("#pulsera").addClass('active');
  $("#complemento_").css('display', 'none');
  $("#pagar_").css('display', 'none');
  $(".numero1").css('display', 'none');
  $(".check1").css('display', 'block');
  $("#selecciona--local").css('display', 'none');

  $(".wizard__listado__item--pintado--1").css('display', 'block');

  // ajax para cargar los complementos por local
    var local = $('#local_input').val();
    var route = site_url+'cargar-local-complementos/'+local;
    $.ajax({
        url: route,
        data : {},
        type : 'GET',
        dataType: 'json',
        success : function(response){
            var result = [];
            var result2 = [];
            var resultado = 0;

            $("#local--seleccionado").html("");
            resultado = '<h7>'+response.local.nombre+'</h7>';

            $(resultado).appendTo("#local--seleccionado");
            $("#local--seleccionado").css('display', 'block');

            if(response.complementos.length == 0){
              $('#obtener_complemento').val(response.complementos.length);
            }else{
              $('#obtener_complemento').val('alg');

              $.each(response.complementos, function(i, item) {
                var entero = Math.trunc(item.precio);

                // console.log(item.precio)
                var ent = item.precio.toString().indexOf(".")
;
                if(ent == -1){
                  var res = '00';
                }else{
                  var lim = parseFloat(item.precio).toFixed(2);

                  //obtener el decimal del total general
                  var pos = lim.toString().indexOf(".");
                  var res = String(lim).substring((pos+1), lim.length);
                }

                var cont = i + 1;

                result[i] = '<div class="col-md-4 col-12 col-sm-6">';
                result[i] += '<div class="card box">';
                result[i] += '<div class="card__img">';
                result[i] += '<img src="images/boletos/combo-1.jpg" class="img-fluid" alt="">';
                result[i] += '<div class="precio">';
                result[i] += '<span>S/'+entero+'<sup>'+res+'</sup></span>';
                result[i] += '</div>';
                result[i] += '</div>';
                result[i] += '<div class="card__content">';
                result[i] += '<input type="hidden" name="complemento[]" id="complemento'+cont+'" value="'+item.id+'">';
                result[i] += '<h3>'+item.combo+'</h3>';
                result[i] += '<p>'+item.descripcion+'</p>';
                result[i] += '<div class="card__content__cantidad">';
                result[i] += '<span class="card__content__cantidad__titulo">CANTIDAD</span>';
                result[i] += '<div class="input-group selector-numero" id="spinner">';
                result[i] += '<span class="input-group-btn btn-group-sm">';
                result[i] += '<button type="button" class="btn btn-select" data-action="decrement"><i class="fas fa-minus"></i></button>';
                result[i] += '</span>';
                result[i] += ' <input name="qty" type="text" id="'+item.slug+'" class="form-control text-center input-select" value="0" min="0" max="10" disabled>';
                result[i] += ' <span class="input-group-btn btn-group-sm">';
                result[i] += '<button type="button" class="btn btn-select" data-action="increment"><i class="fas fa-plus"></i></button>';
                result[i] += ' </span>';
                result[i] += '</div>';
                result[i] += '</div>';
                result[i] += '</div>';
                result[i] += '</div>';
                result[i] += '</div>';

              });

              $("#com").html(result);
            }

            var valores = [];

            $.each(response.pulseras, function(i, item) {
              var entero = Math.trunc(item.precio);
               valores[i] = item.id;
              // console.log(item.precio)
              var ent = item.precio.toString().indexOf(".")
;
              if(ent == -1){
                var res = '00';
              }else{
                var lim = parseFloat(item.precio).toFixed(2);

                //obtener el decimal del total general
                var pos = lim.toString().indexOf(".");
                var res = String(lim).substring((pos+1), lim.length);
              }

              if(response.pulseras.length < 3){
                var clase = 'col-md-6';
              }else{
                var clase = 'col-md-4';
              }

              var cont2 = i + 1;

              result2[i] = '<div class="'+clase+'">';
              result2[i] += '<div class="card box">';
              result2[i] += '<div class="card__img">';
              result2[i] += '<img src="images/boletos/pulsera-1.jpg" class="img-fluid" alt="">';
              result2[i] += '</div>';
              result2[i] += '<div class="card__content">';
              result2[i] += '<h3>'+item.name+'</h3>';
              result2[i] += '<p>'+item.descipcion+'</p>';
              result2[i] += '<div class="card__content__cantidad">';
              result2[i] += '<span class="card__content__cantidad__titulo">CANTIDAD DE PULSERAS</span>';
              result2[i] += '<div class="input-group selector-numero" id="spinner">';
              result2[i] += '<span class="input-group-btn btn-group-sm">';
              result2[i] += '<button type="button" class="btn btn-select" data-action="decrement"><i class="fas fa-minus"></i></button>';
              result2[i] += '</span>';
              result2[i] += '<input name="qty" type="text" id="'+item.id+'" class="form-control text-center input-select" value="0" min="0" disabled>';
              result2[i] += '<span class="input-group-btn btn-group-sm">';
              result2[i] += '<button type="button" class="btn btn-select" data-action="increment"><i class="fas fa-plus"></i></button>';
              result2[i] += '</span>';
              result2[i] += '</div>';
              result2[i] += '</div>';
              result2[i] += '</div>';
              result2[i] += '</div>';
              result2[i] += '</div>';

            });

            $("#pulseras-pinta").html(result2);
            $("#valoresPulseras").val(valores);

        }
    });

});


  $('.next').click(function(){
    event.preventDefault();

    var vip = $('#vip').val();
    var normal = $('#normal').val();
    var local = $('#local_input').val();


    if(vip == 0 && normal == 0){

      Swal.fire({
       type: 'error',
       title: 'Oops...',
       text: 'Seleccione una pulsera',
       // footer: '<a href>Why do I have this issue?</a>'
      })
    }

  });

  $('body').on('click', '#spinner button', function(){
      let input = $(this).closest('#spinner').find('input[name=qty]');

      if($(this).data('action') === 'increment') {
          if(input.attr('max') === undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {
            input.val(parseInt(input.val(), 10) + 1);
              // inc = parseInt(input.val());

          }
      } else if($(this).data('action') === 'decrement') {
          if(input.attr('min') === undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {
              input.val(parseInt(input.val(), 10) - 1);
              // dec = parseInt(input.val());
          }
      }

      siguiente();
  });

function siguiente(){
  var vip = $('#vip').val();
  var normal = $('#normal').val();

  var valores = $('#valoresPulseras').val();

  var arrayDeValores= valores.split(',');
  var pulseras = [];
  $.each(arrayDeValores, function(i, item) {
     pulseras[i] = $('#'+item).val();
  });

  if(vip ==0 && normal == 0){
    $(".next").addClass('btn-secondary');
    $(".next").removeClass('btn-primary');
    // console.log('Debe selecionar alguna pulsera')

  }else{
    $(".next").removeClass('btn-secondary');
    $(".next").addClass('btn-primary');
  }

  $('.next').click(function(){
    event.preventDefault();
    var vip = $('#vip').val();
    var normal = $('#normal').val();
    // console.log(vip,normal)
    var com = $('#obtener_complemento').val();
    // console.log(com)
      if(vip == 0 && normal == 0){
        console.log('Debe selecionar alguna pulsera')
        Swal.fire({
         type: 'error',
         title: 'Oops...',
         text: 'Seleccione una pulsera!',
         // footer: '<a href>Why do I have this issue?</a>'
        })
      }else if(com == 0){
        $("#local_").css('display', 'none');
        $("#pulsera_").css('display', 'none');
        $("#complemento_").css('display', 'none');
        $("#pagar_").css('display', 'block');
        $("#complemento").addClass('active');
        $("#pagar").addClass('active');

        $(".numero1").css('display', 'none');
        $(".check1").css('display', 'block');
        $(".numero2").css('display', 'none');
        $(".check2").css('display', 'block');
        $(".numero3").css('display', 'none');
        $(".check3").css('display', 'block');

        $(".wizard__listado__item--pintado--2").css('display', 'block');
        $(".wizard__listado__item--pintado--3").css('display', 'block');

        var local = $('#local_input').val();
        var vip = $('#vip').val();
        var normal = $('#normal').val();


      // ajax para tramitar el pedido procesado desde la pagina boletos con los 4 pasos
        var route = site_url+'cargar-local/'+local;
        $.ajax({
            url: route,
            data : {},
            type : 'GET',
            dataType: 'json',
            success : function(response){
                var total_combos=0;
                var combos = [];

                // la cantidad de combos escogidos y el total a pagar
                $.each(response.complementos, function(i, item) {
                    var incremento = i+1;
                    var comboi = $('#'+item.slug+'').val();
                    var compi = $('#complemento'+incremento+'').val();

                    var totali = item.precio*comboi;
                    total_combos = total_combos + totali;
                    combos[i] = comboi;
                });

                $("#combos").empty();
                $("#combos").val(combos); // la cantidad de cambos se manda como value al input combos
                $("#totalCombos").empty();
                $("#totalCombos").val(total_combos);

                //total en soles de pulseras escogidas
                var total_normal = 0;
                var total_vip = 0;
                $.each(response.precios, function(j, item1) {
                    var incremento = j+1;
                    if(item1.local_id == local){
                      if(item1.pulsera_id == 1){
                         total_normal = item1.precio*normal;
                      }else{
                         total_vip = item1.precio*vip;
                      }
                    }
                });

                // total general, la sumatoria de combos y pulseras
                var total_general = total_combos+ total_normal + total_vip;
                // console.log(total_combos,total_normal,total_vip)
               totalGeneral(total_general);

                //Verificar si tiene codigo promocional
                var activado = 'Desactivado';

                var checked = $( "input:checked" ).val();
                if(checked == 1){
                  activado = 'Activado';
                }

                //agg html que muestra el local seleccionado, la cantidad de pulseras normales y vip
                $("#pintar_seleccionado").html("");
                var result;
                result =   '<ul class="local__listado--item local__listado--item--right">';
                result +=  '<li class="p-local">'+response.locales.nombre+'</li>';
                result +=  '<li class="p-normal">'+normal+'</li>';
                result +=  '<li class="p-vip">'+vip+'</li>';
                result +=  '<li id="verificador">'+activado+'</li>';
                result +=  '</ul>';
                $(result).appendTo("#pintar_seleccionado");

                 // enviar a carrito
                  // console.log(combos)
                  //
                  // var route = site_url+'cargar-boletos-carrito';
                  // $.ajax({
                  //     type: "GET",
                  //     url: route,
                  //     data: {local:local,vip:vip,normal:normal,combos:combos,total_general:total_general},
                  //     dataType: "json",
                  //     success: function(data) {
                  //       // console.log(data.contador)
                  //         console.log( data.cartItem, data.cartItem2, data.cartItem3, vip, normal, combo)
                  //         Swal.fire(
                  //           'Enviado a carrito!',
                  //           'Haz click en el boton!',
                  //           'success'
                  //         )
                  //     },
                  //     error: function() {
                  //         console.log('error handling here');
                  //     }
                  // });
            }
        });

      }else if(com == 'alg'){
        $("#local_").css('display', 'none');
        $("#pulsera_").css('display', 'none');
        $("#complemento_").css('display', 'block');
        $("#complemento").addClass('active');
        $("#pagar_").css('display', 'none');
        $(".numero1").css('display', 'none');
        $(".check1").css('display', 'block');
        $(".numero2").css('display', 'none');
        $(".check2").css('display', 'block');
        $("#seleccionar--pulsera").css('display', 'none');
        $("#pulsera--seleccionado").css('display', 'block');
        $(".wizard__listado__item--pintado--2").css('display', 'block');

        var vip = $('#vip').val();
        var normal = $('#normal').val();

        var text = "";
        if(normal != 0 && vip != 0 ){
          text = 'Pulsera Normal <br> Pulsera Vip';
        }else if(vip == 0 ){
          text = 'Pulsera Normal ';
        }else{
          text = "Pulsera Vip";
        }


        $("#pulsera--seleccionado").html("");
        var result;
        result =  '<h7>'+text+'</h7>';

        $(result).appendTo("#pulsera--seleccionado");
      }
  });
}

$('.previous').click(function() {
  event.preventDefault();
  $("#local_").css('display', 'block');
  $("#pulsera_").css('display', 'none');
  $("#pulsera").removeClass('active');
  $("#complemento_").css('display', 'none');
  $("#pagar_").css('display', 'none');
  $(".numero1").css('display', 'block');
  $(".check1").css('display', 'none');
  $("#selecciona--local").css('display', 'block');
  $("#local--seleccionado").css('display', 'none');

  $(".wizard__listado__item--pintado--1").css('display', 'none');

  $("#totalCombos").val(0);

});

$('.next2').click(function(){
  event.preventDefault();
  $("#local_").css('display', 'none');
  $("#pulsera_").css('display', 'none');
  $("#complemento_").css('display', 'none');
  $("#pagar_").css('display', 'block');
  $("#pagar").addClass('active');
  $(".numero1").css('display', 'none');
  $(".check1").css('display', 'block');
  $(".numero2").css('display', 'none');
  $(".check2").css('display', 'block');
  $(".numero3").css('display', 'none');
  $(".check3").css('display', 'block');

  $(".wizard__listado__item--pintado--3").css('display', 'block');

    var local = $('#local_input').val();
    var vip = $('#vip').val();
    var normal = $('#normal').val();
    $('#cantidad_vip2').val(vip);
    $('#cantidad_normal2').val(normal);


  // ajax para tramitar el pedido procesado desde la pagina boletos con los 4 pasos
    var route = site_url+'cargar-local/'+local;
    $.ajax({
        url: route,
        data : {},
        type : 'GET',
        dataType: 'json',
        success : function(response){
            var total_combos=0;
            var combos = [];

            // la cantidad de combos escogidos y el total a pagar
            $.each(response.complementos, function(i, item) {
                var incremento = i+1;
                var comboi = $('#'+item.slug+'').val();
                var compi = $('#complemento'+incremento+'').val();

                var totali = item.precio*comboi;
                total_combos = total_combos + totali;
                combos[i] = comboi;
            });

            $("#combos").empty();
            $("#combos").val(combos); // la cantidad de cambos se manda como value al input combos
            $("#totalCombos").empty();
            $("#totalCombos").val(total_combos);

            //total en soles de pulseras escogidas
            var total_normal = 0;
            var total_vip = 0;
            $.each(response.precios, function(j, item1) {
                var incremento = j+1;
                if(item1.local_id == local){
                  if(item1.pulsera_id == 1){
                     total_normal = item1.precio*normal;
                  }else{
                     total_vip = item1.precio*vip;
                  }
                }
            });

            // total general, la sumatoria de combos y pulseras
            var total_general = total_combos+ total_normal + total_vip;
            // console.log(total_combos,total_normal,total_vip)
           totalGeneral(total_general);
           $( "#subtotal" ).val(total_general);


            //Verificar si tiene codigo promocional
            var activado = 'Desactivado';

            var checked = $( "input:checked" ).val();
            if(checked == 1){
              activado = 'Activado';
            }

            //agg html que muestra el local seleccionado, la cantidad de pulseras normales y vip
            $("#pintar_seleccionado").html("");
            var result;
            result =   '<ul class="local__listado--item local__listado--item--right">';
            result +=  '<li>'+response.locales.nombre+'</li>';
            result +=  '<li>'+normal+'</li>';
            result +=  '<li>'+vip+'</li>';
            result +=  '<li id="verificador">'+activado+'</li>';
            result +=  '</ul>';
            $(result).appendTo("#pintar_seleccionado");

             // enviar a carrito
              // console.log('holaa')
              var route = site_url+'cargar-boletos-carrito';
              $.ajax({
                  type: "GET",
                  url: route,
                  data: {local:local,vip:vip,normal:normal,combos:combos,total_general:total_general},
                  dataType: "json",
                  success: function(data) {
                    // console.log(data.row )

                      $("#cart_normal").val(data.cartItem.rowId);
                      $("#cart_vip").val(data.cartItem2.rowId);
                      $("#cart_combos").val(data.row);
                      $("#cantidad_combos").val(data.combo);

                      $("#cart2").html("");
                      var result;
                      result =   '<span>('+data.contador+')</span>';
                      $(result).appendTo("#cart2");
                      $("#cart2").removeClass('cart');
                      $("#cart1").addClass('cart');

                      Swal.fire(
                        'Enviado a carrito!',
                        'Haz click en el boton!',
                        'success'
                      )
                  },
                  error: function() {
                      console.log('error handling here');
                  }
              });
        }
    });

});

$('.previous2').click(function() {
  event.preventDefault();
  $("#local_").css('display', 'none');
  $("#pulsera_").css('display', 'block');
  $("#complemento_").css('display', 'none');
  $("#complemento").removeClass('active');
  $("#pagar_").css('display', 'none');
  $(".numero1").css('display', 'none');
  $(".check1").css('display', 'block');
  $(".numero2").css('display', 'block');
  $(".check2").css('display', 'none');
  $("#seleccionar--pulsera").css('display', 'block');
  $("#pulsera--seleccionado").css('display', 'none');

  $(".wizard__listado__item--pintado--2").css('display', 'none');
  $(".wizard__listado__item--pintado--3").css('display', 'none');

});

$('.editar').click(function() {
  event.preventDefault();

  var com = $('#obtener_complemento').val();
  if(com != 0){
    $("#local_").css('display', 'none');
    $("#pulsera_").css('display', 'none');
    $("#complemento_").css('display', 'block');
    $("#pagar_").css('display', 'none');
    $("#pagar").removeClass('active');
    $(".numero1").css('display', 'none');
    $(".check1").css('display', 'block');
    $(".numero2").css('display', 'none');
    $(".check2").css('display', 'block');
    $(".numero3").css('display', 'block');
    $(".check3").css('display', 'none');
    $(".wizard__listado__item--pintado--4").css('display', 'none');

  }else{
    $("#local_").css('display', 'none');
    $("#pulsera_").css('display', 'block');
    $("#complemento_").css('display', 'none');
    $("#complemento").removeClass('active');
    $("#pagar").removeClass('active');
    $("#pagar_").css('display', 'none');
    $(".numero1").css('display', 'none');
    $(".check1").css('display', 'block');
    $(".numero2").css('display', 'block');
    $(".check2").css('display', 'none');
    $(".numero3").css('display', 'block');
    $(".check3").css('display', 'none');

    $(".wizard__listado__item--pintado--2").css('display', 'none');
    $(".wizard__listado__item--pintado--3").css('display', 'none');
  }
});

$('#checkCodigo').click(function() {
  if( $(this).is(':checked')){
    $("#codigoPromocional").css("display","block");
    $("#procesarBoleto").prop("disabled", false);

    $('#procesarBoleto').click(function() {
      var local = $('#local_input').val();
      var vip = $('#vip').val();
      var normal = $('#normal').val();
      var checked = $( "input:checked" ).val();
      var codigo = $( "#codigoPromocional" ).val();
      var subtotal = $( "#totalGeneral" ).val();
      var combos = $( "#combos" ).val();


      if(checked == 1 && codigo == ''){
        Swal.fire('Ingrese su código promocional')

      }else if(checked != 1 && codigo == '' ){

        // console.log(vip,normal)
        // $("#total").val(subtotal);
          var route = site_url+'verificar-autenticacion';
          $.ajax({
              url: route,
              data : {},
              type : 'GET',
              dataType: 'json',
              success : function(response){
                var user_id = response.user;
                // var lim = subtotal.toFixed(2);
                var total2 = subtotal;
                if(user_id){
                  // enviarDatos(local,vip,normal,combos,codigo,subtotal,total2,user_id);
                }else{
                  Swal.fire({
                   type: 'error',
                   title: 'Inicie sesión',
                   text: 'Para continuar con la transación',
                  })
                }
              }
          });

      }
      else{ //llamada AJAX para verificar el codigo promocional y luego enviar a base de datos.
        var route = site_url+'verificar-codigo';
        $.ajax({
            url: route,
            data : {codigo:codigo},
            type : 'GET',
            dataType: 'json',
            success : function(response){
              if(response.descuento == 0){
                Swal.fire('Código no válido')
              }
               else if(response.b != null){
                 Swal.fire('El código ya fue registrado')
               }else if(response.f != null){
                 Swal.fire('El código ya fue registrado')
                 // alert('codigo ya fue registrado')
                 // Swal.fire({
                 //  type: 'error',
                 //  title: 'Código ya fue registrado',
                 //  text: 'Intente nuevamente',
                 // })
               }else if(response.descuento != 0 && response.b == null){
                     var descuento = response.descuento/100;
                     // console.log(subtotal)
                     var total = subtotal - subtotal*descuento;
                     var lim = total.toFixed(2);

                     $( "#codigo3" ).val(codigo);

                     var user_id = response.user;

                     $( "#subtotal" ).val(subtotal);
                     $( "#total" ).val(lim);
                     totalGeneral(total);
                     if(user_id){
                       // enviarDatos(local,vip,normal,combos,codigo,total,subtotal,user_id);
                     }else{
                       Swal.fire({
                        type: 'error',
                        title: 'Inicie sesión',
                        text: 'Para continuar con la transación',
                       })
                     }

               }

            }
        });
      }

    });

  }
  else{
    $("#codigoPromocional").css("display","none");
    $("#procesarBoleto").prop("disabled", true);

  }

  var checked = $( "input:checked" ).val();
  var activado = 'Desactivado';

  if(checked == 1){
    activado = 'Activado';
  }

  $("#verificador").html("");
  var result;
  result =  '<span>'+activado+'</span>';
  $(result).appendTo("#verificador");
});




//***********pintar los resultados en el formulario pagar**************************
function llamada(local, pulsera, check, qty){

  if(check == 'on'){
    var activado = 'Activado';
    $("#checkCodigo").attr( 'checked', true ) // si tiene codigo promocional, se activa el input check
  }else{ var activado = 'Desactivado'; }

 // ajax para tramitar el pedido procesado desde home
  var route = site_url+'tramitar/'+local;
  $.ajax({
      url: route,
      data : {},
      type : 'GET',
      dataType: 'json',
      success : function(response){
          var total_n = 0;
          var total_v = 0;
          var normal = 0;
          var vip = 0;

          $.each(response.precios, function(j, item1) {
              var incremento = j+1;
              if(item1.local_id == local){
                if(item1.pulsera_id == pulsera){
                  if(pulsera == 1){
                    total_n = item1.precio*qty;
                    normal = qty;
                  }else{
                    total_v = item1.precio*qty;
                    vip =qty;
                  }
                }
              }
          });

          var total_general = total_n + total_v;
          //obtener el entero del total_general
          var entero = Math.trunc(total_general)

          //limitar la cantidad a 2 decimales
          var lim = total_general.toFixed(2);

          //obtener solo los decimales
          var pos = lim.toString().indexOf(".");
          var res = String(lim).substring((pos+1), lim.length);

          //Html que muestra el total general
          $("#total-general").html("");
          var result1;
          if(res.length > 1){ //si el decimal es mayor a 1 digito entonces no se pintara un cero de mas
            result1 =  '<span class="numero"> S/'+entero+' <sup>'+res+'</sup> </span>';
            result1 +=  '<input type="hidden" name="total" id="totalGeneral" value="'+lim+'">';

          }else{ // si es menor a 1 entonces se pintara el cero, y asi completar los dos digitos del decimal
            result1 =  '<span class="numero"> S/'+entero+' <sup>'+res+'0</sup> </span>';
            result1 +=  '<input type="hidden" name="total" id="totalGeneral" value="'+lim+'">';
          }
          $(result1).appendTo("#total-general");

          //agg html que muestra el local seleccionado, la cantidad de pulseras normales y vip
          $("#pintar_seleccionado").html("");
          var result;
          result =  '<ul class="local__listado--item local__listado--item--right">';
          result +=  '<li>'+response.locales.nombre+'</li>';
          result +=  '<li>'+normal+'</li>';
          result +=  '<li>'+vip+'</li>';
          result +=  '<li id="verificador">'+activado+'</li>';
          result +=  '</ul>';
          $(result).appendTo("#pintar_seleccionado");

          //asignar valor a los inputs
          $('#local_input').val(local);
          $('#local_').val(local);
          $('#normal').val(normal);
          $('#vip').val(vip);

      }
  });

}


//TOTAL GENERAL
function totalGeneral(total_general){
            // $("#subtotal").val(total_general);

            //obtener el entero del total_general
            var entero = Math.trunc(total_general)

            var lim = total_general.toFixed(2);

            //obtener el decimal del total general
            var pos = lim.toString().indexOf(".");
            var res = String(lim).substring((pos+1), lim.length);

      //Html que muestra el total general********************
            $("#total-general").html("");
            var result1;
            if(res.length > 1){ //si el decimal es mayor a 1 digito entonces no se pintara un cero de mas
              result1 =  '<span class="numero"> S/'+entero+' <span class="decimal">'+res+'</span> </span>';
              result1 +=  '<input type="hidden" name="total" id="totalGeneral" value="'+lim+'">';
            }else{ // si es menor a 1 entonces se pintara el cero, y asi completar los dos digitos del decimal
              result1 =  '<span class="numero"> S/'+entero+' <span class="decimal">'+res+'0</span> </span>';
              result1 +=  '<input type="hidden" name="total" id="totalGeneral" value="'+lim+'">';

            }
            $(result1).appendTo("#total-general");
}

//formularioss

$("#formInicio").validate({

      rules: {
          password: {
            required: true,

          },
          email: {
            required: true,
            email: true
          },
      }
      ,errorPlacement: function(error, element) {
      error.insertBefore( element );
      },

      messages: {
            email: {
              required: "Ingresa tu correo",
              email: "El correo no es correcto"
            },
            password: {
              required: "Ingrese su contraseña"
            },

          },

      success: function(label, element) {
          $(element).removeClass('is-invalid');
      },
      errorPlacement: function(error, element) {
          $(element).addClass('is-invalid');
      },
      invalidHandler: function(form, validator) {
          validator.focusInvalid();
      },
      submitHandler: function (form) {
          $("#modalIngresar2").modal('hide');
          var vip = $('#vip').val();
          var normal = $('#normal').val();
          var local = $('#local_input').val();
          var codigo = $( "#codigoPromocional" ).val();
          var subtotal = $( "#totalGeneral" ).val();
          var combos = $( "#combos" ).val();

          var token = $("input[name=_token]").val();
          var formData = new FormData(form);
          var url = $(form).attr('action');
          $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': token.content
            },
            success: function (response) {
              // console.log(vip, normal, local);
              // console.log(codigo, subtotal, combos);
              // console.log(response.user);
              clearForm();
              $("#form2").css('display', 'block');
              $("#form1").css('display', 'none');

              // $(".h3").css('display', 'none');
              // $(".h3").css('display', 'block');

              $('#local_id').val(local);
              $('#vip_c').val(vip);
              $('#normal_c').val(normal);
              $('#user_').val(response.user.id);
              $('#subtotal').val(subtotal);
              $('#combo').val(combos);

              $("#comprador").html("");
              var result1;
              result1 =  '<span>Confirma tu compra, '+response.user.name+'</span>';
              $(result1).appendTo("#comprador");


              $("#ingrese_header").css('display', 'none');
              $("#registro_header").css('display', 'none');
              $("#pintarUsuario").css('display', 'block');

              $("#navbarDropdown").html("");
              var result2;
              result2 =  '<span>'+response.user.name+'</span><span class="caret"></span>';
              $(result2).appendTo("#navbarDropdown");


            }
          });
      }
  });

  function clearForm() {
   $(':input').each(function() {
     var type = this.type;
     var tag = this.tagName.toLowerCase();
     var filename = $("#chooseFile").val();

     if (type == 'text' || type == 'password' || tag == 'textarea' || type == 'email' || type == 'file')
       this.value = "";

     else if (type == 'checkbox' || type == 'radio')
       this.checked = false;

     else if (tag == 'select')
       this.selectedIndex = "";

   });
  }

$("#formRegistro").validate({
        rules: {
            password: {
              required: true,

            },
            email: {
              required: true,
              email: true
            },
        }
        ,errorPlacement: function(error, element) {
        error.insertBefore( element );
        },

        messages: {
              email: {
                required: "Ingresa tu correo",
                email: "El correo no es correcto"
              },
              password: {
                required: "Ingrese su contraseña"
              },

            },

        success: function(label, element) {
            $(element).removeClass('is-invalid');
        },
        errorPlacement: function(error, element) {
            $(element).addClass('is-invalid');
        },
        invalidHandler: function(form, validator) {
            validator.focusInvalid();
        },
        submitHandler: function (form) {
            var token = $("input[name=_token]").val();
            var formData = new FormData(form);
            var url = $(form).attr('action');
            $.ajax({
              url: url,
              method: 'POST',
              data: formData,
              dataType: 'json',
              cache: false,
              contentType: false,
              processData: false,
              headers: {
                  'X-CSRF-TOKEN': token.content
              },
              success: function (response) {

                clearForm();
                $("#form2").css('display', 'block');
                $("#form1").css('display', 'none');

                $('#local_id').val(local);
                $('#vip_c').val(vip);
                $('#normal_c').val(normal);
                $('#user_').val(response.user.id);
                $('#subtotal').val(subtotal);
                $('#combo').val(combos);

                $("#comprador").html("");
                var result;
                result =  '<span>Confirma tu compra, '+response.user.name+'</span>';
                $(result).appendTo("#comprador");


                $("#ingrese_header").css('display', 'none');
                $("#registro_header").css('display', 'none');
                $("#pintarUsuario").css('display', 'block');

                $("#navbarDropdown").html("");
                var result;
                result =  '<span>'+response.user.name+'</span><span class="caret"></span>';
                $(result).appendTo("#navbarDropdown");


              }
            });
        }
    });
