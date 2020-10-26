<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.refactored.head')
    @yield('head')
</head>
<body>
    @include('layouts.refactored.header')
    <main>
        @yield('content')
    </main>
</body>
</html>
