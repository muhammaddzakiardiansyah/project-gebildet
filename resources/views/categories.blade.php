@extends('layouts.main')

@section('isiutama')
    <div class="contents">
        <div class="container">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-4 mb-3">
                        <div class="card text-bg-dark">
                            <a href="/?category={{ $category->slug }}" class="text-decoration-none text-white">
                                <img src="https://source.unsplash.com/1500x400?{{ $category->nama }}" class="card-img"
                                    alt="...">
                                <div class="card-img-overlay">
                                    <h5 class="card-title">{{ $category->nama }}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
