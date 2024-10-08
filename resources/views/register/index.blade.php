@extends('layouts.main')

@section('isiutama')
<div class="row justify-content-center">
  <div class="col-lg-4">
    <main class="form-registration w-100 m-auto">
      <form action="/register" method="post">
        @csrf
        <h1 class="h3 mb-3 fw-normal text-center">Please Registrasi</h1>
    
        <div class="form-floating">
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan nama" required value="{{ old('name') }}"> 
          <label for="name">Nama</label>
          @error('name')
              <div class="invalid-feedback">
                 {{ $message }}
              </div>
          @enderror
        </div>

        <div class="form-floating">
          <input type="username" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Masukan username" required value="{{ old('username') }}">
          <label for="username">Username</label>
          @error('username')
              <div class="invalid-feedback">
                 {{ $message }}
              </div>
          @enderror
        </div>

        <div class="form-floating">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukan email" required value="{{ old('email') }}">
            <label for="email">Email</label>
            @error('email')
              <div class="invalid-feedback">
                 {{ $message }}
              </div>
          @enderror
        </div>

        <div class="form-floating">
          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
          <label for="password">Password</label>
          @error('password')
              <div class="invalid-feedback">
                 {{ $message }}
              </div>
          @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Daftar!</button>
      </form>
      <small class="d-block text-center mt-3">Sudah registrasi? <a href="/login">Login sekarang!</a></small>
    </main>
  </div>
</div>
@endsection