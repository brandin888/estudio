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
