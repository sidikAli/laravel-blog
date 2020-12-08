@extends('template_backend.home')
@section('sub-judul', 'Tag')
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
      <div class="pl-4 pt-3">
        <a href="{{ route('tag.create') }}" class="btn btn-info">Tambah Tag</a>
      </div>
      <div class="card-body">
        
        <div class="table-responsive">
          <table class="table table-bordered table-md">
            <tr>
              <th>No</th>
              <th>Nama Tag</th>
              <th>Action</th>
            </tr>
            @foreach($tag as $results => $result)
            <tr>
              <td>{{ $results + $tag->firstitem() }}</td>
              <td>{{ $result->name }}</td>
              <td>
                <form action="{{ route('tag.destroy', $result->id) }}" method="POST">
                  @csrf
                  @method('delete')
                  <a href="{{ route('tag.edit', $result->id) }}" class="btn btn-primary btn-sm">Edit</a>
                  <button href="" class="btn btn-danger btn-sm">Delete</button>
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
            {{ $tag->links() }}
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>
@endsection