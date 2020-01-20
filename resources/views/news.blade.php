<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новости | My.cic.kz</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-29153373-9"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-29153373-9');
    </script>
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

    <script src="{{asset('js/app.js')}}"></script>
    {{--    <script src="{{asset('js/simple_info.js')}}"></script>--}}
</head>
<body >
@include('layouts.header')
<main class="flex-row"  id="app">
    <div class="main_margin flex-row width100">
        @include('layouts.sidebar')
        <div class="col-md-8 news-tape-bg radius-4px mt-3 pb-2" id="employee_info">
            <post :isn="{{Auth::user()->ISN}}"></post>
        </div>
        <div class="col-md-2-sm-3-lg mt-3">
            <div class="box-shadow">
                <div class="color-blue pt-2 pl-3 pr-3 pb-2 text-align-center">
                    <div class="d-flex vertical-middle">
                        <div class="pr-2 pl-2 pt-2 pb-2 height100 pointer">
                            <i class="fa fa-long-arrow-alt-left"></i>
                        </div>
                        <span class="bold">Ближайшие дни рождения</span>
                        <div class="pt-2 pr-2 pb-2 pl-2 height100 pointer height100">
                            <i class="fa fa-long-arrow-alt-right"></i>
                        </div>
                    </div>
                </div>
                <hr class="mt-0">
                <div class="pt-2 pl-4 pr-4 pb-2">
                    <div class="text-center">
                        <a href="#" class="d-flex flex-column vertical-middle Birthday-margin-inner">
                            <div class="jc-center d-flex width50">
                                <img src="images/avatar.png" class="width100">
                            </div>
                            <div class="colleagues-info-section__main d-flex flex-column vertical-middle">
                                <div class="color-blue mt-1 fs-1_1 Birthday-line_height-header text-center">
                                    <span>Джумагулов Дмитрий Романович</span>
                                </div>
                                <div class="Birthday-line_height mt-1 mb-1">
                                    <span class="fs-0_9">20.20.2020</span>
                                </div>
                                {{--                            <div class="Birthday-line_height mb-1">--}}
                                {{--                                <span class="fs-0_7">Департамент Программирования</span>--}}
                                {{--                            </div>--}}
                            </div>
                        </a>
                        <hr>
                    </div>
                    <div class="text-center">
                        <a href="#" class="d-flex flex-column vertical-middle Birthday-margin-inner">
                            <div class="jc-center d-flex width50">
                                <img src="images/avatar.png" class="width100">
                            </div>
                            <div class="colleagues-info-section__main d-flex flex-column vertical-middle">
                                <div class="color-blue mt-1 fs-1_1 Birthday-line_height-header text-center">
                                    <span>Джумагулов Дмитрий Романович</span>
                                </div>
                                <div class="Birthday-line_height mt-1 mb-1">
                                    <span class="fs-0_9">20.20.2020</span>
                                </div>
                                {{--                            <div class="Birthday-line_height mb-1">--}}
                                {{--                                <span class="fs-0_7">Департамент Программирования</span>--}}
                                {{--                            </div>--}}
                            </div>
                        </a>
                        <hr>
                    </div>
                    <div class="text-center">
                        <a href="#" class="d-flex flex-column vertical-middle Birthday-margin-inner">
                            <div class="jc-center d-flex width50">
                                <img src="images/avatar.png" class="width100">
                            </div>
                            <div class="colleagues-info-section__main d-flex flex-column vertical-middle">
                                <div class="color-blue mt-1 fs-1_1 Birthday-line_height-header text-center">
                                    <span>Джумагулов Дмитрий Романович</span>
                                </div>
                                <div class="Birthday-line_height mt-1 mb-1">
                                    <span class="fs-0_9">20.20.2020</span>
                                </div>
                                {{--                            <div class="Birthday-line_height mb-1">--}}
                                {{--                                <span class="fs-0_7">Департамент Программирования</span>--}}
                                {{--                            </div>--}}
                            </div>
                        </a>
                        <hr>
                    </div>
                    <div class="text-center">
                        <div class="color-darkgray pointer hover-gray hover-gray pt-3 pb-3">
                            Показать еще
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--RIGHT SIDE BAR GOES HERE--}}
    </div>
</main>
{{--FOOTER GOES HERE--}}
</body>
</html>
