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

    <script src="{{asset('js/app.js')}}"></script>
    {{--    <script src="{{asset('js/simple_info.js')}}"></script>--}}
</head>
<body>
<div id="app">
    <div class="m-navbar">
        <div>
            <div class="absolute pb-3 pt-3">
                <a href="javascript: void(0)" class="color-white mr-4 vertical-middle pt-2 ml-5 mobile-link-padding">
                    <i class="fa fa-bars fs-1_3 color-blue"></i>
                </a>
            </div>
            <div class="flex-row ml-5 relative jc-center mr-5 jc-sb pt-3 pb-3">
                <div>
                    <div class="mobile-centras-logo">
                        <a href="{{route('index')}}">
                            <img src="{{asset('images/new-white-logo.png')}}" class="image">
                        </a>
                    </div>
                </div>
            </div>
            <div class="ml-5 mr-5">
                <div class="flex-row vertical-middle">
                    <div>
                        <div class="mobile-medium-avatar-circle-width">
                            <img class="pt-0 image-circle-add-post image header-avatar-size small-avatar-circle width100" src="/images/avatar.png">
                        </div>
                    </div>
                    <div class="ml-3">
                        <span class="color-blue">
                            <strong class="flex-column">
                                <span>Имя</span>
                                <span>Фамилия</span>
                            </strong>
                        </span>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex-column">
                    <div class="mb-3">
                        <ul class="flex-column mt-3 mr-5 ml-5">
                            <a href="https://ta.cic.kz/dossier" class="pt-2 pb-2 color-darkgray font-size-1_2">
                                <li>
                                    <i class="far fa-clipboard"></i>
                                    <span>Досье</span>
                                </li>
                            </a>
                            <a href="https://ta.cic.kz/coordination" class="pt-2 pb-2 mobile-navbar-active color-darkgray font-size-1_2">
                                <li>
                                    <i class="far fa-thumbs-up"></i>
                                    <span>Согласование</span>
                                </li>
                            </a>
                            <a href="javascript:void(0)" class="pt-2 pb-2 color-darkgray font-size-1_2">
                                <li>
                                    <i class="far fa-grin-stars"></i>
                                    <span>Мотивация</span>
                                </li>
                            </a>
                            <a href="javascript:void(0)" class="pt-2 pb-2 color-darkgray font-size-1_2">
                                <li>
                                    <i class="fas fa-book-reader"></i>
                                    <span>Обучение</span>
                                </li>
                            </a>
                            <a href="https://ta.cic.kz/centcoins" class="pt-2 pb-2 color-darkgray font-size-1_2">
                                <li>
                                    <img src="/images/centcoin-fa.png" style="width: 20px;">
                                    <span>Сенткоины</span></li></a>
                            <a href="javascript:void(0)" class="pt-2 pb-2 color-darkgray font-size-1_2">
                                <li>
                                    <i class="fas fa-chart-pie"></i>
                                    <span>Отчет</span>
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="bg-blue-standart height100vh">
                <div class="pt-4 ml-5 mr-5 pb-5 flex-row jc-sb">
                    <div class="flex-column">
                        <a href="javascript: void(0)" class="color-white mobile-navbar-border-bot fs-0_8">
                            PARSE
                        </a>
                        <a href="javascript: void(0)" class="color-white mobile-navbar-border-bot fs-0_8">
                            РЕЙТИНГ
                        </a>
                        <a href="javascript: void(0)" class="color-white mobile-navbar-border-bot fs-0_8">
                            О КОМПАНИИ
                        </a>
                        <a href="javascript: void(0)" class="color-white mobile-navbar-border-bot fs-0_8">
                            БИБЛИОТЕКА
                        </a>
                    </div>
                    <div class="flex-column">
                        <a href="javascript: void(0)" class="color-white mobile-navbar-border-bot fs-0_8">
                            ПРОДУКТЫ
                        </a>
                        <a href="javascript: void(0)" class="color-white mobile-navbar-border-bot fs-0_8">
                            ЭЛЕМЕНТ 1
                        </a>
                        <a href="javascript: void(0)" class="color-white mobile-navbar-border-bot fs-0_8">
                            ЭЛЕМЕНТ 2
                        </a>
                        <a href="javascript: void(0)" class="color-white mobile-navbar-border-bot fs-0_8">
                            ЭЛЕМЕНТ 3
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header class="bg-color-blue color-white fs-1_3">
        <div class="container-fluid flex-row jc-sb vertical-middle pt-3 pb-3">
            <div>
                <a href="javascript: void(0)" class="color-white mobile-link-padding">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div>
                <div class="mobile-centras-logo hamburger-mobile">
                    <a href="{{route('index')}}" class="hamburger-mobile">
                        <img src="{{asset('images/new-white-logo.png')}}" class="image hamburger-mobile">
                    </a>
                </div>
            </div>
            <div>
                <a href="javascript: void(0)" class="color-white mobile-link-padding">
                    <i class="fa fa-user"></i>
                </a>
            </div>
        </div>
    </header>
    <main class="bg-white">
        <div class="mt-3">
            <div class="bg-blue-standart">
                <div class="container-fluid pt-2 pb-2">
                    <span class="color-white">Согласование АС</span>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <div class="bg-white">
                <div class="container-fluid flex-row jc-sb pt-2 pl-3 pr-3 pb-2 box-shadow">
                    <span class="blue-button matching-underline">ЛС-20-001473/19</span>
                    <span>2019-09-16</span>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <div class="bg-white">
                <div class="container-fluid flex-row pl-3 pr-3 jc-sb pt-2 pb-2 box-shadow">
                    <span class="blue-button matching-underline">ЛС-20-001473/19</span>
                    <span>2019-09-16</span>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <div class="bg-blue-standart">
                <div class="container-fluid pt-2 pb-2">
                    <span class="color-white">Обходной лист</span>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <div class="bg-white">
                <div class="container-fluid flex-row pl-3 pr-3 jc-sb pt-2 pb-2 box-shadow">
                    <span class="blue-button matching-underline">ЛС-20-001473/19</span>
                    <span>2019-09-16</span>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <div class="bg-blue-standart">
                <div class="container-fluid pt-2 pb-2">
                    <span class="color-white">Согласование административных дней</span>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <div class="bg-white">
                <div class="container-fluid flex-row pl-3 pr-3 jc-sb pt-2 pb-2 box-shadow">
                    <span class="blue-button matching-underline">ЛС-20-001473/19</span>
                    <span>2019-09-16</span>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>