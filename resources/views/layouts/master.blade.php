<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

@include('layouts/parts/nav')

@include('layouts/parts/flash-message')

<div class="container mt-5">
    <h1>Test Laravel Task</h1>
    @yield('content')
</div>

@include('layouts/parts/toast')

</body>
</html>
