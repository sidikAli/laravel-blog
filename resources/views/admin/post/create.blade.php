@extends('template_backend.home')
@section('sub-judul', 'Tambah Post')
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
		<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="">Judul</label>
				<input type="text" name="judul" class="form-control" value="{{ old('judul') }}">
				@error('judul')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>

			<div class="form-group">
				<label for="">kategori</label>
				<select name="category_id" class="form-control">
					<option holder>Pilih Kategori</option>
					@foreach($category as $result)
					<option value="{{ $result->id }}"> {{$result->name}} </option>
					@endforeach
				</select>
				@error('category_id')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>

			<div class="form-group">
              <label>Tags</label>
              <select class="form-control select2" multiple="" name="tag[]">
                @foreach($tags as $tag)
				<option value="{{ $tag->id }}"> {{$tag->name}} </option>
				@endforeach
              </select>
              @error('tag_id')
				<small class="text-danger">{{ $message }}</small>
			  @enderror
            </div>

			<div class="form-group">
				<label for="">Content</label>
				<textarea name="content" class="form-control" rows="3" id="content" style="height: 100%; resize: none;" >{{ old('content') }}</textarea>
				@error('content')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>

			<div class="form-group">
				<label for="">Gambar</label>
				<input type="file" name="gambar" class="form-control" value="{{ old('gambar') }}">
				@error('gambar')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
			
			<div class="float-right">
				<a href="{{ route('post.index') }}" class="btn btn-info">Kembali</a>
				<button class="btn btn-primary">Tambah</button>
			</div>
		</form>
	</div>
</div>
@endsection