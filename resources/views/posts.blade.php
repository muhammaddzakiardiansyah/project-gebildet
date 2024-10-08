@extends('layouts.main')

@section('isiutama')
    <div class="container">
        <div class="row justify-content-center">
            <h3 class="text-center mb-3">{{ $title }}</h3>
            <div class="container">
              <div class="row justify-content-center mb-3">
                <div class="col-md-6">
                  <form action="/posts" method="GET">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('user'))
                        <input type="hidden" name="user" value="{{ request('user') }}">
                    @endif
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                      <button class="btn btn-dark" type="submit">Cari!!</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            @if ($posts->count())
                <div class="card mb-3">
                   @if ($posts[0]->gambar)
                      <div style="max-height: 350px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $posts[0]->gambar) }}" class="card-img-top img-fluid" alt="{{ $posts[0]->category->nama }}" style="height: 25rem;">
                      </div>
                   @else
                       <img src="https://source.unsplash.com/1500x400?{{ $posts[0]->category->nama }}" class="card-img-top img-fluid" alt="{{ $posts[0]->category->nama }}" style="height: 25rem;">
                    @endif
                  <div class="card-body">
                    <h3 class="card-title"><a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->judul }}</a></h3>
                    <small>
                      Ditulis oleh <a href="/posts?user={{ $posts[0]->user->username }}">{{ $posts[0]->user->name }}</a> di bidang <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->slug }}</a> pada {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                    <p class="card-text">{{ $posts[0]->excrpt }}</p>
                    <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">baca selengkapnya....</a>
                  </div>
                </div>
           
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-3"></div>
                <div class="col-md-6 align-self-center mt-2">
                  <div class="card" style="width: 33rem;">
                    <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.5); "><a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->nama }}</a></div>
                    <a href="/post/{{ $post->slug }}" class="text-dark text-decoration-none">
                      @if ($post->gambar)
                       <div style="max-height: 350px; overflow: hidden;">
                          <img src="{{ asset('storage/' . $post->gambar) }}" class="card-img-top img-fluid" alt="gambar" style="height: 25rem;">
                       </div>
                      @else
                          <img src="https://source.unsplash.com/1500x400?{{ $post->category->nama }}" class="card-img-top img-fluid" alt="gambar" style="height: 25rem;">
                      @endif
                      <div class="card-body">
                        <h5 class="card-title">{{ $post->judul }}</h5>
                        <small>Ditulis oleh <a href="/posts?user={{ $post->user->username }}">{{ $post->user->name }}</a> pada {{ $post->created_at->diffForHumans() }}</small>
                        <p class="card-text">{{  $post->excrpt  }} <a href="/post/{{ $post->slug }}" class="text-decoration-none">baca selengkapnya....</a></p>
                    </a>
                    <div class="content">
                        <span class="badge text-bg-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                          <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                        </svg></span>
                        <a href="/post/{{ $post->slug }}" class="badge text-bg-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                          <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                        </svg></a>
                        <span class="badge text-bg-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                          <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
                        </svg></span>
                      </div>
                    </div>
                </div>
              </div>
              <div class="col-md-3"></div>
            @endforeach

       @else
         <p class="text-center fs-4">Belum ada postingan?</p>
       @endif
            <div class="mt-3 d-flex justify-content-end">
              {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection

  



