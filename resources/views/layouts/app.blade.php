<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ config('app.name') }} - {{ config('app.subtitle')}}">
    <meta name="robots" content="all,follow">

    <link rel="icon" href="{{ asset('img/icon.ico') }}" type="image/ico"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name') }} - {{ config('app.subtitle')}}</title>

    @yield('head-script')
</head>
<body>
    <!-- Header -->
    @yield('page-header')

    @yield('page-body')

    @yield('page-footer')
    
    <!-- JavaScript files-->
    @yield('ui-script')
    @yield('extend-script')
</body>
</html>
