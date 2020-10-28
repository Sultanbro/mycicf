<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.refactored.head')
    @yield('head')
</head>
<body>
    @include('layouts.refactored.header')
    <main class="container">
        @include('layouts.refactored.sidebar')
        @yield('content')
    </main>
    @include('layouts.refactored.scripts')
</body>
</html>
