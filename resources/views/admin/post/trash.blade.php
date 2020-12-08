@extends('template_backend.home')
@section('sub-judul', 'Trashed Post')
@section('content')
<div class="row">
  <div class="col">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{  session('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <div class="card">
      <div class="card-body">
        
        <div class="table-responsive">
          <table class="table table-bordered table-md">
            <tr>
              <th>No</th>
              <th>Nama Post</th>
              <th>Kategori</th>
              <th>Tag</th>
              <th>Gambar</th>
              <th>Action</th>
            </tr>
            @foreach($posts as $results => $result)
            <tr>
              <td>{{ $results + $posts->firstitem() }}</td>
              <td>{{ $result->judul }}</td>
              <td>{{ $result->category->name }}</td>
              <td>
                @foreach($result->tags as $tag)
                  <span class="badge badge-info d-block mt-2">  {{ $tag->name }} </span> 
                @endforeach
              </td>
              <td><img src="{{ asset($result->gambar) }}" width="100px" class="img-thumbnail img-fluid"></td>
              <td>
                <form action="{{ route('post.kill', $result->id) }}" method="POST">
                  @csrf
                  @method('delete')
                  <a href="{{ route('post.restore', $result->id) }}" class="btn btn-primary btn-sm">Restore</a>
                  <button href="" class="btn btn-danger btn-sm">Delete Permanen</button>
                </form>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
      <div class="card-footer text-right">
        <nav class="d-inline-block">
          <ul class="pagination mb-0">
            {{ $posts->links() }}
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>
@endsection