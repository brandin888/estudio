@extends('layout')

@section('title', $post->title)

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">

@endsection

@section('content')



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
                        
                        <div class="latestdesc">{{ $post->excerpt }}</div>
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
