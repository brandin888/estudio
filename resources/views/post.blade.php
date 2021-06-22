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
                                    <div class="tab-post">
                                        <ul class="nav nav-pills nav-justified">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="pill" href="#featured">Populares</a>
                                            </li>



                                        </ul>

                                        <div class="tab-content">
                                            <div id="featured" class="container tab-pane active">
                                            @forelse ($posts as $post)
                                                @if($post->featured)
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
                                                @endif
                                            @empty
                                                                              
                                    <div style="text-align: left">No se encontraron productos</div>
                                             @endforelse
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
                                            </div>


                                        </div>
                                    </div>
                                </div>





                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Post End-->   


 


@endsection

@section('extra-js')


    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>

@endsection
