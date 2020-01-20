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

    <script type="text/javascript" src="https://www.gstatic.com/firebasejs/3.6.8/firebase.js"></script>
    <script type="text/javascript" src="{{asset('firebase_subscribe.js')}}"></script>

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
    <header class="bg-color-blue color-white fs-1_3" id="header">
        <div class="container-fluid flex-row jc-sb vertical-middle pt-3 pb-3">
            <div>
                <a href="javascript: void(0)" class="color-white mobile-link-padding">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div>
                <div class="mobile-centras-logo">
                    <a href="{{route('index')}}">
                        <img src="{{asset('images/new-white-logo.png')}}" class="image">
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
    <main class="bg-parse">
        <div>
            <div class="bg-blue-standart pt-3">
                <div class="bg-white">
                    <div class="relative container-fluid flex-row pt-1 pb-1 color-blue">
                        <div class="absolute"><i class="far fs-1_5 fa-arrow-alt-circle-left"></i></div>
                        <a href="kupipolis.kz" class="jc-center flex-row width100 color-blue">
                            <div class="fs-1_1">Согласование АС</div>
                        </a>
                    </div>
                </div>
                <div class="flex-column">
                    <div class="bg-blue-standart matching-border pt-3">
                        <div class="container-fluid jc-sb flex-row color-white pb-2">
                            <div class="width50">
                                <strong>Номер</strong>
                            </div>
                            <div class="width50">
                                ЛС-4445444555646
                            </div>
                        </div>
                    </div>
                    <div class="bg-blue-standart matching-border pt-2">
                        <div class="container-fluid jc-sb flex-row color-white pb-2">
                            <div class="width50">
                                <strong>Дата</strong>
                            </div>
                            <div class="width50">
                                12-09-2019
                            </div>
                        </div>
                    </div>
                    <div class="bg-blue-standart matching-border pt-2 mb-4">
                        <div class="container-fluid jc-sb flex-row color-white pb-2">
                            <div class="width50">
                                <strong>Инициатор</strong>
                            </div>
                            <div class="width50">
                                Андеррайтер Департамента андеррайтинга Сазазова Екатерина Александровна
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white">
                <div>
                    <div class="table-responsive width100">
                        <table class="table table-striped-white-blue mobile-matching-active-table-contain table-striped text-align-center">
                            <thead>
                            <tr class="color-blue bg-white">
                                <th colspan="2">Дополнительные сведения</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="color-blue">
                                <td><strong>Подразделение</strong></td>
                                <td><strong>Департамент перестрахования</strong></td>
                            </tr>
                            <tr>
                                <td>Страхователь</td>
                                <td>ТОО Хайвис Курылыс</td>
                            </tr>
                            <tr>
                                <td>Перестрахователь</td>
                                <td>АО "СК "Казахмыс"</td>
                            </tr>
                            <tr>
                                <td>Выгодоприобретатель</td>
                                <td>ТОО "НАУЧНЫЙ ОЗДОРОВИТЕЛЬНЫЙ КОМПЛЕКС"</td>
                            </tr>
                            <tr>
                                <td>Вид страхования</td>
                                <td>РЕ ДС СМР</td>
                            </tr>
                            <tr>
                                <td>Статус</td>
                                <td>Первичная</td>
                            </tr>
                            <tr class="mobile-matching-active-table">
                                <td>Страховые случаи</td>
                                <td>Авария при проведении СМР, Затопления водой из водопровода</td>
                            </tr>
                            <tr>
                                <td>Территория страхования</td>
                                <td>Республика Казахстан</td>
                            </tr>
                            <tr>
                                <td>Страховая сумма</td>
                                <td>55505030503 <span>тенге</span></td>
                            </tr>
                            <tr>
                                <td>Доля перестрахователя</td>
                                <td>%</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    <div class="ml-4 mr-4">
                        <textarea class="resize modal-textarea-comment width100" rows="3" disabled="disabled"></textarea>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="bg-blue-standart">
                        <div class="container-fluid pt-2 pb-2 jc-center fs-1_2">
                            <span class="color-white">Документы</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="jc-center flex-column vertical-middle pt-3 pb-3">
                        <div class="flex-row attachment-bg mt-2 mb-2">
                            <div class="attachment-border pt-2 pr-4 pb-2 pl-4">
                                <i class="fas fa-paperclip color-blue-standart fs-1_4 rotate-45"></i>
                            </div>
                            <div class="pl-5 pr-5 text-dec-underline pointer pt-2 pb-2">
                                <a href="javascript:void(0)" class="color-dimgray">Справка МЮ.jpg</a>
                            </div>
                        </div>
                        <div class="flex-row attachment-bg mt-2 mb-2">
                            <div class="attachment-border pt-2 pr-4 pb-2 pl-4">
                                <i class="fas fa-paperclip color-blue-standart fs-1_4 rotate-45"></i>
                            </div>
                            <div class="pl-5 pr-5 text-dec-underline pointer pt-2 pb-2">
                                <a href="javascript:void(0)" class="color-dimgray">Справка МЮ.jpg</a>
                            </div>
                        </div>
                        <div class="flex-row attachment-bg mt-2 mb-2">
                            <div class="attachment-border pt-2 pr-4 pb-2 pl-4">
                                <i class="fas fa-paperclip color-blue-standart fs-1_4 rotate-45"></i>
                            </div>
                            <div class="pl-5 pr-5 text-dec-underline pointer pt-2 pb-2">
                                <a href="javascript:void(0)" class="color-dimgray">Справка МЮ.jpg</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="bg-blue-standart">
                        <div class="container-fluid pt-2 pb-2 jc-center fs-1_2">
                            <span class="color-white">Примечание</span>
                        </div>
                    </div>
                </div>
                <div class="matching-note-border">
                    <div>
                        <div>
                            <div class="ml-4 mr-4 mt-4">
                                <textarea class="resize modal-textarea-comment-solid width100" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="pl-4">
                            <div class="flex-row pb-4 pr-4 pointer">
                                <div title="Согласовать" class="vertical-middle button-accept color-white-standart matching-buttons width100 jc-center pl-4 pr-4 pt-1 pb-1">
                                    <i class="far fa-check-circle"></i>
                                </div>
                            </div>
                            <div class="flex-row pb-4 pr-4 pointer">
                                <div title="Согласовать" class="vertical-middle button-cancel color-white-standart matching-buttons width100 jc-center pl-4 pr-4 pt-1 pb-1">
                                    <i class="far fa-times-circle"></i>
                                </div>
                            </div>
                            <div class="flex-row pb-4 pr-4 pointer">
                                <div title="Согласовать" class="vertical-middle button-neutral matching-buttons width100 jc-center pl-4 pr-4 pt-1 pb-1">
                                    <i class="far fa-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ml-4 mr-4 mt-3">
{{--                    <div>--}}
{{--                        <div class="mobile-matching-second-table-contain box-shadow">--}}
{{--                            <div class="flex-row pl-3 pr-3 color-blue jc-sb table-striped-custom pt-2 pb-2">--}}
{{--                                <div>Иванов Иван</div>--}}
{{--                                <div><i class="fas fa-chevron-up"></i></div>--}}
{{--                            </div>--}}
{{--                            <div class="mb-2">--}}
{{--                                <div class="table-responsive width100">--}}
{{--                                    <table class="dosier-table color-blue mobile-matching-second-table-contain box-shadow table text-align-center mb-0">--}}
{{--                                        <tbody>--}}
{{--                                        <tr>--}}
{{--                                            <td>Виза</td>--}}
{{--                                            <td><i class="far fa-check-circle green-button"></i></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Дата</td>--}}
{{--                                            <td>20-10-2019</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>Подразделение</td>--}}
{{--                                            <td>Управление управления</td>--}}
{{--                                        </tr>--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <div class="flex-row pl-3 pr-3 pt-2 pb-2 box-shadow jc-sb table-striped-custom">--}}
{{--                                <div>Иванов Иван</div>--}}
{{--                                <div><i class="far fa-check-circle green-button"></i></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <div class="flex-row pl-3 pr-3 pt-2 pb-2 mt-1 mb-5 box-shadow jc-sb table-striped-custom">--}}
{{--                                <div>Иванов Иван</div>--}}
{{--                                <div><i class="far fa-check-circle green-button"></i></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <test></test>--}}
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>