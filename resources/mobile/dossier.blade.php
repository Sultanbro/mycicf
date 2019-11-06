<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Bootstrap animations -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <!-- include vue-treeselect & its styles. you can change the version tag to better suit your needs. -->
    <script src="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.3.0/dist/vue-treeselect.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.3.0/dist/vue-treeselect.min.css">

    <script src="{{asset('js/mobile.js')}}"></script>
    {{--    <script src="{{asset('js/simple_info.js')}}"></script>--}}
</head>
<body>
<div id="app">
    @include('layouts.header')
{{--    <header class="bg-color-blue color-white fs-1_3">--}}
{{--        <div class="container-fluid flex-row jc-sb vertical-middle pt-3 pb-3">--}}
{{--            <div>--}}
{{--                <a href="javascript: void(0)" class="color-white mobile-link-padding">--}}
{{--                    <i class="fa fa-bars"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                <div class="mobile-centras-logo">--}}
{{--                    <a href="{{route('index')}}">--}}
{{--                        <img src="{{asset('images/new-white-logo.png')}}" class="image">--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                <a href="javascript: void(0)" class="color-white mobile-link-padding">--}}
{{--                    <i class="fa fa-user"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </header>--}}
    <main class="bg-parse">
        <div>
            <div class="bg-white">
                <div class="pb-3 container-fluid flex-column vertical-middle">
                    <div class="mt-3 flex-column vertical-middle">
                        <div class="flex-column vertical-middle">
                            <div class="width-40">
                                <img src="../images/avatar.png" class="small-avatar-circle width100">
                            </div>
                        </div>
                        <div class="mt-2 mb-2 color-blue-name">
                            <strong >Имя Фамилия</strong>
                        </div>
                    </div>
                    <div class="width100">
                        <div class="flex-column vertical-middle color-white bg-color-blue width100">
                            <span>Основная информация</span>
                            <span><i class="fa fa-chevron-down"></i></span>
                        </div>
                    </div>
{{--                    <div class="width100 mt-3 mb-4">--}}
{{--                        <div class="flex-row jc-center bg-notification-center border-rad-10 pt-2 pb-2 vertical-middle color-white width100">--}}
{{--                            <span><i class="far fa-bell fs-1_2"></i></span>--}}
{{--                            <span class="pl-2">Центр уведомлений</span>--}}
{{--                            <div class="notification-counter">1</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
            <mobile-info :isn="{{Auth::user()->ISN}}"></mobile-info>
        </div>
    </main>
</div>
</body>
</html>