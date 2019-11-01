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

{{--    Chart js--}}
{{--    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>--}}
{{--    <script type="text/javascript">--}}
{{--        google.charts.load("current", {packages:["corechart"]});--}}
{{--        google.charts.setOnLoadCallback(drawChart);--}}
{{--        function drawChart() {--}}
{{--            var data = google.visualization.arrayToDataTable([--}}
{{--                ['Task', 'Hours per Day'],--}}
{{--                ['Евразия',     31],--}}
{{--                ['Халык',      21],--}}
{{--                ['НОМАД',  13],--}}
{{--                ['Сентрас Иншуранс', 17],--}}
{{--            ]);--}}

{{--            var options = {--}}
{{--                title: 'Доля рынка за Авг 2019',--}}
{{--                pieHole: 0.6,--}}
{{--            };--}}

{{--            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));--}}
{{--            chart.draw(data, options);--}}
{{--        }--}}
{{--    //--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        google.charts.load("current", {packages:["corechart"]});--}}
{{--        google.charts.setOnLoadCallback(drawChart);--}}
{{--        function drawChart() {--}}
{{--            var data = google.visualization.arrayToDataTable([--}}
{{--                ['Task', 'Hours per Day'],--}}
{{--                ['Евразия',     31],--}}
{{--                ['Халык',      21],--}}
{{--                ['НОМАД',  13],--}}
{{--                ['Сентрас Иншуранс', 17],--}}
{{--            ]);--}}

{{--            var options = {--}}
{{--                title: 'Доля рынка за Авг 2019',--}}
{{--                pieHole: 0.6,--}}
{{--            };--}}

{{--            var chart = new google.visualization.PieChart(document.getElementById('donutchartsecond'));--}}
{{--            chart.draw(data, options);--}}
{{--        }--}}
{{--    </script>--}}

    <!-- include vue-treeselect & its styles. you can change the version tag to better suit your needs. -->
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
</head>
<body>
@include('layouts.header')

<main class="bg-parse">
    <div class="main_padding width100 pt-4" id="app">
        <div class="bg-white pl-3 pr-3 box-shadow border-16">
            <div class="flex-row jc-sb pt-3 pr-3 pb-4 pl-3 vertical-middle flex-row">
                <div class="flex-row jc-sb">
                    <div class="button-accept color-white pl-3 pr-3 pt-2 pb-2 flex-column vertical-middle parse-button-top pointer">
                        <i class="fa fa-chart-pie"></i>
                        <div class="mt-1 fs-0_8">Сборы</div>
                    </div>
                    <div class="button-accept color-white pl-3 pr-3 pt-2 pb-2 flex-column vertical-middle parse-button-top pointer">
                        <i class="fa fa-sliders-h settings-icon-transform270"></i>
                        <div class="mt-1 fs-0_8">Показатели</div>
                    </div>
                    <div class="button-accept color-white pl-3 pr-3 pt-2 pb-2 flex-column vertical-middle parse-button-top pointer">
                        <i class="fa fa-user-friends"></i>
                        <div class="mt-1 fs-0_8">Конкуренты</div>
                    </div>
                </div>
                <div>
                    <div class="flex-row jc-sb">
                        <div class="test">
                            <input type="date" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1" value="2019-01-01">
                        </div>
                        <div class="test">
                            <input type="date" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1" value="2019-01-01">
                        </div>
                        <div class="test">
                            <div class="flex-row date-color">
                                <div class="flex-row border-gray pl-4 width-min-content pr-4 pt-1 pb-1 color-white button-accept pointer">
                                    <div><i class="fa fa-eye"></i></div>
                                    <div class="ml-2">Показать</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex-row vertical-middle jc-sb">
                        <div class="test">
                            <label class="vertical-middle pointer mb-0">
                                <div class="termination-checkbox">
                                    <input type="checkbox" id="termination">
                                </div>
                                <div>
                                    <span class="ml-1">Расторжение</span>
                                </div>
                            </label>
                        </div>
                        <div class="test">
                            <div class="vertical-middle">
                                <div class="vertical-middle border-black color-red pl-4 pr-4">
                                    <span class="fs-1_2 pb-1">0 %</span>
                                </div>
                            </div>
                        </div>
                        <div class="test">
                            <div>
                                <select class="border-0-bottom pb-1 pointer">
                                    <option selected disabled class="none">С нарастанием</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white pl-3 pr-3 mt-3 box-shadow border-16">
            <div class="flex-row jc-sb pr-3 pl-3 vertical-middle flex-row">
                <div class="width100">
                    <table class="table table-hover parse-table text-align-center fs-0_8 mb-0">
                        <thead>
                            <tr class="border-table-0">
                                <td class="text-left fs-1_3 pl-0">Рынок</td>
                                <td class="pt-3"><span class="pointer">Топ по компаниям</span></td>
                                <td class="pt-3"><span class="pointer">Топ по классам</span></td>
                                <td colspan="6" class="text-right border-r-top-16 pt-3">Премии <i class="fa fa-info-circle ml-3"></i></td>
                                <td></td>
                                <td colspan="5" class="text-right pt-3">Выплаты <i class="fa fa-info-circle ml-3"></i></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>№</td>
                                <td>Компания</td>
                                <td>Авг 2019</td>
                                <td>Авг 2018</td>
                                <td>Доля Авг 2019</td>
                                <td>Доля Авг 2018</td>
                                <td>Изм %</td>
                                <td>Изм сумма</td>
                                <td></td>
                                <td>Авг 2019</td>
                                <td>Авг 2018</td>
                                <td>Изм %</td>
                                <td>Авг 2019</td>
                                <td>Авг 2018</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span>1</span></td>
                                <td>1</td>
                                <td>Евразия</td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>71 280 655</td>
                                <td></td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                                <td>0%</td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                            </tr>
                            <tr>
                                <td><span>2</span></td>
                                <td>2</td>
                                <td>Халык</td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>71 280 655</td>
                                <td></td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                                <td>0%</td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                            </tr>
                            <tr>
                                <td><span>3</span></td>
                                <td>3</td>
                                <td>НОМАД</td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>71 280 655</td>
                                <td></td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                                <td>0%</td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                            </tr>
                            <tr>
                                <td><span>4</span></td>
                                <td>4</td>
                                <td>Казахмыс</td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>71 280 655</td>
                                <td></td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                                <td>0%</td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                            </tr>
                            <tr class="parse-centras-active">
                                <td><span>5</span></td>
                                <td>5</td>
                                <td>Сентрас Иншуранс</td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>71 280 655</td>
                                <td></td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                                <td>0%</td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                            </tr>
                            <tr>
                                <td><span>6</span></td>
                                <td>6</td>
                                <td>Коммеск</td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>71 280 655</td>
                                <td></td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                                <td>0%</td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                            </tr>
                            <tr>
                                <td><span>7</span></td>
                                <td>7</td>
                                <td>НСК</td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>71 280 655</td>
                                <td></td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                                <td>0%</td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                            </tr>
                            <tr>
                                <td><span>8</span></td>
                                <td>8</td>
                                <td>ИНТЕРТИЧ</td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>71 280 655</td>
                                <td></td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                                <td>0%</td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                            </tr>
                            <tr>
                                <td><span>9</span></td>
                                <td>9</td>
                                <td>Amanat</td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>71 280 655</td>
                                <td></td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                                <td>0%</td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                            </tr>
                            <tr>
                                <td><span>10</span></td>
                                <td>10</td>
                                <td>Лондон-Алматы</td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>71 280 655</td>
                                <td></td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                                <td>0%</td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="bold fs-0_9">Итого</td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                                <td>100%</td>
                                <td>100%</td>
                                <td>100%</td>
                                <td>71 280 655</td>
                                <td></td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                                <td>100%</td>
                                <td>71 280 655</td>
                                <td>71 280 655</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
{{--        Template start          --}}
                    <parse-charts></parse-charts>
{{--        Template end--}}
    </div>
</main>
{{--@include('layouts.parse.header')--}}
</body>
</html>