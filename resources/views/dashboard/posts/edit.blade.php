@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Postingan anda</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
              <label for="judul" class="form-label">Judul <span class="text-red">*</span></label>
              <input type="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" autofocus placeholder="Judul" value="{{ old('judul', $post->judul) }}">
              @error('judul')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="slug" class="form-label">Slug <span class="text-red">*</span></label>
              <input type="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="slug" value="{{ old('slug', $post->slug) }}">
              @error('slug')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">Category <span class="text-red">*</span></label>
              <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                  @if (old('category_id', $post->category->id) == $category->id)
                    <option value="{{ $category->id }}" selected >{{ $category->nama }}</option>
                  @else
                    <option value="{{ $category->id }}" >{{ $category->nama }}</option>
                  @endif
                @endforeach
               
              </select>
            </div>
            <div class="mb-3">
              <div class="input-group mb-3">
                @if ($post->gambar)
                   <img src="{{ asset('storage/' . $post->gambar) }}" class="img-preview img-fluid mb-3 d-block"> 
                @else
                   <img class="img-preview img-fluid mb-3">
                @endif
                <label class="input-group-text" for="gambar">Tambah gambar</label>
                {{-- <input type="hidden" name="oldImage" value="{{ old($post->gambar) }}"> --}}
                <input type="file" class="form-control  @error('gambar') is-invalid @enderror" id="gambar" name="gambar" value="{{ old('gambar') }}" onchange="previewImage()"> 
              </div>
              @error('gambar')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="caption" class="form-label">Caption <span class="text-red">*</span></label>
              <input id="caption" type="hidden" name="caption" value="{{ old('caption', $post->caption) }}">
              <trix-editor input="caption"></trix-editor>
              @error('caption')
                  <div class="text-danger">
                     {{ $message }}
                  </div>
              @enderror
            </div>


            <button type="submit" class="btn btn-primary btn-sm">Ubah Postingan</button>
          </form>
    </div>

    <script>
       const file = document.querySelector('.trix-button-group--file-tools');
       file.style.display = 'none';
       const judul = document.querySelector('#judul');
       const slug = document.querySelector('#slug');

       judul.addEventListener('change', function() {
         fetch('/dashboard/posts/checkSlug?judul=' + judul.value)
         .then(response => response.json())
         .then(data => slug.value = data.slug)
       });

       document.addEventListener('trix-file-accept', function(e) {
         e.preventDefault();
       });

       function previewImage() {
         const gambar = document.querySelector('#gambar');
         const preview = document.querySelector('.img-preview');

         preview.style.display = 'block';

         const oFReader = new FileReader();
         oFReader.readAsDataURL(gambar.files[0]);

         oFReader.onload = function(oFREvent) {
           preview.src = oFREvent.target.result;
         }
       }
    </script>
@endsection