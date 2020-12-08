@extends('template_backend.home')
@section('sub-judul', 'Edit Tag')
@section('content')
<div class="row">
	<div class="col">
		<form action="{{ route('tag.update', $tag->id) }}" method="POST">
			@csrf
			@method('patch')
			<div class="form-group">
				<label for="">Tag</label>
				<input type="text" name="tag" class="form-control" value="{{ $tag->name }}">

				@error('tag')
					<small class="text-danger">{{ $message }}</small>
				@enderror

			</div>
			
			<div class="float-right">
				<a href="{{ route('tag.index') }}" class="btn btn-info">Kembali</a>
				<button class="btn btn-primary">Edit</button>
			</div>
		</form>
	</div>
</div>
@endsection