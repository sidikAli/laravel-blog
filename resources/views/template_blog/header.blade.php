<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laravel - Blog</title>
	<link rel="icon" href="{{asset('sensive')}}/img/Fevicon.png" type="image/png">

  <link rel="stylesheet" href="{{ asset('sensive/vendors/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('sensive/vendors/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('sensive/vendors/themify-icons/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('sensive/vendors/linericon/style.css') }}">
  <link rel="stylesheet" href="{{ asset('sensive/vendors/owl-carousel/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('sensive/vendors/owl-carousel/owl.carousel.min.css') }}">

  <link rel="stylesheet" href="{{ asset('sensive/css/style.css') }}">
</head>
<body>
  <!--================Header Menu Area =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand h_logo" href="{{ route('blog.index') }}">
            LARA<span>BLOG</span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-center">
              <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}"><a class="nav-link" href="{{ url('') }}">Home</a></li>
              <li class="nav-item {{ (request()->is('/contact')) ? 'active' : '' }}"><a class="nav-link" href="contact.html">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right navbar-social">
              <li><a href="https://twitter.com/alisidik221"><i class="ti-twitter-alt"></i></a></li>
              <li><a href="https://github.com/sidikAli"><i class="ti-github"></i></a></li>
            </ul>
          </div> 
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->
  <main class="site-main">