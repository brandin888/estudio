<!doctype html>

<style type="text/css">
  

</style>


<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#343a40" />
        <title>JÑP | Abogados</title>
        <meta name="description" content="Firma peruana que brinda asesoría y consultoría en asuntos legales en el Perú y en el extranjero.">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Viaoda+Libre&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('img/favi.png') }}" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{ asset('css/all.css?v=1.1') }}" rel="stylesheet"> <!--load all styles -->
        <link href="{{ asset('css/animate.css?v=1.1') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="{{ asset('css/owl.carousel.min.css?v=1.2') }}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css?v=1.6') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css?v=1.4') }}">
        <link rel="stylesheet" href="{{ asset('css/algolia.css?v=1.1') }}">

        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

      <!-- Facebook Pixel Code -->
     
      <!-- End Facebook Pixel Code -->
        


    </head>
    <body style="background-color: white">

        <!-- Load Whatsapp -->
          


        <div>
          <a class="appWhatsapp" target="_blanck" href="https://api.whatsapp.com/send?phone=51997287614&Hola&&nbsp;solicito&nbsp;información&nbsp;de&nbsp;sus&nbsp;servicios&nbsp;legales">
            <img src="{{ asset('img/whatsapp.png') }}" alt="whatsapp">
          </a> 
        </div>
        <!-- end Whatsapp -->
        
 



      <!-- Messenger plugin de chat Code -->
    <div id="fb-root"></div>

    <!-- Your plugin de chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "102888812057143");
      chatbox.setAttribute("attribution", "biz_inbox");

      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v11.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

        <div >

            <header >
              



            </header>





 <!-------------------------------------------------------- Top Bar Start -->
        <div class="wrapper">
            <!-- Top Bar Start -->
