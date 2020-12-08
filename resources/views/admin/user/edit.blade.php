@extends('template_backend.home')
@section('sub-judul', 'Edit User')
@section('content')
<div class="row">
	<div class="col">
		<form action="{{ route('user.update', $user->id) }}" method="POST">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="">Email</label>
				<input type="text" name="email" class="form-control" value="{{ $user->email }}" readonly>
				@error('email')
					<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>

			<div class="form-group">
				<label for="">Nama</label>
				<input type="text" name="name" class="form-control" value="{{ $user->name }}">
				@error('name')
					<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>

			<div class="form-group">
				<label for="">Tipe</label>
				<select name="tipe" class="form-control">
					<option value="1" @if($user->tipe == 1) selected @endif>Administrator</option>
					<option value="0" @if($user->tipe == 0) selected @endif>Writer</option>
				</select>
				@error('tipe')
					<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
			
			<div class="form-group">
				<label for="">Password (Kosongkan jika tidak ingin diubah)</label>
				<input type="text" name="password" class="form-control">
				@error('password')
					<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>

			
			<div class="float-right">
				<a href="{{ route('user.index') }}" class="btn btn-info">Kembali</a>
				<button type="submit" class="btn btn-primary">Edit</button>
			</div>
		</form>
	</div>
</div>
@endsection