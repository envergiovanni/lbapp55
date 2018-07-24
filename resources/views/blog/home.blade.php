@extends('layouts.frontend.app')

@section('meta-title', ' | Home')

@section('meta-description', config('blog.description'))

@section('header')
<header class="masthead" style="background-image: url('/blog/img/home-bg.jpeg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>{{ $title }}</h1>
          <span class="subheading">{{ $subtitle }}</span>
        </div>
      </div>
    </div>
  </div>
</header>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      @foreach($posts as $post)
      <div class="post-preview">
        <a href="{{ url('/entrada', $post->url) }}">
          <h2 class="post-title">
            {{ $post->title }}
          </h2>
        </a>
        <p>
          {{ $post->excerpt }}
        </p>
        <p class="post-meta">Publicado por
          {{ $post->user->name }}
          el {{ $post->published_at->toFormattedDateString()}}
          en <a href="{{ url('/categoria', $post->category->url) }}">{{ $post->category->name }}</a>
        </p>
      </div>
      <hr>
      @endforeach


      <div class="clearfix">
        {{ $posts->links('vendor.pagination.simple-bootstrap-4') }}
      </div>

    </div>
  </div>
</div>
@endsection