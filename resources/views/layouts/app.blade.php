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

    @yield('head-stylesheet')
</head>
<body>
    
    <!-- Body layout/template -->
    @yield('body-layout')

    <!--
        Để tương thích với  code cũ/template
        Nếu thấy chỗ nào còn để content, 
        đổi lại thành "body-layout" / "section-content" phù hợp
    -->
    @yield('content')

    <!-- JavaScript files-->
    @yield('body-scripts')
</body>
</html>
