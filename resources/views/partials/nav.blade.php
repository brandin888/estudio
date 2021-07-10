
<header >
  
               

</header>
            <!-- Top Bar Start -->
            <div class="top-bar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-12 center">
                            <div class="logo">
                              <div>
                                 <img src="{{ asset('img/favi.png') }}" alt="Logo">
                               <h1></h1>
                              </div>
                              <div ><h2 style="display: table-caption;line-height: initial;text-align: left;margin-bottom: 0px;padding-left: 5px;padding-top: 5px;">JÑP ABOGADOS</h2></div>
                              
                                <a href="{{ url('/') }}/">
                                    
                                   

                                </a>
                                
                                 
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7 d-none d-lg-block">
                            <div class="row">
                                <div class="col-4">
                                    <div class="top-bar-item">
                                        <div class="top-bar-icon">
                                            <i class="flaticon-calendar"></i>
                                        </div>
                                        <div class="top-bar-text">
                                            <h3>Horario de atención</h3>
                                            <p>Lun - Vie, 8:00 am - 6:00 pm</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="top-bar-item">
                                        <div class="top-bar-icon">
                                            <i class="flaticon-call"></i>
                                        </div>
                                        <div class="top-bar-text">
                                            <h3>Llámanos</h3>
                                            <p>+51 989 218 856</p>
                                            <p>+51 997 287 614</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="top-bar-item">
                                        <div class="top-bar-icon">
                                            <i class="flaticon-send-mail"></i>
                                        </div>
                                        <div class="top-bar-text">
                                            <h3>Correo</h3>
                                            <p>jnahuin@pucp.pe
</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->

            <!-- Nav Bar Start -->
            <div class="nav-bar">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                        <a href="{{ url('/') }}/" class="navbar-brand">MENU</a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto">
                                <a href="{{ url('/') }}/" class="nav-item nav-link active">Inicio</a>
                                <a href="{{ url('/') }}/us" class="nav-item nav-link">Nosotros</a>
                                <div class="nav-item dropdown">
                                    <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Servicios</a>
                                    <div class="dropdown-menu">
                                      
                                      
                                        @foreach($services as $service)
                                        <a href="{{ route('service.show',$service->slug ) }}" class="dropdown-item">{{ $service->name }}</a>
                                        @endforeach
                                        
                                    </div>
                                </div>
                                

                                <div class="nav-item dropdown">
                                    <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Artículos</a>
                                    <div class="dropdown-menu">
                                      <a href="{{ url('/') }}/blog" class="dropdown-item">Publicaciones</a>
                                      
                                        @foreach($categories as $category)
                                        <a href="{{ route('blog.index', ['category'=> $category->id]) }}" class="dropdown-item">{{ $category->name }}</a>
                                        @endforeach
                                        
                                    </div>
                                </div>
                                        
     

                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Especialidades</a>
                                    <div class="dropdown-menu">
                                        @foreach($specialties as $specialty)
                                        <a href="{{ route('specialty.show', $specialty->slug) }}" class="dropdown-item">{{$specialty->name}}</a>
                                        @endforeach
                                        
                                    </div>
                                </div>
                                <a href="{{ url('/') }}/contacto" class="nav-item nav-link">Contacto</a>
                            </div>
                            <div class="ml-auto">
                                <a class="btn" href="https://wa.link/fqi71q"><i class="fab fa-whatsapp"></i> Whatsapp</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- Nav Bar End -->

<script type="text/javascript">
  //Active Menu

</script>

