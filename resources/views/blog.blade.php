<style type="text/css">

</style>



@extends('layout')

@section('title', 'Products')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@endsection

@section('content')
            <!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Artículos y Noticias</h2>
                        </div>
                        <div class="col-12">
                            <a href="">Inicio</a>
                            <a href="">Nuestro Blog</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->


            <!-- Blog Start -->
            <div class="blog">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Latest Blog</p>
                        <h2>Latest From Our Blog</h2>
                    </div>
                    <div class="row blog-page">
                        @forelse ($posts as $post)
                             <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="blog-item">
                                <div class="blog-img">
                                    <img src="{{ postImage($post->image) }}" alt="Image">
                                </div>
                                <div class="blog-title">
                                    <h3>{{ $post->title }}</h3>
                                    <a class="btn" href="{{ route('blog.show', $post->slug) }}">+</a>
                                </div>
                                <div class="blog-meta">
                                    <p>By<a href="">{{ $post->updated_at }}</a></p>
                                    <p>In<a href="">Construction</a></p>
                                </div>
                                <div class="blog-text">
                                    <p>
                                        {{ $post->excerpt }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @empty
                    <div style="">No se encontraron artículos</div>
                        @endforelse
                       
                    </div>
                    <div class="spacer"></div>
                     {{ $posts->links() }}
                    
                </div>
            </div>
            <!-- Blog End -->
    


@endsection

@section('extra-js')

    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js?v=1.2') }}"></script>


@endsection