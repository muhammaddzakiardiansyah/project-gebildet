  @extends('layouts.main')

  @section('isiutama')
      {{-- card homade --}}
      <div class="contents">
          <div class="row justify-content-center">
              <div class="col-md-6">
                  <form action="/" method="GET">
                      @if (request('category'))
                          <input type="hidden" name="category" value="{{ request('category') }}">
                      @endif
                      @if (request('user'))
                          <input type="hidden" name="user" value="{{ request('user') }}">
                      @endif
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Cari artikel disini" name="search"
                              value="{{ request('search') }}">
                          <button class="btn btn-dark" type="submit">Cari!</button>
                      </div>
                  </form>
              </div>
          </div>
          @if (count($posts) === 0)
              <h2 class="text-center fw-semibold text-dark-hmd mt-5">Tidak ada Postingan :(</h2>
          @endif
          @foreach ($posts as $post)
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
                      <div class="position-absolute px-3 py-2 category"><a
                              href="{{ url('/?category=' . $post->category->slug) }}"
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
          @endforeach
          <div class="mt-3 d-flex justify-content-end">
              {{ $posts->links() }}
          </div>
      </div>
  @endsection
