

<footer>
                <div class="footer wow fadeIn" data-wow-delay="0.3s">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-contact">
                                <h2>Oficina de Contacto</h2>
                                <p><i class="fa fa-map-marker-alt"></i>Jr.Cotabambas 345 -Cercado de Lima</p>
                                <p><i class="fa fa-phone-alt"></i>+51 989 218 856</p>
                                <p><i class="fa fa-phone-alt"></i>+51 997 287 614</p>
                                <p><i class="fa fa-envelope"></i>jnahuin@pucp.pe</p>
                                <div class="footer-social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-link">
                                <h2>Especialidades</h2>
                                @foreach($specialties as $specialty)
                                <a href="{{ route('specialty.show', $specialty->slug) }}" >{{$specialty->name}}</a>
                                @endforeach

                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-link">
                                <h2>Accesos Directos</h2>
                                <a href="{{ url('/') }}/us">Nosotros</a>
                                <a href="{{ url('/') }}/contacto">Contáctanos</a>
                                <a href="{{ url('/') }}/blog">Blog</a>
                               <a href="{{ url('/') }}/servicios">Servicios</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-link">
                                <h2>Contáctate</h2>
                                
                                    <a href="tel:+51989218856">Comunícate aqui</a>
                                

                            </div>
                        </div>
                    </div>
                </div>
                <div class="container footer-menu">
                    <div class="f-menu">
                        <a href="{{ url('/') }}/politicas">Política de privacidad</a>
                        <a href="{{ url('/') }}/cookies">Cookies</a>                     
                        <a href="{{ url('/') }}/faqs">FQAs</a>
                    </div>
                </div>
                <div class="container copyright">
                    <div class="row">
                        <div class="col-md-6">
                            <p>&copy; <a href="#">JNP Abogados</a>, Todos los derechos reservados.</p>
                        </div>
                        <div class="col-md-6">
                            <p>Diseñado por <a href="https://raumiweb.com">Raumi</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->

            <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
</footer>
