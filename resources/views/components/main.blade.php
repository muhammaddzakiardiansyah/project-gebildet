<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gebildet {{ $title }}</title>
    {{-- my css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- tailwind css --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- link favicon --}}
    <link rel="shortcut icon" href="{{ asset('img/gebildet.png') }}" type="image/x-icon">
    {{-- alpine js --}}
    <script src="{{ asset('js/alpine.min.js') }}"></script>
    {{-- icon bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>

    {{-- main content --}}

    @yield('main')


</body>

</html>
