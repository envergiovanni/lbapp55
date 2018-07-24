@extends('layouts.frontend.app')

@section('meta-title', ' | Contáctenos')

@section('meta-description', config('blog.contact_sh'))

@section('header')
<header class="masthead" style="background-image: url('/blog/img/contact-bg.jpeg')">
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
          <p>¿Tienes preguntas? Rellena el formulario y te responderemos lo más pronto posible. Gracias</p>

          @include('layouts.frontend.partials.success')
          @include('layouts.frontend.partials.errors')
          <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
          <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
          <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
          <form action="{{ url('/contacto') }}" name="sentMessage" id="contactForm" method="post" novalidate>
            {{ csrf_field() }}
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Nombre</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Nombre" id="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Correo electrónico</label>
                <input type="email" name="email" value="{{ old('email')}}" class="form-control" placeholder="Correo electrónico" id="email" required data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Asunto</label>
                <input type="text" name="subject" value="{{ old('subject') }}" class="form-control" placeholder="Asunto" id="subject" required data-validation-required-message="Please enter your phone number.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Mensaje</label>
                <textarea rows="5" name="body" value="{{ old('body') }}" class="form-control" placeholder="Mensaje" id="message" required data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary float-right" id="sendMessageButton">Enviar mensaje</button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection