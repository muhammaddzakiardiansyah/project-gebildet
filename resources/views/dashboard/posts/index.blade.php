@extends('dashboard.layouts.main')

@section('container')
    <div class=" flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Posts</h1>
        <p>Kumpulan postingan yang anda buat</p>
    </div>

    <div class="table-responsive col-lg-8">
        <a href="/dashboard/posts/create" class="btn btn-primary btn-sm mb-3">Buat Postingan baru</a>
        <br>
        @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
             {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Judul</th>
              <th scope="col">Kategori</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ( $posts as $post )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->judul }}</td>
                <td>{{ $post->category->nama }}</td>
                <td>
                    <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus?')"><span data-feather="x-circle"></span></button>
                    </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection