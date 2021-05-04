@php
  $routes = [
    'dev.code' => 'Code',
    'dev.tests' => 'Tests',
    'dev.routes' => 'Routes',
    'dev.vendor' => 'Vendor',
    'dev.config' => 'Config',
    'dev.git' => 'Git',
    'dev.views' => 'Views',
    'dev.kias' => 'Kias',
    'dev.caching' => 'Caching',
    'dev.docs' => 'API Docs',
];
@endphp

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Developer area</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
            crossorigin="anonymous"></script>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>

    <style>
        footer {
            text-align: center;
            padding: 40px;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav class="nav nav-pills flex-column flex-sm-row pt-2 pb-2">
                @foreach ($routes as $route => $title)
                    <a class="flex-sm-fill text-sm-center nav-link {{ Route::currentRouteName() === $route ? 'active' : '' }}" href="{{ route($route) }}">
                        {{ $title }}
                    </a>
                @endforeach
            </nav>
        </div>
    </div>
</div>

@yield('body')

<footer>
    <a href="https://github.com/aik099/PhpStormProtocol">
        aik099/PhpStormProtocol
    </a>
</footer>

</body>
</html>
