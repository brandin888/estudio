$(document).ready( function() {
  $("#local_birthday_").css('display', 'block');
  $("#paquete_").css('display', 'none');
  $("#calendario_").css('display', 'none');
  $("#datos_").css('display', 'none');
  $("#confirmacion_").css('display', 'none');
});

$('body').on('click', '.wizards__content__link', function() {
    event.preventDefault();
    $("#local_birthday_").css('display', 'none');
    $("#paquete_").css('display', 'block');
    $("#paquete").addClass('active');
    $("#calendario_").css('display', 'none');
    $("#datos_").css('display', 'none');
    $("#confirmacion_").css('display', 'none');
    $(".numero1").css('display', 'none');
    $(".check1").css('display', 'block');

    $("#selecciona--local").css('display', 'none');

    $(".wizard__listado__item--pintado--1").css('display', 'block');


    var local = $('#input_bitrhday').val();
    var route = site_url+'cargar-local/'+local;
    $.ajax({
     url: route,
     data : {},
     type : 'GET',
     dataType: 'json',
     success : function(response){
       // console.log(response)
       $("#local--seleccionado").html("");
       resultado = '<h7>'+response.locales.nombre+'</h7>';

       $(resultado).appendTo("#local--seleccionado");
       $("#local--seleccionado").css('display', 'block');
     }
   });
    var route = site_url+'cargar-local-birthday';
    $.ajax({
     url: route,
     data : {local:local},
     type : 'GET',
     dataType: 'json',
     success : function(response){
       $("#pintar__paquete").html(response);

     }
   });

});

$('body').on('click', '.wizards__content__birthday', function() {
  event.preventDefault();
  $("#local_birthday_").css('display', 'none');
  $("#paquete_").css('display', 'none');
  $("#paquete").addClass('active');
  $("#calendario_").css('display', 'block');
  $("#calendario").addClass('active');
  $("#datos_").css('display', 'none');
  $("#confirmacion_").css('display', 'none');
  $(".numero1").css('display', 'none');
  $(".check1").css('display', 'block');
  $(".numero2").css('display', 'none');
  $(".check2").css('display', 'block');

  $("#selecciona--paquete").css('display', 'none');

  $(".wizard__listado__item--pintado--2").css('display', 'block');

  var paquete = $('#paquete_bitrhday').val();

  // ajax para procesar solicitud de cumpleaños
   var route = site_url+'solicitud-cumpleanio/'+paquete;
   $.ajax({
       url: route,
       data : {},
       type : 'GET',
       dataType: 'json',
       success : function(response){
           var result;
           //agg html que muestra la solicitud de cumpleaños
           $("#paquete--seleccionado").html("");
           result =  '<h7>'+response.paquete.nombre+'</h7>';
           $(result).appendTo("#paquete--seleccionado");
           $("#paquete--seleccionado").css('display', 'block');


       }
   });

});

$('body').on('click', '.previous', function() {
  event.preventDefault();
  $("#local_birthday_").css('display', 'block');
  $("#paquete_").css('display', 'none');
  $("#calendario_").css('display', 'none');
  $("#paquete").removeClass('active');
  $("#datos_").css('display', 'none');
  $("#confirmacion_").css('display', 'none');
  $(".numero1").css('display', 'block');
  $(".check1").css('display', 'none');
  $(".numero2").css('display', 'block');
  $(".check2").css('display', 'none');
  $("#selecciona--local").css('display', 'block');
  $("#local--seleccionado").css('display', 'none');
  $(".wizard__listado__item--pintado--1").css('display', 'none');
  $("#selecciona--paquete").css('display', 'block');
  $("#paquete--seleccionado").css('display', 'none');

});

$('.next').click(function(){
  event.preventDefault();
  $("#local_").css('display', 'none');
  $("#paquete_").css('display', 'none');
  $("#paquete").addClass('active');
  $("#calendario_").css('display', 'none');
  $("#calendario").addClass('active');
  $("#datos_").css('display', 'block');
  $("#datos").addClass('active');
  $("#confirmacion_").css('display', 'none');
  $(".numero1").css('display', 'none');
  $(".check1").css('display', 'block');
  $(".numero2").css('display', 'none');
  $(".check2").css('display', 'block');
  $(".numero3").css('display', 'none');
  $(".check3").css('display', 'block');

  $("#selecciona--fecha").css('display', 'none');

  $(".wizard__listado__item--pintado--3").css('display', 'block');

  var local = $('#input_bitrhday').val();
  var paquete = $('#paquete_bitrhday').val();
  if($('#fechaEscogida').val())
    var fecha = $('#fechaEscogida').val();
  else
    var fecha = $('#fechaActual').val();
  var hora = $('#hora').val();
  var minutos = $('#minutos').val();
  var am = $('#am').val();

  $("#am2").empty();
  $("#am2").val(am);

  var resultado;
  $("#fecha--seleccionado").html("");
  resultado =  '<h7>'+fecha+' '+hora+':'+minutos+am+'</h7>';
  $(resultado).appendTo("#fecha--seleccionado");
  $("#fecha--seleccionado").css('display', 'block');
  // console.log(local,paquete,fecha,hora,minutos,am)

  // ajax para procesar solicitud de cumpleaños
   var route = site_url+'solicitud-cumpleanio/'+paquete;
   $.ajax({
       url: route,
       data : {},
       type : 'GET',
       dataType: 'json',
       success : function(response){

           //agg html que muestra la solicitud de cumpleaños
           $("#pintar__cumpleaños").html("");
           var result;
           result =  '<ul class="local__listado--item local__listado--item--right">';
           result +=  '<li>'+response.local.nombre+'</li>';
           result +=  '<li>'+response.paquete.nombre+'</li>';
           result +=  '<li>'+fecha+' '+hora+':'+minutos+am+'</li>';
           result +=  '</ul>';
           $(result).appendTo("#pintar__cumpleaños");

       }
   });

});

