<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css" rel="stylesheet">
        <link type="text/css" href="{{ asset('argon') }}/css/custom.css" rel="stylesheet">
    </head>
    <body class="bg-linear-gradient">
        <div class="header pt-8 pb-4">
            <div class="container">
                <div class="row justify-content-center">
                    <a class="brand-logo-guest" href="{{ route('index') }}">
                        <img src="{{ asset('argon') }}/img/brand/logo.png">
                    </a>
                </div>
                <div class="row justify-content-center">
                    <h1 class="text-white display-4">{{ $description ?? '' }}</h1>
                </div>
            </div>
        </div>
        <div class="container pb-5">
            <div class="row justify-content-center">
                @yield('content')
            </div>
        </div>

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

        @stack('js')

        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
        <script src="{{ asset('argon') }}/js/custom.js"></script>
    </body>
</html>
