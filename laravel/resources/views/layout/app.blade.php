<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">


        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        {{-- <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5"> --}}
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="/css/app.css">

        <script src="/js/app.js" defer></script>
    </head>

    <body>

        @yield('content')
        
    </body>
</html>