@extends('template_blog.blog')

@section('content')
	     <!--================ Hero sm Banner start =================-->      
        <section class="mb-30px">
          <div class="container">
            <div class="hero-banner hero-banner--sm"  style="background-image: url({{ asset($post->gambar) }}) !important">
              <div class="hero-banner__content">
                <h1>{{$post->judul}}</h1>
                <h4>{{ $post->category->name }}</h4>
              </div>
            </div>
          </div>
        </section>
        <!--================ Hero sm Banner end =================-->    

    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin mt-4">
      <div class="container">
        <div class="row">
        <div class="col-lg-8">
            <div class="main_blog_details">
                <div class="user_details">
                  <div class="float-left">
                    @foreach($post->tags as $tag)
                    <a href="#">{{$tag->name}}</a>
                    @endforeach
                  </div>
                  <div class="float-right mt-sm-0 mt-3">
                    <div class="media">
                      <div class="media-body">
                        <h5>{{ $post->user->name }}</h5>
                        <p>{{$post->created_at}}</p>
                      </div>
                      <div class="d-flex">
                        <img width="42" height="42" src="{{ asset('sensive/img/blog/c2.jpg') }}" alt="">
                      </div>
                    </div>
                  </div>
                </div>
                {!! $post->content !!}
          </div>
          </div>
          


@endsection