<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('meta-description')">
    <meta name="author" content="{{ config('blog.author') }}">

    <title>{{ config('blog.name') }} @yield('meta-title')</title>

    @include('feed::links')

    <!-- Bootstrap core CSS -->
    <link href="/blog/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="/blog/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="/blog/css/clean-blog.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    @include('layouts.frontend.partials.navbar')

    <!-- Page Header -->
    @yield('header')

    <!-- Main Content -->
    @yield('content')

    <hr>

    <!-- Footer -->
    @include('layouts.frontend.partials.footer')

    <!-- Bootstrap core JavaScript -->
    <script src="/blog/vendor/jquery/jquery.min.js"></script>
    <script src="/blog/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="/blog/js/clean-blog.min.js"></script>

  </body>

</html>
