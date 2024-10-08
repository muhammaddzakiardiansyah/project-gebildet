@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h5 class="h6">Selamat datang {{ auth()->user()->name }} 😸</h5>
    </div>
@endsection