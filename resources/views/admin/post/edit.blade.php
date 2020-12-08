@extends('template_backend.home')
@section('sub-judul', 'Edit Post')
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
		<form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PATCH')
			<div class="form-group">
				<label for="">Judul</label>
				<input type="text" name="judul" class="form-control" value="{{ $post->judul }}">
				@error('judul')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>

			<div class="form-group">
				<label for="">kategori</label>
				<select name="category_id" class="form-control">
					<option holder>Pilih Kategori</option>
					@foreach($category as $result)
					<option value="{{ $result->id }}" @if($post->category_id == $result->id) selected @endif> {{$result->name}} </option>
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
				<option value="{{ $tag->id }}"
					@foreach ($post->tags as $result)
						@if ($result->id == $tag->id)
							selected 
						@endif
					@endforeach
				> {{$tag->name}} </option>
				@endforeach
              </select>
              @error('tag_id')
				<small class="text-danger">{{ $message }}</small>
			  @enderror
            </div>

			<div class="form-group">
				<label for="">Content</label>
				<textarea name="content" class="form-control" rows="3" id="content" style="height: 100%; resize: none;" >{{ $post->content }}</textarea>
				@error('content')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>

			<div class="form-group">
				<label for="">Gambar</label>
				<input type="file" name="gambar" class="form-control" value="{{ $post->gambar }}">
				@error('gambar')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
			
			<div class="float-right">
				<a href="{{ route('post.index') }}" class="btn btn-info">Kembali</a>
				<button class="btn btn-primary">Edit</button>
			</div>
		</form>
	</div>
</div>
@endsection