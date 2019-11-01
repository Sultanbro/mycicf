<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>i-ci.kz</title>

    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <!-- Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font awesome-->
    <link rel="stylesheet" href="{{asset('fonts/font-awesome.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles_parse.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- include vue-treeselect & its styles. you can change the version tag to better suit your needs. -->
    <script src="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.3.0/dist/vue-treeselect.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.3.0/dist/vue-treeselect.min.css">

    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
@include('layouts.header')
<main class="flex-row"  id="app">
    <div class="main_margin flex-row width100">
        @include('layouts.sidebar')
        <div class="col-md-6 news-tape-bg radius-4px ml-3 mt-3 pb-2" id="employee_info">
            <div>
                <info :isn="{{Auth::user()->ISN}}"></info>
            </div>
            <div class="flex-row jc-sb pt-3 pr-3 pb-4 pl-3 vertical-middle flex-row width100">
                <main-data-charts></main-data-charts>
            </div>
        </div>
        {{--RIGHT SIDE BAR GOES HERE--}}
    </div>
</main>

{{--<div class="bg-white">--}}
{{--    <div class="main_padding width100 pt-4" id="app">--}}
{{--        <div class="bg-white pl-3 pr-3 box-shadow border-16">--}}
{{--            <div class="flex-row jc-sb pt-3 pr-3 pb-4 pl-3 vertical-middle flex-row">--}}
{{--                <main-data-charts></main-data-charts>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="bg-white pl-3 pr-3 box-shadow border-16">--}}
{{--            <div class="flex-row jc-sb pt-3 pr-3 pb-4 pl-3 vertical-middle flex-row">--}}
{{--                @include('layouts.sidebar')--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
</body>
</html>