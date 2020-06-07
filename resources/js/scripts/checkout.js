
    var subtotal = $("#precioTotal").val();
    var totalapagar = $("#total-a-pagar").val();


    $('#checkCodigo').click(function(){
      if( $(this).is(':checked')){
        $("#codigoPromocional").css("display","block");
        $("#aplicar").prop("disabled", false);

        //Boton aplicar codigo promocional, y generar factura
          $('#aplicar').click(function() {
            var checked = $( "input:checked" ).val();
            var codigo = $( "#codigoPromocional" ).val();

            // var contador = $( "#contador" ).val();
            var subtotal = $( "#precioTotal" ).val();
            $( "#total-sin-descuento" ).val(subtotal);
            $( "#codigo2" ).val(codigo);


            var elem = document.getElementsByTagName("input");
            var names = [];
            for (var i = 0; i < elem.length; ++i) {
              if (typeof elem[i].attributes.id !== "undefined") {
                if (elem[i].attributes.id.value == "nombre") {
                  names.push(elem[i].value);
                }
              }
            }

            var nombres = names;
            $( "#nombre2" ).val(nombres);

            var elem = document.getElementsByTagName("input");
            var cantidades = [];
            for (var i = 0; i < elem.length; ++i) {
              if (typeof elem[i].attributes.id !== "undefined") {
                if (elem[i].attributes.id.value == "cantidad") {
                  cantidades.push(elem[i].value);
                }
              }
            }
            var cantidad = cantidades;
            $( "#cantidad2" ).val(cantidad);
            var elem = document.getElementsByTagName("input");
            var precios = [];
            for (var i = 0; i < elem.length; ++i) {
              if (typeof elem[i].attributes.id !== "undefined") {
                if (elem[i].attributes.id.value == "precio") {
                  precios.push(elem[i].value);
                }
              }
            }
            var precio = precios;
            $( "#precio2" ).val(precio);

            // console.log(nombres, cantidad, precio )

            if(checked == 1 && codigo == ''){
              alert('debe ingresar su código promocional')
            }

            if(codigo){
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
                   else if(response.f != null){
                     Swal.fire('El código ya fue utilizado')
                   }else if(response.descuento != 0){
                         var descuento = subtotal*response.descuento/100;

                         var total = subtotal - descuento;
                         total = total.toFixed(2);

                         $( "#precioTotal" ).val(total);
                         $( "#total-a-pagar" ).val(total);

                         $("#nuevototal").html("");
                         var result;
                         result =  '<span>S/'+total+'</span>';
                         $(result).appendTo("#nuevototal");
                         $("#total").css('display',' none');
                         $("#nuevototal").css('display',' block');


                     }

                  }
              });
            }

          });

      }
      else{
        $("#codigoPromocional").css("display","none");
        $("#aplicar").prop("disabled", true);
      }
      var checked = $( "input:checked" ).val();
    });

    //Asignar valores a los input para procesar pago cuando no se tenga codigo
    var elem = document.getElementsByTagName("input");
    var names = [];
    for (var i = 0; i < elem.length; ++i) {
      if (typeof elem[i].attributes.id !== "undefined") {
        if (elem[i].attributes.id.value == "nombre") {
          names.push(elem[i].value);
        }
      }
    }

    var nombres = names;
    $( "#nombre2" ).val(nombres);

    var elem = document.getElementsByTagName("input");
    var cantidades = [];
    for (var i = 0; i < elem.length; ++i) {
      if (typeof elem[i].attributes.id !== "undefined") {
        if (elem[i].attributes.id.value == "cantidad") {
          cantidades.push(elem[i].value);
        }
      }
    }
    var cantidad = cantidades;
    $( "#cantidad2" ).val(cantidad);
    var elem = document.getElementsByTagName("input");
    var precios = [];
    for (var i = 0; i < elem.length; ++i) {
      if (typeof elem[i].attributes.id !== "undefined") {
        if (elem[i].attributes.id.value == "precio") {
          precios.push(elem[i].value);
        }
      }
    }
    var precio = precios;

    $( "#precio2" ).val(precio);
