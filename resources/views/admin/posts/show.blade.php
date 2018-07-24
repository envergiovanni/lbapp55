@extends('layouts.backend.admin')

@section('meta-title', ' | Ver publicación')

@section('header')
<h1>
  Publicación
</h1>
<ol class="breadcrumb">
  <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li><a href="{{ url('/admin/posts') }}">Publicaciones</a></li>
  <li class="active">Ver publicación</li>
</ol>
@endsection

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">{{ $post->title }} &raquo; <small>{{ $post->subtitle }}</small></h3>
      </div>
      <div class="box-body">
         <dl>
          <dt>Publicado el:</dt>
          <dd>{{ $post->published_at->format('l jS \\of F Y h:i:s A') }}</dd>
          <dt>Por:</dt>
          <dd>{{ $post->user->name }}</dd>
          <dt>Título:</dt>
          <dd>{{ $post->title }}</dd>
          <dt>Subtítulo:</dt>
          <dd>{{ $post->subtitle }}</dd>
          <dt>Extracto:</dt>
          <dd>{{ $post->excerpt }}</dd>
          <dt>Contenido:</dt>
          <dd>{!! $post->body !!}</dd>
          <dt>Categoría:</dt>
          <dd>{!! $post->category->name !!}</dd>
          <dt>Etiquetas:</dt>
          <dd>
            @foreach($post->tags as $tag)
              {!! $tag->name !!} || &nbsp;
            @endforeach
          </dd><br>
          <dt>Imagen de cabecera</dt>
          <dd>
              @if($post->header_image)
                <img src="{{ $post->header_image }}" class="img-thumbnail">
              @else
                <img src="/blog/img/post-bg.jpeg" class="img-thumbnail">
              @endif
          </dd>
        </dl>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        
      </div>
      <!-- /.box-footer-->
    </div>
  </div>
  <div class="col-md-4">
    <div class="box box-warning">
      <div class="box-header with-border">
        <div class="pull-right">
          <a href="{{ url('/admin/posts') }}" class="btn btn-primary">
            &laquo; Regresar</a>
        </div>
      </div>
      <div class="box-body">
        <label>Imágenes de contenido</label>
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
          <div class="alert alert-warning">No tienes imágenes asociadas a esta entrada. Puedes agregarlas haciendo click en el botón de editar</div>
        @endif
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-success btn-block"><i class="fa fa-edit"></i> &nbsp;Editar publicación</a>
        <button type="button" class="btn btn-danger btn-delete btn-block" data-toggle="modal" data-target="#modal-delete"><i class="fa fa-trash"></i> Eliminar publicación</button>
      </div>
      <!-- /.box-footer-->
    </div>
  </div>
</div>

<div class="modal modal-danger fade" id="modal-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Eliminar publicación</h4>
            </div>
            <div class="modal-body">
                <p>¿ Está seguro de eliminar la publicación ?</p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="/admin/posts/{{ $post->url }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-outline">Confirmar</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection