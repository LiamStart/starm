<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="canonical" href="https://www.creative-tim.com/product/argon-dashboard-pro" />
        <title>{{ config('app.name') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
        <link type="text/css" href="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
        <link type="text/css" href="{{asset('argon')}}/vendor/bootstrap/dist/js/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth

        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

        <script src="{{asset('argon')}}/vendor/jquery/dist/jquery.slim.min.js"></script>
        <script src="{{asset('argon')}}/vendor/js-cookie/js.cookie.js"></script>
        <script src="{{asset('argon')}}/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="{{asset('argon')}}/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
        <script src="{{asset('argon')}}/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
        <script src="{{asset('argon')}}/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Optional JS -->
        <script src="{{asset('argon')}}/vendor/onscreen/dist/on-screen.es6.js"></script>
        <!-- Argon JS -->
        <script src="{{asset('argon')}}/js/argon.min.js?v=1.2.0"></script>


        @stack('js')

    </body>
</html>
