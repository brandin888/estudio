$(document).ready(function() {

  var dino=$('.dino');
  var murci=$('.murci');
  var muneco=$('.muneco');
  var promo=$('#promo');

  promo.mousemove(function(e){
    var valueX=(e.pageX * -1 /12);
    var valueY=(e.pageY * -1 / 12);
    dino.css({
        'transform':'translate3d(' + valueX + 'px,' + valueY + 'px,0) ',
        'bottom':'-275px'
    });
  });
  promo.mousemove(function(e){
    var valueX=(e.pageX * -1 /15);
    var valueY=(e.pageY * -1 / 20);
    murci.css({
        'transform':'translate3d(' + valueX + 'px, ' + valueY + 'px,0) ',
        'left':'-104px',
        'top':'33%'
    });
  });
  promo.mousemove(function(e){
    var valueX=(e.pageX * -1 /40);
    var valueY=(e.pageY * -1 / 15);
    muneco.css({
        'transform':'translate3d(' + valueX + 'px,' + valueY + 'px,0) ',
        'left':'60px',
        'bottom':'-261px'
    });
  });


  /*mousemove banners
  var banner=$('#banner');

  banner.mousemove(function(e){
    var moveX=(e.pageX * -1 /15);
    var moveY=(e.pageY * -1 / 15);
    $(this).css('background-position', moveX + 'px ' + moveY + 'px')
  });*/

  //nosotros
  $("#scrollTop").click(  function(){
    $('html, body').animate({
      scrollTop: $('#nosotros').offset().top
    }, 2000);

  });

  //club
  $("#verMas").click(  function(){
    $('html, body').animate({
      scrollTop: $('#club').offset().top
    }, 2000);
  });

  $("#registrar").click(  function(){
    $('html, body').animate({
      scrollTop: $('#registrate').offset().top
    }, 2000);

  });

  if( $('.promo-owl').length )
  {
    $('.promo-owl').owlCarousel({
        loop:true,
        margin:10,
        dots:false,

        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:1,
                nav:false
            },
            1000:{
                items:1,
                nav:true,
                loop:false
            }
        }
    })
  }

});


//Active Menu

var  pestana = $('#pestana_vista').attr('valor');
$('#'+pestana).addClass('activo');

//menu responsive

