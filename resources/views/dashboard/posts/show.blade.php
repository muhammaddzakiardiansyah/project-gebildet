@extends('dashboard.layouts.main')

@section('container')
    <div class="contents">
        @if ($post->gambar)
            <div class="card-hmd">
                <div class="position-absolute px-3 py-2 category">
                    <a href="{{ url('/?category=' . $post->category->slug) }}"
                        class="text-white text-decoration-none">{{ $post->category->nama }}</a>
                </div>
                <img class="card-image-hmd" src="{{ asset('/uploads/' . $post->gambar) }}" alt="{{ $post->gambar }}">
                <div class="card-body-hmd">
                    <h4 class="title-hmd">{{ $post->judul }}</h4>
                    <p class="author-hmd">Dibuat oleh <a class="author-link"
                            href="{{ url('/?user=' . $post->user->username) }}">{{ $post->user->name }}</a> pada
                        {{ $post->created_at->format('Y/m/d') }}</p>
                    <p class="text-hmd">
                        {!! $post->caption !!}
                    </p>
                </div>
            </div>
        @else
            <div class="card-hmd">
                <div class="position-absolute px-3 py-2 category"><a href="{{ url('/?category=' . $post->category->slug) }}"
                        class="text-white text-decoration-none">{{ $post->category->nama }}</a></div>
                <div class="card-body-hmd mt-5">
                    <h4 class="title-hmd">{{ $post->judul }}</h4>
                    <p class="author-hmd">Dibuat oleh <a class="author-link"
                            href="{{ url('/?user=' . $post->user->username) }}">{{ $post->user->name }}</a> pada
                        {{ $post->created_at->format('Y/m/d') }}</p>
                    <p class="text-hmd">
                        {!! $post->caption !!}
                    </p>
                </div>
            </div>
        @endif
        <div class="content">
            <a href="/dashboard/posts" class="btn btn-success text-decoration-none"><span data-feather="arrow-left"
                    class="align-text-bottom"></span> Kembali ke postingan</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning text-decoration-none"><span
                    data-feather="edit" class="align-text-bottom"></span> Ubah</a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')"><span
                        data-feather="x-circle"></span> Hapus</button>
            </form>
        </div>
    </div>
    {{-- <div class="container">
    <div class="row my-3">
            <div class="col-md-6 align-self-center mt-2">
              <div class="card" style="width: 33rem;">
                @if ($post->gambar)
                    <div style="max-height: 350px; overflow: hidden;">
                      <img src="{{ asset('storage/' . $post->gambar) }}" class="card-img-top img-fluid" alt="gambar" style="height: 25rem;">
                    </div>
                @else
                   <img src="https://source.unsplash.com/1500x400?{{ $post->category->nama }}" class="card-img-top img-fluid" alt="gambar" style="height: 25rem;">
                @endif
                  <div class="card-body">
                    <h5 class="card-title">{{ $post->judul }}</h5>
                    <p class="card-text">{!! $post->caption !!}</p>
                <div class="content">
                    <a href="/dashboard/posts" class="btn btn-success text-decoration-none"><span data-feather="arrow-left" class="align-text-bottom"></span> Kembali ke postingan</a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning text-decoration-none"><span data-feather="edit" class="align-text-bottom"></span> Ubah</a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')"><span data-feather="x-circle"></span> Hapus</button>
                    </form>
                  </div>
                </div>
            </div>
    </div>
</div> --}}
@endsection
