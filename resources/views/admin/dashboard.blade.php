@extends('template_backend.home')
@section('sub-judul', 'Dashboard')
@section('content')
	<div class="row">
		<div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="far fa-clipboard"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Post</h4>
              </div>
              <div class="card-body">
                {{ $posts->count() }}
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="fas fa-toolbox"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Kategori</h4>
              </div>
              <div class="card-body">
                {{ $categories->count() }}
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="fas fa-bookmark"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Tag</h4>
              </div>
              <div class="card-body">
                {{ $tags->count() }}
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Users</h4>
              </div>
              <div class="card-body">
                {{ $users->count() }}
              </div>
            </div>
          </div>
        </div>
	</div>
@endsection