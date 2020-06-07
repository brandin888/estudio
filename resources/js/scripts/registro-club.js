  $("#formRegistro").validate({

      rules: {
          nombre: {
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
            minlength:7,
            maxlength:8
          },
          fecha_nacimiento:{
            required: true
          },
          hijos:{
            required: true
          },
          local_id: {
            required: true
          },

      }
      ,errorPlacement: function(error, element) {
      error.insertBefore( element );
      },

      messages: {
            nombre: "Ingresa tus nombres",
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
            fecha_nacimiento: {
              required: "Ingresa tu fecha de nacimiento"
            },
            hijos: {
              required: "Debe confirmar si tiene hijos"
            },
            local_id: {
              required: "Seleccionar una sede"
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

        var email = $('#email_club').val();
        var p1 = $('#p_club').val();
        var p2 = $('#p_confirm').val();

        var route = site_url+'verificar-email';
        $.ajax({
            type: "GET",
            url: route,
            data: {email:email},
            dataType: "json",
            success: function(response) {
              // console.log(data.row )
              if(response.mensaje != 0){
                $('#mensajeEmail').text(response.mensaje);
              }else{
                $('#mensajeEmail').text('');
                if(p1 == p2){
                  if( ! $("#formRegistro input[name='politica']:checkbox").is(':checked') ) {
                    $('#mensajePolitica').text('Debe aceptar políticas y condiciones.');
                  }else{
                    var token = $("input[name=_token]").val();
                    var formData = new FormData(form);
                    var url = $(form).attr('action');
                    postData(token, formData, url);
                  }
                }else{
                  $('#mensajePassword').text('Su contraseña no coinciden.');
                }

              }

            },
            error: function() {
                console.log('error handling here');
            }
        });


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
        Swal.fire(
          'Enviado con éxito.',
          'Para continuar debe confirmar su correo.',
          'success'
        )

        $('.swal2-confirm').click(function(){
          location.reload();
        });

        clearForm();
      }
    });
  }



  function clearForm() {

  	$(':input').each(function() {
  	  var type = this.type;
  	  var tag = this.tagName.toLowerCase();
  		var filename = $("#chooseFile").val();

  	  if (type == 'text' || type == 'password' || tag == 'textarea' || type == 'email' || type == 'file' || type == 'date')
  	    this.value = "";

  	  else if (type == 'checkbox' || type == 'radio')
  	    this.checked = false;

  	  else if (tag == 'select')
  	    this.selectedIndex = "";

  	});

  }

  $("#formActualizar").validate({
        rules: {
            email: {
              email: true
            },
            telefono: {
              number: true,
              minlength: 7,
              maxlength: 15,
            },hijos:{
              required: true
            },

        }
        ,errorPlacement: function(error, element) {
        error.insertBefore( element );
        },

        messages: {
              telefono: {
                number: "El teléfono debe ser numérico",
                minlength: "Ingresa mínimo 7 números",
                maxlength: 'Ingresa máximo 15 números',
              },
              email: {
                email: "El correo no es correcto"
              }

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

          $('#mensajePassword').text('');
          var p1 = $('#p_club2').val();
          var p2 = $('#p_confirm2').val();
          var email = $('#email_club2').val();

          //
          // if(p1 == p2){
          //   if( ! $("#formActualizar input[name='politica']:checkbox").is(':checked') ) {
          //     $('#mensajePolitica').text('Debe aceptar políticas y condiciones.');
          //     $('#mensajePassword').text('');
          //   }else{
          //     var token = $("input[name=_token]").val();
          //     var formData = new FormData(form);
          //     var url = $(form).attr('action');
          //     $.ajax({
          //       url: url,
          //       method: 'POST',
          //       data: formData,
          //       dataType: 'json',
          //       cache: false,
          //       contentType: false,
          //       processData: false,
          //       headers: {
          //           'X-CSRF-TOKEN': token.content
          //       },
          //       success: function (response) {
          //         // alert('Enviado con éxito');
          //         Swal.fire(
          //           'Actualizado con éxito.',
          //           ' ',
          //           'success'
          //         )
          //         setTimeout("location.reload()", 2000);
          //
          //       }
          //     });
          //
          //   }
          // }else{
          //   $('#mensajePassword').text('Su contraseña no coinciden.');
          // }

          var route = site_url+'verificar-email2';
          $.ajax({
              type: "GET",
              url: route,
              data: {email:email},
              dataType: "json",
              success: function(response) {
                // console.log(data.row )
                if(response.mensaje != 0){
                  $('#mensajeEmail').text(response.mensaje);
                }else{
                  $('#mensajeEmail').text('');
                  if(p1 == p2){
                    if( ! $("#formActualizar input[name='politica']:checkbox").is(':checked') ) {
                      $('#mensajePolitica').text('Debe aceptar políticas y condiciones.');
                    }else{
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

                           Swal.fire(
                             'Actualizado con éxito.',
                             ' ',
                             'success'
                           )
                           setTimeout("location.reload()", 2000);

                         }
                       });
                    }
                  }else{
                    $('#mensajePassword').text('Su contraseña no coinciden.');
                  }

                }

              },
              error: function() {
                  console.log('error handling here');
              }
          });


        }

    });



  $("#hijo").click(function(){
    $("#si__hijos").css('display', 'block');
  });
  $("#hijo2").click(function(){
    $("#si__hijos").css('display', 'none');
  });
