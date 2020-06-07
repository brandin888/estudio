
    $("#formTrabaja").validate({

          rules: {
              nombres: {
                required: true
              },
              apellidos: {
                required: true
              },
              email: {
                required: true,
                email: true
              },
              telefono: {
                required: true,
                number: true,
                minlength: 7,
                maxlength: 15,
              },
              dni: {
                required: true,
                number: true,
                minlength: 7,
                maxlength: 8,
              },
              local_id: {
                required: true
              },
              puesto_id: {
                required: true
              },

          }
          ,errorPlacement: function(error, element) {
          error.insertBefore( element );
          },

          messages: {
                nombres: "Ingresa tus nombres",
                apellidos: "Ingresa tus apellidos",
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
                dni: {
                  required: "Ingresa tu dni",
                  number: "El dni debe ser numérico",
                  minlength: "Ingresa mínimo 7 números",
                  maxlength: 'Ingresa máximo 8 números',
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

            	if( ! $("#formTrabaja input[name='politica']:checkbox").is(':checked') ) {
                $('#mensajePolitica').text('Debe aceptar políticas y condiciones.');
            	}else{
                var token = $("input[name=_token]").val();
                var formData = new FormData(form);
                var url = $(form).attr('action');
                $("#politica").click(function(){
                  var checked = $( "input:checked" ).val();
                  if($(this).is(':checked')){
                    alert("El check de condiciones de uso es requerido");
                    swal({
                      text: "El check de condiciones de uso es requerido",
                    });
                  }
                });
                postData(token, formData, url);
              }

          }
      });

// $("#formTrabaja").validate({
//
//       rules: {
//           nombres: {
//             required: true
//           },
//           apellidos: {
//             required: true
//           },
//           email: {
//             required: true,
//             email: true
//           },
//           telefono: {
//             required: true,
//             number: true,
//             minlength: 7,
//             maxlength: 15,
//           },
//           dni: {
//             required: true,
//             number: true,
//             minlength: 7,
//             maxlength: 8,
//           },
//           local_id: {
//             required: true
//           },
//           puesto_id: {
//             required: true
//           },
//
//       }
//       ,errorPlacement: function(error, element) {
//       error.insertBefore( element );
//       },
//
//       messages: {
//             nombres: "Ingresa tus nombres",
//             apellidos: "Ingresa tus apellidos",
//             telefono: {
//               required: "Ingresa tu teléfono",
//               number: "El teléfono debe ser numérico",
//               minlength: "Ingresa mínimo 7 números",
//               maxlength: 'Ingresa máximo 15 números',
//
//             },
//             email: {
//               required: "Ingresa tu correo",
//               email: "El correo no es correcto"
//             },
//             dni: {
//               required: "Ingresa tu dni",
//               number: "El dni debe ser numérico",
//               minlength: "Ingresa mínimo 7 números",
//               maxlength: 'Ingresa máximo 8 números',
//             },
//
//
//           },
//
//       success: function(label, element) {
//           $(element).removeClass('is-invalid');
//       },
//       errorPlacement: function(error, element) {
//           $(element).addClass('is-invalid');
//       },
//       invalidHandler: function(form, validator) {
//           validator.focusInvalid();
//       },
//       submitHandler: function (form) {
//           var token = $("input[name=_token]").val();
//           var formData = new FormData(form);
//           var url = $(form).attr('action');
//           $("#politica").click(function(){
//             var checked = $( "input:checked" ).val();
//             if($(this).is(':checked')){
//               alert("El check de condiciones de uso es requerido");
//               swal({
//                 text: "El check de condiciones de uso es requerido",
//               });
//             }
//           });
//           postData(token, formData, url);
//       }
//   });
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
        $('#modalTrabaja').css('display', 'none');
        Swal.fire(
          'Enviado con éxito.',
          'Pronto estaremos en contacto.',
          'success'
        )
        $('.swal2-confirm').click(function(){
          location.reload();
        });
       // $('#modalGracias1').modal('show')
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
