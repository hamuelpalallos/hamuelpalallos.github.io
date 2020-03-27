<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LibStats') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('/public/js/app.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="{{ asset('/public/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{ asset('/public/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/css/calendar.css') }}">

    <script src="{{ asset('/public/js/fontawesome.js') }}"></script>
    <script src="{{ asset('/public/js/chart.js') }}"></script>
    <script src="{{ asset('/public/js/jquery.js') }}"></script>
    <script src="{{ asset('/public/js/script.js') }}"></script>
    <script src="{{ asset('/public/js/calendar.js') }}"></script>


    @if(Auth::check() == 0)
        <style>
            @media (min-width: 992px) {
                #content {
                padding-left: 0;

                }
            }
            footer {
                display: none;
            }
        </style>
    @endif
    

</head>
<body>


    <div id="app">
        <div class="wrapper">
            @if(Auth::check())
                @include('partials.sidebar')
            @endif
            <main id="content" class="main-content">
                @include('partials.navbar')
                @yield('content')
                @include('partials.footer')
            </main>
            <div class="overlay" onclick="toggleSidebar()"></div>
        </div>
    </div>

</body>
</html>
