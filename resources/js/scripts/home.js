//add and remove class
  $('body').on('click', '.pills', function() {
    $(".pills").removeClass("active");
    $(this).addClass("active");
  });

//inicializando variable de cargar mas
var $num = 4;

//cargar atracciones al hacer click a un local
function mi_funcion(id){
    // console.log(id);
    var route = site_url+'cargar-atracciones/'+id;
      $.ajax({
        url: route,
        data : {},
        type : 'GET',
        dataType: 'json',
        success : function(response){
            cargar__atracciones(response);
        }
      });
  }

//cargar mas atracciones
function carga_mas(id){
    event.preventDefault();
    // console.log(id);
      $('.rotar_icono').addClass("rotate");

      $num = $num + 2;
      var route = site_url+'cargar-mas-atracciones/'+id;
      $.ajax({
        url: route,
        data : {num:$num},
        type : 'GET',
        dataType: 'json',
        success : function(response){
          // console.log(response);
          cargar__atracciones(response);
        }
      });
  }

//cargar las atracciones al html
function cargar__atracciones(response){
    var slug = response.locales.slug;
    var local_id = response.locales.id;

    if(response.var == true){
      var display_ = 'block';
    }else{
      var display_ = 'none';
    }

    var clase = '';
    var clase3 = '';
    var clase4 = '';
    var movimiento = '';

    $("#cargaAtracciones").html("");
    var result;
    result =  '<div id="'+slug+'" class="tab-pane fade in active show">';
    result +=  "<div class='row'>";
    $.each(response.attractions, function(j, item) {
       if((j+1)%2 == 0){
         movimiento = 'fade-up-left';
       }else{
         movimiento = 'fade-up-right';
       }
        if(item.orden == 1){
             clase = 'col-md-5 col-sm-5';
             clase3 = 'cuadrado';
             clase4 = 'pequenoW';
           }
        else{
             clase = 'col-md-7 col-sm-7';
             clase3 = 'rectangulo';
             clase4 = 'grandeW';
           }
        result +=  "<div class='"+clase+" col-xs-12'>";
        result +=  "<div class='nuestras__atracciones__content--item nuestras__atracciones__content--item--"+clase3+"' style='background-image:url(storage/"+item.imagen+");' data-aos='"+movimiento+"'>";
        result +=  "<h3 class='nuestras__atracciones__content--item--titulo'>" +item.nombre+"</h3>";
        result +=  "<p class='nuestras__atracciones__content--item--parrafo nuestras__atracciones__content--item--parrafo--"+clase4+"'>" +item.titulo+"</p>";
        result +=  "</div>";
        result +=  "</div>";
    });

    result +=  "<div class='col-md-12'>";
    result +=  "<div class='cargar__mas' style='display: "+display_+"'>";
    result +=  "<a href='#' class='btn btn-primary'  onclick='carga_mas("+local_id+")' ><img class='rotar_icono' src='images/icons/recarga-blanco.png' alt='' >Cargar más</a>";
    result +=  "</div>";
    result +=  "</div>";

    result +=  "</div>";
    result +=  "</div>";

    $(result).appendTo("#cargaAtracciones");

  }


$('#select__local').change(function(){

  var local = $(this).val();
  var route = site_url+'cargar-pulseras/'+local;
  $.ajax({
      url: route,
      data : {},
      type : 'GET',
      dataType: 'json',
      success : function(response){


             $("#select__pulsera").html("");
             var result;

             result = '<option class="bg-warning" value="seleccionar">Seleccionar</option>';

            $.each(response.pulseras, function(i, item) {

              result += '<option class="bg-warning" value="'+item.pulsera_id+'">'+item.name+'</option>';

            });

            $(result).appendTo("#select__pulsera");

      }
  });
})
