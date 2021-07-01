<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | My.cic.kz</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-29153373-9"></script>
    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <!-- Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font awesome-->
    <link rel="stylesheet" href="{{asset('fonts/font-awesome.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- include vue-treeselect & its styles. you can change the version tag to better suit your needs. -->
    <script src="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.3.0/dist/vue-treeselect.min.js"></script>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.3.0/dist/vue-treeselect.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
@include('layouts.header')
<main class="flex-row"  id="app">
    <div class="main_margin flex-row width100">
        @include('layouts.sidebar')
        @if(isset($pr))
            <div class="col-md-8 news-tape-bg radius-4px mt-3 pb-2">
                <payout-request
                        :info="{{ json_encode((object)$pr) }}"
                        :class-isn="481911"
                        :empl-isn="{{ json_decode(Auth::user())->ISN }}"
                        show-view="sign"
                        :doc_row_list_inner_other="{}">

                </payout-request>
                {!! QrCode::size(300)->generate('MyNotePaper'); !!}
            </div>
        @else
            <div class="col-md-8 news-tape-bg radius-4px mt-3 pb-2" id="employee_info">
                <edslogin show-view="check"></edslogin>
            </div>
            <div class="col-md-2-sm-3-lg mt-3">
                <news-birthday></news-birthday>
            </div>
        @endif
    </div>
</main>
</body>
</html>
