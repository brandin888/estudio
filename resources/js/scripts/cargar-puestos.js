
  function funcion_puesto(id){
    var route = site_url+'cargar-puestos/'+id;
      $.ajax({
        url: route,
        data : {},
        type : 'GET',
        dataType: 'json',
        success : function(response){
            // console.log(response.locales.id)
            // console.log(response.puestos)
            cargar__puestos(response);
        }
      });
  }

  function cargar__puestos(response){
      var slug = response.locales.slug;
      var local_id = response.locales.id;

      $("#cargaPuestos").html("");
      var result;
      result =  '<div id="'+slug+'" class="tab-pane fade in active show " >';
      result +=  "<div class='row'>";
      $.each(response.puestos, function(j, item) {
        var movimiento = 'fade-left';
        if((j+1)%2 != 0){
          movimiento = 'fade-right';
        }
          result +=  "<div class='col-md-6 col-xs-12 col-sm-6' data-aos='"+movimiento+"'>";
          result +=  '<div class="trabaja__content--item">';
          result +=  '<h3 class="trabaja__content--item--titulo">' +item.nombre+'</h3>';
          result +=  '<span class="trabaja__content--item--subtitulo">Detalles del puesto</span>';
          result +=  '<p class="trabaja__content--item--parrafo">' +item.detalle+'</p>';
          result +=  '<ul class="trabaja__content--item--listado">';
          result +=  '<li>';
          result +=  '<h4>Fin de convocatoria</h4>';
          result +=  '<span>'+item.fin+'</span>';
          result +=  '</li>';
          result +=  '<li>';
          result +=  '<h4>Vacantes</h4>';
          result +=  '<span>'+item.vacante+'</span>';
          result +=  '</li>';
          result +=  '</ul>';
          result +=  '<a href="#" data-toggle="modal" data-target="#modalTrabaja" onclick="pasalo(' +item.id+',' +local_id+')" class="btn btn-primary">Postularme</a>';
          result +=  "</div>";
          result +=  "</div>";
      });

      result +=  "</div>";
      result +=  "</div>";

      $(result).appendTo("#cargaPuestos");
    }

  function pasalo(puesto_id, local_id){

    var route = site_url+'cargar-puesto-local/'+local_id+'/'+puesto_id;
      $.ajax({
        url: route,
        data : {},
        type : 'GET',
        dataType: 'json',
        success : function(response){
            var local = response.local.nombre;
            var puesto = response.puesto.nombre;
            $("#pasalo_").html("");

            var result;
            result =  '<div class="form-group col-md-6 " >';
            result +=  '<label for="">Local</label>';
            result +=  '<select class="form-control" name="local_id" id="local_id">';
            // $.each(response.locales, function(j, item) {
              // var predeterminado = '';
              // if(item.nombre==local){
              //   predeterminado = 'selected=true';
              // }
              result +=  '<option value="'+local_id+'">'+local+'</option>';
            // });
            result +=  '</select>';
            result +=  '<label for="local_id" generated="true" class="error"></label>';
            result +=  '</div>';
            result +=  '<div class="form-group col-md-6">';
            result +=  '<label for="">Puesto</label>';
            result +=  '<select class="form-control" name="puesto_id" id="puesto_id">';
            // $.each(response.puestos, function(j, item2) {
              // var predeterminado2 = '';
              // if(item2.nombre==puesto){
              //   predeterminado2 = 'selected=true';
              // }
              result +=  '<option value="'+puesto_id+'">'+puesto+'</option>';
            // });

            result +=  '</select>';
            result +=  '<label for="local_id" generated="true" class="error"></label>';

            $(result).appendTo("#pasalo_");

        }
      });



  }