@include('partials.nav')
            <!-- Nav Bar End -->


            <!-- Carousel Start -->
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/car1.jpeg') }}" alt="Carousel Image">

                        <div class="carousel-caption">
                            <div class="row">
                                <div class="col-lg-4"><a target="_blanck" href="https://api.whatsapp.com/send?phone=51989218856&Hola&&nbsp;solicito&nbsp;información&nbsp;de&nbsp;sus&nbsp;servicios&nbsp;legales"><img class="whatsapp" style="object-fit: contain;" src="{{ asset('img/whatsapp.png') }}"></a></div>

                                <div class="col-lg-6">                            
                                    <p class="animated fadeInRight">Somos Profesionales</p>
                                    <h1 class="animated fadeInLeft">Trabajamos en ti</h1>
                                    <a class="btn animated fadeInUp" href="https://api.whatsapp.com/send?phone=51989218856&Hola&&nbsp;solicito&nbsp;información&nbsp;de&nbsp;sus&nbsp;servicios&nbsp;legales">Contáctate</a></div>
                            </div>

                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="{{ asset('img/car2.jpeg') }}" alt="Carousel Image">
                        <div class="carousel-caption">
                            <div class="row">
                                 <div class="col-lg-4"><a target="_blanck" href="https://api.whatsapp.com/send?phone=51989218856&Hola&&nbsp;solicito&nbsp;información&nbsp;de&nbsp;sus&nbsp;servicios&nbsp;legales"><img class="whatsapp" style="object-fit: contain;" src="{{ asset('img/whatsapp.png') }}"></a></div>

                                <div class="col-lg-6">


                            <p class="animated fadeInRight">Ayuda y Soporte Legal</p>
                            <h1 class="animated fadeInLeft">Protegemos tus intereses</h1>
                            <a class="btn animated fadeInUp" href="https://api.whatsapp.com/send?phone=51989218856&Hola&&nbsp;solicito&nbsp;información&nbsp;de&nbsp;sus&nbsp;servicios&nbsp;legales">Contáctate</a>
                                </div>

                            </div>

                        </div>
                    </div>

                   
                </div>

                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!-- Carousel End -->


            <!-- Feature Start-->
            <div class="feature2 wow fadeInUp" data-wow-delay="0.1s">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        @foreach($homes as $home)
                                 
                        
                        <div class="col-lg-4 col-md-12">
                            <div class="feature-item2">
                            
                                <div class="feature-text2">
                                    <h3>{{$home->feature12}}</h3>
                                    <p>{{$home->feature11}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="feature-item2">
                              
                                <div class="feature-text2">
                                    <h3>{{$home->feature21}}</h3>
                                    <p>{{$home->feature22}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="feature-item2">
                               
                                <div class="feature-text2">
                                    <h3>{{$home->feature31}}</h3>
                                    <p>{{$home->feature32}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Feature End-->


            <!-- About Start -->
            <div class="about wow fadeInUp" data-wow-delay="0.1s">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-6">
                            <div class="about-img">
                                <img src="{{ asset('img/about2.jpg') }}" alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            @foreach($homes as $home)
                            <div class="section-header text-left">
                                <p>{{$home->description1}}</p>
                                <h2>{{$home->description2}}</h2>
                            </div>
                            <div class="about-text">
                                <p>
                                    {{$home->description3}} </p>

                                <a class="btn" href="">Nosotros</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- About End -->




            <!-- Service Start -->
            <div class="service">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Especialidades</p>
                        <h2>Proveemos ayuda legal</h2>
                    </div>
                    <div class="row">
                            @foreach($specialties as $specialty)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item">
                                <div class="service-img">
                                    <img src="{{ postImage($specialty->image) }}" alt="Image">
                                    <div class="service-overlay">
                                        <p>
                                            {{$specialty->meta_description}}
                                        </p>
                                    </div>
                                </div>
                                <div class="service-text">
                                    <h3>{{$specialty->name}}</h3>
                                    <a class="btn" href="{{ route('specialty.show', $specialty->slug) }}" data-lightbox="service">+</a>
                                </div>
                            </div>
                        </div>                                        
                            @endforeach
                        

                    </div>
                </div>
            </div>
            <!-- Service End -->


            <!-- Video Start -->
            <div class="video wow fadeIn" data-wow-delay="0.1s">
                <div class="container">
                    @foreach($homes as $home)
                            
                                
                        <button type="button" class="btn-play" data-toggle="modal" data-src="{{$home->video}}" data-target="#videoModal">
                        <span></span>
                    </button>
                              
                    @endforeach

                </div>
            </div>
            
            <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>        
                            <!-- 16:9 aspect ratio -->
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Video End -->


            <!-- Team Start -->
            <div class="team">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Nuestro Equipo</p>
                        <h2>Conoce a nuestros profesionales</h2>
                    </div>
                    <div class="row">
                        @foreach($coworkers as $coworker)
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="team-item">
                                <div class="team-img">
                                    <img src="{{ postImage($coworker->image) }}" alt="Team Image">
                                </div>
                                <div class="team-text">
                                    <h2>{{$coworker->name}}</h2>
                                    <p>{{$coworker->rol}}</p>
                                </div>
                                <div class="team-social">
                                    <a class="social-tw" href="{{$coworker->twitter}}"><i class="fab fa-twitter"></i></a>
                                    <a class="social-fb" href="{{$coworker->facebook}}"><i class="fab fa-facebook-f"></i></a>
                                    <a class="social-li" href="{{$coworker->linkedin}}"><i class="fab fa-linkedin-in"></i></a>
                                    <a class="social-in" href="{{$coworker->instagram}}"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>               
                        @endforeach
                       
                        
                    </div>
                </div>
            </div>
            <!-- Team End -->
            

            <!-- FAQs Start -->
            @include('partials.faq')
            <!-- FAQs End -->


            <!-- Testimonial Start -->
            <div class="testimonial wow fadeIn" data-wow-delay="0.1s">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="testimonial-slider-nav">
                                @foreach($testimonials as $testimonial)
                                 <div class="slider-nav"><img src="{{ postImage($testimonial->image) }}" alt="Testimonial"></div>
                                @endforeach
                              
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="testimonial-slider">
                                @foreach($testimonials as $testimonial)
                                <div class="slider-item">
                                    <h3>{{$testimonial->name}}</h3>
                                    <h4>{{$testimonial->profesion}}</h4>
                                    <p>{{$testimonial->description}}</p>
                                </div>
                                @endforeach
                               


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimonial End -->



@include('partials.latest')

<div style="width: 100%; height: 400px"><iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=400&amp;hl=en&amp;q=Jir%C3%B3n%20Cotabambas%20355,%20Cercado%20de%20Lima+()&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>

@include('partials.footer')
        </div>



        <script src="js/app.js"></script>
        <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js?v=1.2') }}"></script>


    </body>
</html>




<script type="text/javascript">
  
  $('.carousel').carousel();

</script>
<script type="text/javascript">
  $('.carousel2').carousel({
  interval: 10
})
</script>

<script src="{{ asset('js/owl.carousel.min.js?v=1.2') }}"></script>
<script type="text/javascript">


(function ($) {
    "use strict";
    
    // Initiate the wowjs
    new WOW().init();
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });
    
    
    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 90) {
            $('.nav-bar').addClass('nav-sticky');
            $('.carousel, .page-header').css("margin-top", "73px");
        } else {
            $('.nav-bar').removeClass('nav-sticky');
            $('.carousel, .page-header').css("margin-top", "0");
        }
    });
    
    
    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });
    
    
    // jQuery counterUp
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });
    
    
    // Modal Video
    $(document).ready(function () {
        var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })
    });


    // Testimonial Slider
    $('.testimonial-slider').slick({
        infinite: true,
        autoplay: true,
        arrows: false,
        dots: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.testimonial-slider-nav'
    });
    $('.testimonial-slider-nav').slick({
        arrows: false,
        dots: false,
        focusOnSelect: true,
        centerMode: true,
        centerPadding: '22px',
        slidesToShow: 3,
        asNavFor: '.testimonial-slider'
    });
    $('.testimonial .slider-nav').css({"position": "relative", "height": "160px"});
    
    
    // Blogs carousel
    $(".related-slider").owlCarousel({
        autoplay: true,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            }
        }
    });
    
    
    // Portfolio isotope and filter
    var portfolioIsotope = $('.portfolio-container').isotope({
        itemSelector: '.portfolio-item',
        layoutMode: 'fitRows'
    });

    $('#portfolio-flters li').on('click', function () {
        $("#portfolio-flters li").removeClass('filter-active');
        $(this).addClass('filter-active');

        portfolioIsotope.isotope({filter: $(this).data('filter')});
    });
    
})(jQuery);


</script>
    </body>
</html>
