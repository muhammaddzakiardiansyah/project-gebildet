@extends('layouts.main')

@section('isiutama')
<div class="row justify-content-center mt-4">
  <div class="col-md-4">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ session('success') }}!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  @if (session('loginError')) 
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session('loginError') }}!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
    <main class="form-signin w-100 m-auto">
      <form action="/login" method="post">
        @csrf 
        <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
    
        <div class="form-floating">
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Masukan email anda" autofocus value="{{ old('email') }}"> 
          <label for="email">Email</label>
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
         </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
          <label for="password">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Login!</button>
      </form>
      <small class="d-block text-center mt-3">Belum registrasi? <a href="/register">Registrasi sekarang!</a></small>
    </main>
  </div>
</div>
@endsection