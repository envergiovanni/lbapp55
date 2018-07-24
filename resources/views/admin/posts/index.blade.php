@extends('layouts.backend.admin')

@section('meta-title', ' | Lista de publicaciones')

@section('header')
<h1>
  Publicaciones <small>lista de publicaciones</small>
</h1>
<ol class="breadcrumb">
  <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li class="active">Publicaciones</li>
</ol>
@endsection

@section('content')
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Listado de publicaciones</h3>

      <div class="box-tools pull-right">
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
          <i class="fa fa-plus-circle"></i> Crear publicación</a>
      </div>
    </div>
    <div class="box-body">
       <table id="posts-table" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Título</th>
          <th>Extracto</th>
          <th>Acciones</th>
        </tr>
        </thead>
        <tbody>       
        @foreach($posts as $post)
        <tr>
          <td>{{ $post->id }}</td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->excerpt }}</td>
          <td>
          	<a href="{{ route('admin.posts.show', $post->url) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
          	<a href="{{ route('admin.posts.edit', $post->url) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
          </td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
          <th>Rendering engine</th>
          <th>Browser</th>
          <th>Platform(s)</th>
          <th>Engine version</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      Footer
    </div>
    <!-- /.box-footer-->
  </div>
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.css"/>
@endpush

@push('scripts')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script>
<script>
  $(function () {
    $('#posts-table').DataTable()
  });
</script>
@endpush