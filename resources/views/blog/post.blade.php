@extends('layouts.frontend.app')

@section('meta-title', $post->title)

@section('meta-description', $post->excerpt)

@section('header')

<header class="masthead"
  @if($post->header_image)
    style="background-image: url({{ $post->header_image }})"
  @else
    style="background-image: url('/blog/img/post-bg.jpeg')"
  @endif
>
  <div class="overlay"></div>
	  <div class="container">
	    <div class="row">
	      <div class="col-lg-8 col-md-10 mx-auto">
	        <div class="post-heading">
	          <h1>{{ $post->title }}</h1>
	          <h2 class="subheading">{{ $post->subtitle }}</h2>
	          <span class="meta">Publicado por
	            <a href="#">{{ $post->user->name }}</a>
	            el {{ $post->published_at->toFormattedDateString()}}
              en <a href="{{ url('/categoria', $post->category->url ) }}">{{ $post->category->name }}</a>
            </span>
	        </div>
	      </div>
	  </div>
  </div>
</header>
@endsection

@section('content')
<article>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

        <span class="float-right">
          @if ($post->tags->count())
            Etiquetas : &nbsp;
            @foreach($post->tags as $tag)
              <a href="{{ url('/etiqueta', $tag->url) }}">#{{ $tag->name }}</a>
            @endforeach
          @endif
        </span><br>
        <hr>

      	<blockquote class="blockquote">{{ $post->excerpt }}</blockquote>

      	<h2 class="section-heading">{{ $post->title }}</h2>

        {!! $post->body !!}

        {{-- <a href="#">
          <img class="img-fluid" src="/blog/img/post-sample-image.jpg" alt="">
        </a> --}}
        @if($post->images->count() === 1)
            <img class="img-fluid" src="/storage/{{ $post->images->first()->url }}" alt="">
        @elseif($post->images->count() > 1)
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              @foreach($post->images as $image)
                <div class="carousel-item {{ $loop->first ? 'active' : ''}}">
                  <img class="d-block w-100" src="{{ url($image->url) }}" alt="..."> 
                </div>
              @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        @else
          <img class="img-fluid" src="/blog/img/post-sample-image.jpg" alt="">
        @endif

        <span class="caption text-muted">To go places and do things that have never been done before – that’s what living is all about.</span>

        <hr>
        @include('blog.partials.disqus')
      </div>
    </div>
  </div>
</article>
@endsection