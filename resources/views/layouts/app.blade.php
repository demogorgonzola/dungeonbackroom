<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Title -->
        <title>
            @yield('title')
        </title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,600"
            rel="stylesheet">
        <script
            defer
            src="https://use.fontawesome.com/releases/v5.3.1/js/all.js">
        </script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <!-- Header -->
        @include('header')
        <!-- Content/Errors -->
        <section class="section content">
            @yield('content')
            <!-- Error Response of Content -->
            <div class="container">
                @include('partials.error')
            </div>
        </section>
        <!-- Footer -->
        @include('footer')
    </body>
</html>
