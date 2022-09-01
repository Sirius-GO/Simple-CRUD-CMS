<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .message_bar{
            width: 100%;
            text-align: center;
            position: absolute;
            top: 55px;
            z-index: 3;
            animation:message_bar 3s 1;
            -webkit-animation:message_bar 3s 1;
            animation-fill-mode: forwards;
            animation-delay:3.5s;
            -webkit-animation-delay:3.5s; /* Safari and Chrome */
            -webkit-animation-fill-mode: forwards;
        } 

        @keyframes message_bar{
            from {opacity :1;}
            to {opacity :0;}
        }

        @-webkit-keyframes message_bar{
            from {opacity :1;}
            to {opacity :0;}
        }
    </style>
</head>
<body>
    <div id="app">
        @include('inc.nav')
        @include('inc.messages')
        <main class="container py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
