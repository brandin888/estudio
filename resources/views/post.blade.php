@extends('layout')

@section('title', $post->title)

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">

@endsection

@section('content')


            <!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>{{ $post->title }}</h2>
                        </div>
                        <div class="col-12">
                            <a href="">Inicio</a>
                            <a href="">Artículos</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->

            <!-- Single Post Start-->
            <div class="single">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="single-content wow fadeInUp">
                                <img src="{{ postImage($post->image) }}" />
                                <h2>{{ $post->title }}</h2>
                                {!! $post->body !!}
                            </div>
                            <div class="single-tags wow fadeInUp">
                                <a href="">National</a>
                                <a href="">International</a>
                                <a href="">Economics</a>
                                <a href="">Politics</a>
                                <a href="">Lifestyle</a>
                                <a href="">Technology</a>
                                <a href="">Trades</a>
                            </div>
                            <div class="single-bio wow fadeInUp">
                                <div class="single-bio-img">
                                    <img src="img/user.jpg" />
                                </div>
                                <div class="single-bio-text">
                                    <h3>Author Name</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis sapien, non eros leo in nunc. Donec a nulla vel turpis tempor ac vel justo. In hac platea dictumst.
                                    </p>
                                </div>
                            </div>
                            <div class="single-related wow fadeInUp">
                                <h2>Related Post</h2>
                                <div class="owl-carousel related-slider">
                                    <div class="post-item">
                                        <div class="post-img">
                                            <img src="img/post-1.jpg" />
                                        </div>
                                        <div class="post-text">
                                            <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            <div class="post-meta">
                                                <p>By<a href="">Admin</a></p>
                                                <p>In<a href="">Design</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-item">
                                        <div class="post-img">
                                            <img src="img/post-2.jpg" />
                                        </div>
                                        <div class="post-text">
                                            <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            <div class="post-meta">
                                                <p>By<a href="">Admin</a></p>
                                                <p>In<a href="">Design</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-item">
                                        <div class="post-img">
                                            <img src="img/post-3.jpg" />
                                        </div>
                                        <div class="post-text">
                                            <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            <div class="post-meta">
                                                <p>By<a href="">Admin</a></p>
                                                <p>In<a href="">Design</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-item">
                                        <div class="post-img">
                                            <img src="img/post-4.jpg" />
                                        </div>
                                        <div class="post-text">
                                            <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            <div class="post-meta">
                                                <p>By<a href="">Admin</a></p>
                                                <p>In<a href="">Design</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-comment wow fadeInUp">
                                <h2>3 Comments</h2>
                                <ul class="comment-list">
                                    <li class="comment-item">
                                        <div class="comment-body">
                                            <div class="comment-img">
                                                <img src="img/user.jpg" />
                                            </div>
                                            <div class="comment-text">
                                                <h3><a href="">Josh Dunn</a></h3>
                                                <span>01 Jan 2045 at 12:00pm</span>
                                                <p>
                                                    Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis sapien, non eros leo in nunc. Donec a nulla vel turpis tempor ac vel justo. In hac platea dictumst. 
                                                </p>
                                                <a class="btn" href="">Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="comment-item">
                                        <div class="comment-body">
                                            <div class="comment-img">
                                                <img src="img/user.jpg" />
                                            </div>
                                            <div class="comment-text">
                                                <h3><a href="">Josh Dunn</a></h3>
                                                <p><span>01 Jan 2045 at 12:00pm</span></p>
                                                <p>
                                                    Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis sapien, non eros leo in nunc. Donec a nulla vel turpis tempor ac vel justo. In hac platea dictumst. 
                                                </p>
                                                <a class="btn" href="">Reply</a>
                                            </div>
                                        </div>
                                        <ul class="comment-child">
                                            <li class="comment-item">
                                                <div class="comment-body">
                                                    <div class="comment-img">
                                                        <img src="img/user.jpg" />
                                                    </div>
                                                    <div class="comment-text">
                                                        <h3><a href="">Josh Dunn</a></h3>
                                                        <p><span>01 Jan 2045 at 12:00pm</span></p>
                                                        <p>
                                                            Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis sapien, non eros leo in nunc. Donec a nulla vel turpis tempor ac vel justo. In hac platea dictumst. 
                                                        </p>
                                                        <a class="btn" href="">Reply</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="comment-form wow fadeInUp">
                                <h2>Leave a comment</h2>
                                <form>
                                    <div class="form-group">
                                        <label for="name">Name *</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input type="url" class="form-control" id="website">
                                    </div>

                                    <div class="form-group">
                                        <label for="message">Message *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Post Comment" class="btn">
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="sidebar">
                                <div class="sidebar-widget wow fadeInUp">
                                    <div class="search-widget">
                                        <form>
                                            <input class="form-control" type="text" placeholder="Search Keyword">
                                            <button class="btn"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>

                                <div class="sidebar-widget wow fadeInUp">
                                    <h2 class="widget-title">Últimos Artículos</h2>
                                    <div class="recent-post">
                                    @forelse ($posts as $post)
                                        <div class="post-item">
                                            <div class="post-img">
                                                <img src="{{ postImage($post->image) }}" />
                                            </div>
                                            <div class="post-text">
                                                <a href="">{{ $post->excerpt }}</a>
                                                <div class="post-meta">
                                                    <p><a href="">{{ $post->updated_at }}</a></p>
                                                    <p>In<a href="">Design</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    <div style="text-align: left">No se encontraron productos</div>
                                    @endforelse

                                    </div>
                                </div>

                                <div class="sidebar-widget wow fadeInUp">
                                    <div class="image-widget">
                                        <a href="#"><img src="img/blog-1.jpg" alt="Image"></a>
                                    </div>
                                </div>

                                <div class="sidebar-widget wow fadeInUp">
                                    <div class="tab-post">
                                        <ul class="nav nav-pills nav-justified">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="pill" href="#featured">Featured</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#popular">Popular</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#latest">Latest</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div id="featured" class="container tab-pane active">
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-1.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-2.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-3.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-4.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-5.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="popular" class="container tab-pane fade">
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-1.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-2.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-3.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-4.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-5.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="latest" class="container tab-pane fade">
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-1.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-2.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-3.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-4.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-item">
                                                    <div class="post-img">
                                                        <img src="img/post-5.jpg" />
                                                    </div>
                                                    <div class="post-text">
                                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                        <div class="post-meta">
                                                            <p>By<a href="">Admin</a></p>
                                                            <p>In<a href="">Design</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="sidebar-widget wow fadeInUp">
                                    <div class="image-widget">
                                        <a href="#"><img src="img/blog-2.jpg" alt="Image"></a>
                                    </div>
                                </div>

                                <div class="sidebar-widget wow fadeInUp">
                                    <h2 class="widget-title">Categories</h2>
                                    <div class="category-widget">
                                        <ul>
                                            <li><a href="">National</a><span>(98)</span></li>
                                            <li><a href="">International</a><span>(87)</span></li>
                                            <li><a href="">Economics</a><span>(76)</span></li>
                                            <li><a href="">Politics</a><span>(65)</span></li>
                                            <li><a href="">Lifestyle</a><span>(54)</span></li>
                                            <li><a href="">Technology</a><span>(43)</span></li>
                                            <li><a href="">Trades</a><span>(32)</span></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="sidebar-widget wow fadeInUp">
                                    <div class="image-widget">
                                        <a href="#"><img src="img/blog-3.jpg" alt="Image"></a>
                                    </div>
                                </div>

                                <div class="sidebar-widget wow fadeInUp">
                                    <h2 class="widget-title">Tags Cloud</h2>
                                    <div class="tag-widget">
                                        <a href="">National</a>
                                        <a href="">International</a>
                                        <a href="">Economics</a>
                                        <a href="">Politics</a>
                                        <a href="">Lifestyle</a>
                                        <a href="">Technology</a>
                                        <a href="">Trades</a>
                                    </div>
                                </div>

                                <div class="sidebar-widget wow fadeInUp">
                                    <h2 class="widget-title">Text Widget</h2>
                                    <div class="text-widget">
                                        <p>
                                            Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis sapien, non eros leo in nunc. Donec a nulla vel turpis tempor ac vel justo. In hac platea nec eros. Nunc eu enim non turpis id augue.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Post End-->   

    <div class="container" style="padding-bottom: 35px;">
        <!-- @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif -->
    </div>

    <div class="blogpage-section container" >
        
            <div class="postpage-posts">

                  <div class="postpage-image">

                        <img src="{{ postImage($post->image) }}" alt="product">
                        
                      
                  </div>
                    
                  <div class="postpage-post">

                        <div class="posttitle"><a href="{{ route('blog.show', $post->slug) }}"></a>
                        {{ $post->title }}</div>
                        <div class="postfecha">{!! $post->body !!}</div>
                        <div class="postdescripcion">{{ $post->excerpt }}</div>
                      
                  </div>
                   

            </div>

            <div class="blogpage-latest">
                @forelse ($posts as $post)
                    @if($post->featured > 0)
                  <div class="blogpage-image">

                        <img src="{{ postImage($post->image) }}" alt="product">
                        
                      
                  </div>
                    
                  <div class="blogpage-latests">

                        <div class="latesttitle"><a href="{{ route('blog.show', $post->slug) }}"></a>
                        {{ $post->title }}</div>
                        
                        <div class="latestdesc">{{ $post->excerpt }}    </div>
                        <div class="latestfecha">{{ $post->updated_at }}</div>
                  </div>
                    @endif
                @empty
                    <div style="text-align: left">No se encontraron productos</div>
                @endforelse
            </div> <!-- end products -->

            <div class="spacer"></div>

        
    </div>


@endsection

@section('extra-js')


    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>

@endsection
