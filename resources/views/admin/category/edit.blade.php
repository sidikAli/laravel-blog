@extends('template_backend.home')
@section('sub-judul', 'Edit Kategori')
@section('content')
<div class="row">
	<div class="col">
		<form action="{{ route('category.update', $category->id) }}" method="POST">
			@csrf
			@method('patch')
			<div class="form-group">
				<label for="">Kategori</label>
				<input type="text" name="kategori" class="form-control" value="{{ $category->name }}">

				@error('kategori')
					<small class="text-danger">{{ $message }}</small>
				@enderror

			</div>
			
			<div class="float-right">
				<a href="{{ route('category.index') }}" class="btn btn-info">Kembali</a>
				<button class="btn btn-primary">Edit</button>
			</div>
		</form>
	</div>
</div>
@endsection