$(document).ready(menu);
function menu() {
  $('#menu-icon-shape').on('click', function() {
    $('#menu-icon-shape').toggleClass('active');
    $('#top, #middle, #bottom').toggleClass('active');
    $('#overlay-nav').toggleClass('active');
  });
}

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
        if(item.orden == 1){
             clase = 'col-md-5 col-sm-5';
             clase3 = 'cuadrado';
             clase4 = 'pequenoW';
             movimiento = 'fade-right';
           }
        else{
             clase = 'col-md-7 col-sm-7';
             clase3 = 'rectangulo';
             clase4 = 'grandeW';
             movimiento = 'fade-left';
           }
        result +=  "<div class='"+clase+" col-xs-12'>";
        result +=  "<div  class='nuestros__productos__content--item nuestros__productos__content--item--"+clase3+"' style='background-image:url(storage/"+item.imagen+");'>";
        result +=  "<h3 class='nuestros__productos__content--item--titulo'>" +item.nombre+"</h3>";
        result +=  "<p class='nuestros__productos__content--item--parrafo nuestros__productos__content--item--parrafo--"+clase4+"'>" +item.titulo+"</p>";
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
      result =  '<div id="'+slug+'" class="tab-pane fade in active show ">';
      result +=  "<div class='row'>";
      $.each(response.puestos, function(j, item) {
          result +=  "<div class='col-md-6 col-xs-12 col-sm-6'>";
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


if( $('.maps').length )
{
var map;
function cargardireccion(id){
  var route = site_url+'cargar-mapa/'+id;
  $.ajax({
    url: route,
    data : {},
    type : 'GET',
    dataType: 'json',
    success : function(response){
      // console.log(response.local.latitud);
      map = new GMaps({
        div: '#map',
        zoom: 17,
        zoomControl : false,
        panControl : false,
        overviewMapControl: false,
        streetViewControl : false,
        mapTypeControl: false,
        lat:response.local.latitud,
        lng:response.local.longitud
      });

      map.addMarker({
        lat:response.local.latitud,
        lng:response.local.longitud,
        title:response.local.nombre,
        icon: 'images/pin.png',
        infoWindow: {
          content: response.local.iframe
        }
      });

      /*estilo*/
      var styles =
      /* pegar estilo https://snazzymaps.com */
      [
        {
            "featureType": "administrative.locality",
            "elementType": "all",
            "stylers": [
                {
                    "hue": "#2c2e33"
                },
                {
                    "saturation": 7
                },
                {
                    "lightness": 19
                },
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "administrative.locality",
            "elementType": "labels.text",
            "stylers": [
                {
                    "visibility": "on"
                },
                {
                    "saturation": "-3"
                }
            ]
        },
        {
            "featureType": "administrative.locality",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#fd901b"
                }
            ]
        },
        {
            "featureType": "landscape",
            "elementType": "all",
            "stylers": [
                {
                    "hue": "#ffffff"
                },
                {
                    "saturation": -100
                },
                {
                    "lightness": 100
                },
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "all",
            "stylers": [
                {
                    "hue": "#ffffff"
                },
                {
                    "saturation": -100
                },
                {
                    "lightness": 100
                },
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "poi.school",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#f39247"
                },
                {
                    "saturation": "0"
                },
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [
                {
                    "hue": "#ff6f00"
                },
                {
                    "saturation": "100"
                },
                {
                    "lightness": 31
                },
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#f39247"
                },
                {
                    "saturation": "0"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "labels",
            "stylers": [
                {
                    "hue": "#008eff"
                },
                {
                    "saturation": -93
                },
                {
                    "lightness": 31
                },
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#fd901b"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "visibility": "on"
                },
                {
                    "color": "#f3dbc8"
                },
                {
                    "saturation": "0"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "labels",
            "stylers": [
                {
                    "hue": "#bbc0c4"
                },
                {
                    "saturation": -93
                },
                {
                    "lightness": -2
                },
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "labels.text",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "geometry",
            "stylers": [
                {
                    "hue": "#e9ebed"
                },
                {
                    "saturation": -90
                },
                {
                    "lightness": -8
                },
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "transit",
            "elementType": "all",
            "stylers": [
                {
                    "hue": "#e9ebed"
                },
                {
                    "saturation": 10
                },
                {
                    "lightness": 69
                },
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "all",
            "stylers": [
                {
                    "hue": "#e9ebed"
                },
                {
                    "saturation": -78
                },
                {
                    "lightness": 67
                },
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#e9e9e9"
                }
            ]
        }
      ] /* final del estilo */;

            map.addStyle({
                styledMapName:"Styled Map",
                styles: styles,
                mapTypeId: "map_style"
            });
            map.setStyle("map_style");

            /*estilo*/


        }
    });
}
$(document).ready(function(){
  cargardireccion(1);
});
}
function cargarMapa(id){
  var mapa;
  /* var route = site_url+'cargar-mapa/'+id; */
  var route = 'http://localhost:8020/elmayorista/public/cargar-mapa/'+id;
  $.ajax({
    url: route,
    data : {},
    type : 'GET',
    dataType: 'json',
    success : function(response){
      // console.log(response.local.latitud);
      mapa = new GMaps({
        div: '#mapa',
        zoom: 17,
        zoomControl : false,
        panControl : false,
        overviewMapControl: false,
        streetViewControl : false,
        mapTypeControl: false,
        lat:response.local.latitud,
        lng:response.local.longitud
      });

      mapa.addMarker({
        lat:response.local.latitud,
        lng:response.local.longitud,
        title:response.local.nombre,
        icon: 'images/pin.png',
        infoWindow: {
          content: response.local.iframe
        }
      });

      var styles =
      [
        {
            "featureType": "administrative.locality",
            "elementType": "all",
            "stylers": [
                {
                    "hue": "#2c2e33"
                },
                {
                    "saturation": 7
                },
                {
                    "lightness": 19
                },
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "administrative.locality",
            "elementType": "labels.text",
            "stylers": [
                {
                    "visibility": "on"
                },
                {
                    "saturation": "-3"
                }
            ]
        },
        {
            "featureType": "administrative.locality",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#fd901b"
                }
            ]
        },
        {
            "featureType": "landscape",
            "elementType": "all",
            "stylers": [
                {
                    "hue": "#ffffff"
                },
                {
                    "saturation": -100
                },
                {
                    "lightness": 100
                },
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "all",
            "stylers": [
                {
                    "hue": "#ffffff"
                },
                {
                    "saturation": -100
                },
                {
                    "lightness": 100
                },
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "poi.school",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#f39247"
                },
                {
                    "saturation": "0"
                },
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [
                {
                    "hue": "#ff6f00"
                },
                {
                    "saturation": "100"
                },
                {
                    "lightness": 31
                },
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#f39247"
                },
                {
                    "saturation": "0"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "labels",
            "stylers": [
                {
                    "hue": "#008eff"
                },
                {
                    "saturation": -93
                },
                {
                    "lightness": 31
                },
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#fd901b"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "visibility": "on"
                },
                {
                    "color": "#f3dbc8"
                },
                {
                    "saturation": "0"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "labels",
            "stylers": [
                {
                    "hue": "#bbc0c4"
                },
                {
                    "saturation": -93
                },
                {
                    "lightness": -2
                },
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "labels.text",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "geometry",
            "stylers": [
                {
                    "hue": "#e9ebed"
                },
                {
                    "saturation": -90
                },
                {
                    "lightness": -8
                },
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "transit",
            "elementType": "all",
            "stylers": [
                {
                    "hue": "#e9ebed"
                },
                {
                    "saturation": 10
                },
                {
                    "lightness": 69
                },
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "all",
            "stylers": [
                {
                    "hue": "#e9ebed"
                },
                {
                    "saturation": -78
                },
                {
                    "lightness": 67
                },
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#e9e9e9"
                }
            ]
        }
      ] /* final del estilo */;

            mapa.addStyle({
                styledMapName:"Styled Map",
                styles: styles,
                mapTypeId: "map_style"
            });
            mapa.setStyle("map_style");

            /*estilo*/


        }
    });
}


if ($(window).width() < 768) {

 $("#btn-left").click(function(){
     $(".maps__content").addClass('mostrarcadro');
     $(".maps__content").removeClass('ocultarcadro');
 });

 $(".item__content").click(function(){

   $(".maps__content").removeClass('mostrarcadro');

   $(".maps__content").addClass('ocultarcadro');

 });

}

if ($(window).width() > 770) {

}

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
        // alert('Enviado con éxito');
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

$(document).ready( function() {
  $("#seleccione_local_").css('display', 'block');
  $("#seleccione_promo_").css('display', 'none');
});

$('body').on('click', '#seleccione_local_', function() {
  event.preventDefault();

  var local = $("#local_input").val();
  // $("#local_input").val(local);
  // var route = site_url+'cargar-local-birthday/'+local;
  var route = site_url+'cargar-promo';
  $.ajax({
   url: route,
   data : {local:local},
   type : 'GET',
   dataType: 'json',
   success : function(response){

         $("#seleccione_promo_").html(response);
         $("#seleccione_local_").css('display', 'none');
         $("#seleccione_promo_").css('display', 'block');
         $("#seleccione_promo").addClass('active');
         $(".numero1").css('display', 'none');
         $(".check1").css('display', 'block');
         $("#selecciona--local").css('display', 'none');

         $(".wizard__listado__item--pintado--1").css('display', 'block');

   }
 });
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



});

$('body').on('click', '.previous_promo', function() {
  event.preventDefault();
  $("#seleccione_local_").css('display', 'block');
  $("#seleccione_promo_").css('display', 'none');
  $("#seleccione_promo").removeClass('active');
  $(".numero1").css('display', 'block');
  $(".check1").css('display', 'none');
  $("#selecciona--local").css('display', 'block');
  $("#local--seleccionado").css('display', 'none');

  $(".wizard__listado__item--pintado--1").css('display', 'none');

});
