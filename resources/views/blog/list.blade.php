@extends('template_blog.blog')

@section('content')
	   <!--================Hero Banner start =================-->  
    <section class="mb-30px">
      <div class="container">
        <div class="hero-banner">
          <div class="hero-banner__content">
            <h1>Laravel Blog</h1>
          </div>
        </div>
      </div>
    </section>
    <!--================Hero Banner end =================-->  

    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin mt-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            
            @foreach($posts as $post)
            <div class="single-recent-blog-post">
              <div class="thumb">
                <img class="img-fluid img-thumbnail" src="{{ url($post->gambar) }}" alt="" style="">
                <ul class="thumb-info">
                  <li><a href="#"><i class="ti-user"></i>{{ $post->user->name }}</a></li>
                  <li><a href="#"><i class="ti-notepad"></i>{{ $post->created_at->toDateString() }}</a></li>
                  <li><a href=""><i class="ti-notepad"></i>{{ $post->category->name }}</a></li>
                </ul>
              </div>
              <div class="details mt-20">
                <a href="{{ route('blog.page', $post->slug)  }}">
                  <h3>{{ $post->judul }}</h3>
                </a>
                <p class="tag-list-inline">Tag: @foreach($post->tags as $tag) <span class="badge badge-warning">{{$tag->name}}</span> @endforeach</p>
                <p>{{substr($post->content, 0, 20)}} ..... </p>
                <a class="button" href="{{ route('blog.page', $post->slug)  }}">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
            @endforeach

            

            <div class="row">
              <div class="col-lg-12">
                  <nav class="blog-pagination justify-content-center d-flex">
                      <ul class="pagination">
                          {{$posts->links()}}
                      </ul>
                  </nav>
              </div>
            </div>
          </div>

@endsection