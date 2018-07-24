@extends('layouts.backend.admin')

@section('meta-title', ' | Editar publicación')

@section('header')
<h1>
  Publicaciones
  <small>editar publicación</small>
</h1>
<ol class="breadcrumb">
  <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li><a href="{{ url('/admin/posts') }}">Publicaciones</a></li>
  <li class="active">Editar publicación</li>
</ol>
@endsection

@section('content')

@if($post->images->count())
<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">Imágenes del artículo</h3>
  </div>
  <div class="box-body">
  @foreach($post->images as $image)
    <form method="POST" action="{{ route('admin.images.destroy', $image) }}">
      {{ method_field('DELETE') }}
      {{ csrf_field() }}
      <div class="col-md-2">
      <button class="btn btn-danger btn-xs" style="position: absolute;">
        <i class="fa fa-remove"></i>
      </button>
      <img class="img-responsive" src="/storage/{{ $image->url }}">
    </div>
    </form>
    @endforeach
  </div>
</div>
@endif
  
<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">Formulario de edición</h3>

    <div class="box-tools pull-right">
      <a href="{{ url('/admin/posts') }}" class="btn btn-primary">
        &laquo; Regresar</a>
    </div>
  </div>
  <div class="box-body">
    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
      {{ method_field('PUT') }}
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-8">
          <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            <label>Título de la publicación</label>
            <input type="text" name="title" class="form-control" placeholder="Ingrese el título de la publicación" value="{{ old('title', $post->title) }}">
            {!! $errors->first('title', '<span class="help-block"><i class="fa fa-exclamation-circle"></i> :message</span>') !!}
          </div>
          <div class="form-group {{ $errors->has('subtitle') ? 'has-error' : '' }}">
            <label>Subtítulo de la publicación</label>
            <input type="text" name="subtitle" class="form-control" placeholder="Ingrese el subtítulo de la publicación" value="{{ old('subtitle', $post->subtitle) }}">
            {!! $errors->first('subtitle', '<span class="help-block"><i class="fa fa-exclamation-circle"></i> :message</span>') !!}
          </div>
          <div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
            <label>Extracto de la publicación</label>
            <textarea name="excerpt" class="form-control" placeholder="Ingrese el extracto de la publicación">{{ old('excerpt', $post->excerpt) }}</textarea>
            {!! $errors->first('excerpt', '<span class="help-block"><i class="fa fa-exclamation-circle"></i> :message</span>') !!}
          </div>
        </div>
      <div class="col-md-4">
        <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
          <label>Categoría</label>
          <select name="category" class="form-control select2">
            <option value="">Selecciona una categoría</option>
            @foreach($categories as $category)
              <option value="{{ $category->id }}" {{ old('category', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
          </select>
          {!! $errors->first('category', '<span class="help-block"><i class="fa fa-exclamation-circle"></i> :message</span>') !!}
        </div>
        <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
          <label>Etiquetas</label>
          <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Seleccione una etiqueta"
                  style="width: 100%;">
            @foreach($tags as $tag)
              <option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
          </select>
          {!! $errors->first('tags', '<span class="help-block"><i class="fa fa-exclamation-circle"></i> :message</span>') !!}
        </div>
        <div class="form-group {{ $errors->has('header_image') ? 'has-error' : '' }}">
          <label>Subir imagen de cabecera:</label>
          <input type="file" name="header_image">
          {!! $errors->first('header_image', '<span class="help-block"><i class="fa fa-exclamation-circle"></i> :message</span>') !!}
        </div>
        <div class="form-group">
          <label>Fecha de publicación:</label>

          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" name="published_at" class="form-control pull-right" id="datepicker" value="{{ old('published_at', $post->published_at) }}">
          </div>
          <!-- /.input group -->
        </div>
      </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
            <label>Contenido de la publicación:</label>
            <textarea id="editor" name="body" rows="10" cols="80">{{ old('body', $post->body ) }}</textarea>
            {!! $errors->first('body', '<span class="help-block"><i class="fa fa-exclamation-circle"></i> :message</span>') !!}
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Subir imágenes</label>
            <div class="dropzone"></div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-12">
          <button type="submit" class="btn btn-success pull-right">Guardar publicación &nbsp;<i class="fa fa-save"></i></button>
        </div>
      </div>
    </form>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    Footer
  </div>
  <!-- /.box-footer-->
</div>
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.css">
@endpush

@push('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.js"></script>
<script>

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    $('.select2').select2({
      tags: true
    });

    CKEDITOR.replace('editor');

    var myDropzone = new Dropzone('.dropzone', {
      url: '/admin/posts/{{ $post->url }}/images',
      acceptedFiles: 'image/*',
      paramName: 'image',
      maxFilesize: 2,
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      dictDefaultMessage: 'Arrastra tus imágenes aquí'
    });

    myDropzone.on('error', function(file, response){
      var msg = response.image[0];
      $('.dz-error-message:last > span').text(msg);
    });

    Dropzone.autoDiscover = false;

</script>
@endpush