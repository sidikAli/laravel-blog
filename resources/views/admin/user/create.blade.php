@extends('template_backend.home')
@section('sub-judul', 'Tambah User')
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
		<form action="{{ route('user.store') }}" method="POST">
			@csrf
			<div class="form-group">
				<label for="">Nama</label>
				<input type="text" name="name" class="form-control" value="{{ old('name') }}">
				@error('name')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
			<div class="form-group">
				<label for="">Email</label>
				<input type="text" name="email" class="form-control" value="{{ old('email') }}">
				@error('email')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
			<div class="form-group">
				<label for="">Password</label>
				<input type="password" name="password" class="form-control" value="{{ old('password') }}">
				@error('password')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
			<div class="form-group">
				<label for="">Tipe</label>
				<select name="tipe" class="form-control">
					<option>Pilih Tipe</option>
					<option value="1">Administrator</option>
					<option value="0">Writer</option>
				</select>
				@error('type')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
			
			<div class="float-right">
				<a href="{{ route('user.index') }}" class="btn btn-info">Kembali</a>
				<button type="submit" class="btn btn-primary">Tambah</button>
			</div>
		</form>
	</div>
</div>
@endsection