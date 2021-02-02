<!doctype html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('documentation.layouts.head')
    @yield('head')
</head>
<body>
    @yield('content')
    @include('documentation.layouts.scripts')
</body>
</html>