$('.previous2').click(function() {
  event.preventDefault();
  $("#local_birthday_").css('display', 'none');
  $("#paquete_").css('display', 'block');
  $("#paquete").addClass('active');
  $("#calendario_").css('display', 'none');
  $("#calendario").removeClass('active');
  $("#datos_").css('display', 'none');
  $("#datos").removeClass('active');
  $("#confirmacion_").css('display', 'none');
  $(".numero1").css('display', 'none');
  $(".check1").css('display', 'block');
  $(".numero2").css('display', 'block');
  $(".check2").css('display', 'none');
  $("#selecciona--paquete").css('display', 'block');
  $("#paquete--seleccionado").css('display', 'none');


  $(".wizard__listado__item--pintado--2").css('display', 'none');
  $(".wizard__listado__item--pintado--3").css('display', 'none');
});

$('.editar').click(function() {
  event.preventDefault();
  $("#local_").css('display', 'none');
  $("#paquete_").css('display', 'none');
  $("#paquete").addClass('active');
  $("#calendario_").css('display', 'block');
  $("#calendario").addClass('active');
  $("#datos_").css('display', 'none');
  $("#datos").removeClass('active');
  $("#confirmacion_").css('display', 'none');
  $(".numero1").css('display', 'none');
  $(".check1").css('display', 'block');
  $(".numero2").css('display', 'none');
  $(".check2").css('display', 'block');
  $(".numero3").css('display', 'block');
  $(".check3").css('display', 'none');

  $("#selecciona--fecha").css('display', 'block');
  $("#fecha--seleccionado").css('display', 'none');

  $(".wizard__listado__item--pintado--4").css('display', 'none');


});

$("#formCumpleanio").validate({

      rules: {
          nombre: {
            required: true
          },
          apellidos: {
            required: true
          },
          telefono: {
            required: true,
            number: true,
            minlength: 7,
            maxlength: 15,
          },
          email: {
            required: true,
            email: true
          },
          mensaje: {
            required: true
          },
      }
      ,errorPlacement: function(error, element) {
      error.insertBefore( element );
      },

      messages: {
            nombre: "Ingresa tus nombre",
              nombre: "Ingresa tus apellidos",
            telefono: {
              required: "Ingresa tu teléfono",
              number: "El teléfono debe ser numérico",
              minlength: "Ingresa mínimo 7 números",
              maxlength: 'Ingresa máximo 15 números',

            },
            email: {
              required: "Ingresa tu correo",
              email: "El correo no es correcto"
            },
            mensaje: {
              required: "Ingresa un mensaje"
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
        if( ! $("#formCumpleanio input[name='politica']:checkbox").is(':checked') ) {
          $('#mensajePolitica').text('Debe aceptar políticas y condiciones.');
        }else{
          var token = $("input[name=_token]").val();
          var formData = new FormData(form);
          var url = $(form).attr('action');
          postData(token, formData, url);
        }
      }
  });
  function postData(token, formData, url){
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
        // alert('Enviado con éxito');
       // $('#modalGracias1').modal('show')
       $("#local_").css('display', 'none');
       $("#paquete_").css('display', 'none');
       $("#paquete").addClass('active');
       $("#calendario_").css('display', 'none');
       $("#calendario").addClass('active');
       $("#datos_").css('display', 'none');
       $("#datos").addClass('active');
       $("#confirmacion_").css('display', 'block');
       $("#confirmacion").addClass('active');
       $(".numero1").css('display', 'none');
       $(".check1").css('display', 'block');
       $(".numero2").css('display', 'none');
       $(".check2").css('display', 'block');
       $(".numero3").css('display', 'none');
       $(".check3").css('display', 'block');
       $(".numero4").css('display', 'none');
       $(".check4").css('display', 'block');
       $(".numero5").css('display', 'none');
       $(".check5").css('display', 'block');

       $(".wizard__listado__item--pintado--5").css('display', 'block');

        clearForm();
      }
    });
  }

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
