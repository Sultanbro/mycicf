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

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

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
<div id="app" class="modal-open">
    @include('layouts.header')
    <main>
        <div class="flex-column">
            <div class="bg-blue-standart mt-1">
                <div class="container-fluid jc-sb vertical-middle">
                    <span class="color-white fs-1_6 mb-1">Друзья</span>
                    <span data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-sliders-h color-white"></i></span>
                </div>
            </div>
            <div class="friends-settings collapse" id="collapseExample">
                <div class="container-fluid flex-column jc-sb">
                    <div class="colleagues-input-contain flex-row vertical-middle mt-3 width100">
                        <input type="text" class="friends-settings pt-2 pb-2 border0 width100" placeholder="Поиск">
                        <span class="pt-2 pb-2 pl-3 pr-3" onclick="alert('qweqwe')"><i class="fa fa-search color-blue"></i></span>
                    </div>
                    <div class="mt-4">
                        <select class="colleagues-select color-blue fs-0_8 pt-1 pb-1 pl-2 pr-5">
                            <option selected>Управление Маркетинга</option>
                            <option>Управление Программирования</option>
                        </select>
                    </div>
                    <div class="color-white mt-4 mb-4 flex-row vertical-middle button-accept fit pt-1 pb-1 pl-4 pr-4 border-8">
                        <span><i class="fa fa-filter"></i></span>
                        <span class="ml-2">Показать</span>
                    </div>
                </div>
            </div>
            <div class="bg-white">
                <div class="container-fluid mt-5 flex-column">
                    <div class="flex-row vertical-middle">
                        <div>
                            <img src="images/avatar.png" class="image-circle-add-post">
                        </div>
                        <div class="flex-column ml-4 mb-1">
                            <span>Канат Исраилов</span>
                            <span class="fs-0_8 color-blue-name bold">Начальник</span>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-5 flex-column">
                    <div class="flex-row vertical-middle">
                        <div>
                            <img src="images/avatar.png" class="image-circle-add-post">
                        </div>
                        <div class="flex-column ml-4 mb-1">
                            <span>Айгерим Мекенова</span>
                            <span class="fs-0_8 color-blue-name bold">Digital менедежер</span>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-5 flex-column">
                    <div class="flex-row vertical-middle">
                        <div>
                            <img src="images/avatar.png" class="image-circle-add-post">
                        </div>
                        <div class="flex-column ml-4 mb-1">
                            <span>Анастасия Ню</span>
                            <span class="fs-0_8 color-blue-name bold">PR менеджер</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="container-fluid justify-content-end flex-row mt-5 slideDown">
            <i class="fas fa-frog"></i>
        </div>
    </footer>
</div>
</body>
</html>