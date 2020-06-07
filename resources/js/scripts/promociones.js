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
