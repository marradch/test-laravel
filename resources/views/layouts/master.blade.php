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

<div class="container mt-5">
    <h1>Test Laravel Task</h1>
    @yield('content')
</div>

<div class="toast bg-danger text-white" id="myToast">
    <div class="toast-header">
        <strong class="mr-auto"><i class="fa fa-grav"></i> Something went wrong!</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
    </div>
    <div class="toast-body">
        Problems with loading proposal next page
    </div>
</div>

</body>
</html>
