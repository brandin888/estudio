

            <!-- Blog Start -->
            <div class="blog">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Últimos Artículos</p>
                        <h2>Visita Nuestro Blog</h2>
                    </div>
                    <div class="row">
                        @foreach($posts as $post)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="blog-item">
                                <div class="blog-img">
                                    <img src="{{ postImage($post->image) }}" alt="Image">
                                </div>
                                <div class="blog-title">
                                    <h3>{{$post->title}}</h3>
                                    <a class="btn" href="">+</a>
                                </div>
                                <div class="blog-meta">
                                    <p><a href=""> {{$post->updated_at}}</a></p>
                                    <p>In<a href="">Construction</a></p>
                                </div>
                                <div class="blog-text">
                                    <p>
                                        {{$post->excerpt}}
                                    </p>
                                </div>
                            </div>
                        </div>                    
    
 
  
                            

                               
                          
                          
                               

          
                        @endforeach      

                    </div>
                </div>
            </div>
            <!-- Blog End -->