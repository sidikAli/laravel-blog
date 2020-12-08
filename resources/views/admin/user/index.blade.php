@extends('template_backend.home')
@section('sub-judul', 'User')
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
        <a href="{{ route('user.create') }}" class="btn btn-info">Tambah User</a>
      </div>
      <div class="card-body">
        
        <div class="table-responsive">
          <table class="table table-bordered table-md">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Tipe</th>
              <th>Action</th>
            </tr>
            @foreach($users as $user => $result)
            <tr>
              <td>{{ $user + $users->firstitem() }}</td>
              <td>{{ $result->name }}</td>
              <td>{{ $result->email }}</td>
              <td>
                @if($result->tipe == 1) 
                  <span class="badge badge-primary">Administrator</span>
                @else 
                  <span class="badge badge-warning">Writer</span>
                @endif</td>
              <td>
                <form action="{{ route('user.destroy', $result->id) }}" method="POST">
                  @csrf
                  @method('delete')
                  <a href="{{ route('user.edit', $result->id) }}" class="btn btn-primary btn-sm">Edit</a>
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
            {{ $users->links() }}
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>
@endsection