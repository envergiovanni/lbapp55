@extends('layouts.frontend.app')

@section('meta-title', ' | Sobre nosotros')

@section('meta-description', config('blog.about_sh'))

@section('header')
<header class="masthead" style="background-image: url('/blog/img/about-bg.jpeg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="page-heading">
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
      <h1>{{ config('blog.name') }}</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur?</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consequuntur magnam, excepturi aliquid ex itaque esse est vero natus quae optio aperiam soluta voluptatibus corporis atque iste neque sit tempora!</p>
    </div>
  </div>
</div>
@endsection



