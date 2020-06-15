$("#formContacto").validate({
      rules: {
          nombres: {
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
          asunto: {
            required: true
          },
          mensaje: {
            required: true
          },
      }
      ,errorPlacement: function(error, element) {
      error.insertBefore( element );
      },

      messages: {
            nombres: "Ingresa tus nombres y apellidos",
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
            asunto: {
              required: "Ingresa tu asunto"
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
        if( ! $("#formContacto input[name='politica']:checkbox").is(':checked') ) {
          $('#mensajePolitica').text('Debe aceptar políticas y condiciones.');
        }else{
          var token = $("input[name=_token]").val();
          var formData = new FormData(form);
          var url = $(form).attr('action');
          postDatos(token, formData, url);
        }
      }
  });
  function postDatos(token, formData, url){
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
        alert('Enviado con éxito');
        Swal.fire(
          'Enviado con éxito.',
          'Pronto estaremos en contacto',
          'success'
        )
       // $('#modalGracias1').modal('show')
        clearFormulario();
      }
    });
  }

  function clearFormulario() {

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

  $("#formSuscripcion").validate({
        rules: {
            correo: {
              required: true
            },
        }
        ,errorPlacement: function(error, element) {
        error.insertBefore( element );
        },

        messages: {
              correo: "Ingresa tu correo",

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
              // alert('Enviado con éxito');
                Swal.fire(
                  'Enviado con éxito.',
                  'Pronto estaremos en contacto.',
                  'success'
                )
               // $('#modalGracias1').modal('show')
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
            });

        }
    });
