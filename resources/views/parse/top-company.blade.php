<!DOCTYPE html>
<?php
use App\Http\Controllers\ParseController;
?>
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
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles_parse.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- include vue-treeselect & its styles. you can change the version tag to better suit your needs. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .valuePadding {
            border: 1px inset #000000;
        }
        .valuePadding input {
            border: none;
            padding:0px;
            outline: none;
            text-align: left;
            width: 20px;
        }
    </style>
</head>
<body>
@include('layouts.header')

<main class="flex-column pl-5 pr-5" id="app">
    <div class="bg-white pl-3 pr-3 box-shadow border-16">
        <div class="mt-2 company-pannel-small flex-row vertical-middle">
            <div class="flex-row mt-3 mb-3">
                <div class="button-accept color-white pl-3 pr-3 pt-2 pb-2 flex-column vertical-middle parse-button-top pointer">
                    <i class="fa fa-chart-pie"></i>
                    <div class="mt-1 fs-0_8">
                        Сборы
                    </div>
                </div>
                <a href="/parse/finance">
                    <div class="button-accept color-white pl-3 pr-3 pt-2 pb-2 flex-column vertical-middle parse-button-top pointer">
                        <i class="fa fa-sliders-h settings-icon-transform270"></i>
                        <div class="mt-1 fs-0_8">
                            Показатели
                        </div>
                    </div>
                </a>
                <a href="/KONKURETI">
                    <div class="button-accept color-white pl-3 pr-3 pt-2 pb-2 flex-column vertical-middle parse-button-top pointer">
                        <i class="fa fa-user-friends"></i>
                        <div class="mt-1 fs-0_8">
                            Конкуренты
                        </div>
                    </div>
                </a>
                <a href="javascript: void(0)">
                    <div class="blue-bg-all color-white pl-3 pr-3 pt-2 pb-2 flex-column vertical-middle parse-button-top pointer">
                        <i class="fa fa-filter"></i>
                        <div class="mt-1 fs-0_8">
                            Фильтр
                        </div>
                    </div>
                </a>
            </div>
            <div>
                <div class="flex-row">
                    <div class="mr-10 company-mr vertical-middle">
                        <div>
                            <select class="border-0-bottom pb-1 pointer blue-select" id="dateType" onchange="checkDateType()">
                                <option class="but_opacity" value="month" @if(($_GET['dateType'] ?? 'rise' === 'month')) selected @endif>месяц</option>
                                <option class="but_opacity" value="quarter" @if(($_GET['dateType'] ?? 'rise' === 'quarter')) selected @endif>квартал</option>
                                <option class="but_opacity" value="year" @if(($_GET['dateType'] ?? 'rise' === 'year')) selected @endif>год</option>
                                <option class="but_opacity" value="rise" @if(($_GET['dateType'] ?? 'rise' === 'rise')) selected @endif>с нарастанием</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex-row jc-sb" id="monthBlock" @if(($_GET['dateType'] ?? 'rise') == 'month' || ($_GET['dateType'] ?? 'rise') == 'rise') style="display: flex;" @else  style="display: none;"  @endif>
                        <div class="mr-4 ml-4">
                            <select id="fYear" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1 company-data-size">
                                @for($year = 2014; $year <= date('Y'); $year++)
                                    <option value="{{$year}}" @if($year == $_GET['firstYear']) selected @endif>{{$year}}</option>
                                @endfor
                            </select>
                            <select id="firstMonth" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1 company-data-size">
                                @foreach($month as $val => $key)
                                    <option value="{{$val}}" @if(($_GET['firstPeriod'] ?? '1') == $val) selected @endif>{{$key}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mr-4 ml-4">
                            <select id="sYear" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1 company-data-size">
                                @for($year = 2014; $year <= date('Y'); $year++)
                                    <option value="{{$year}}" @if($year == $_GET['secondYear']) selected @endif>{{$year}}</option>
                                @endfor
                            </select>
                            <select id="secondMonth" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1 company-data-size">
                                @foreach($month as $val => $key)
                                    <option value="{{$val}}" @if(($_GET['secondPeriod'] ?? '1') == $val) selected @endif>{{$key}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div id="yearBlock" class="jc-sb" @if(($_GET['dateType'] ?? 'rise') == 'year') style="display: flex;" @else  style="display: none;"  @endif>
                        <select id="first" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1 mr-10 company-data-size">
                            @for($year = 2014; $year < date('Y'); $year++)
                                <option value="{{$year}}" @if($year == $_GET['firstYear']) selected @endif>{{$year}}</option>
                            @endfor
                        </select>

                        <select id="second" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1 ml-10 company-data-size">
                            @for($year = 2014; $year < date('Y'); $year++)
                                <option value="{{$year}}" @if($year == $_GET['secondYear']) selected @endif>{{$year}}</option>
                            @endfor
                        </select>
                    </div>
                    <div id="quarterBlock" class="jc-sb" @if(($_GET['dateType'] ?? 'rise') == 'quarter') style="display: flex;" @else  style="display: none;"  @endif>
                        <div class="mr-10">
                            <select id="firstYear" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1 company-data-size">
                                @for($year = 2014; $year <= date('Y'); $year++)
                                    <option value="{{$year}}" @if($year == $_GET['firstYear']) selected @endif>{{$year}}</option>
                                @endfor
                            </select>
                            <select id="firstQuarter" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1 company-data-size">
                                @for($quarter = 1; $quarter <= 4; $quarter++)
                                    <option value="{{$quarter}}" @if($quarter == $_GET['firstPeriod']) selected @endif>{{$quarter}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="ml-10">
                            <select id="secondYear" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1 company-data-size">
                                @for($year = 2014; $year <= date('Y'); $year++)
                                    <option value="{{$year}}" @if($quarter == $_GET['secondYear']) selected @endif>{{$year}}</option>
                                @endfor
                            </select>
                            <select id="secondQuarter" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1 company-data-size">
                                @for($quarter = 1; $quarter <= 4; $quarter++)
                                    <option value="{{$quarter}}" @if($quarter == $_GET['secondYear']) selected @endif>{{$quarter}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-row jc-sb pt-3 pr-3 pb-4 pl-3 vertical-middle flex-row company-pannel">
            <div class="flex-row jc-sb">
                <div class="button-accept color-white pl-3 pr-3 pt-2 pb-2 flex-column vertical-middle parse-button-top pointer">
                    <i class="fa fa-chart-pie"></i>
                    <div class="mt-1 fs-0_8">
                        Сборы
                    </div>
                </div>
                <a href="/parse/finance">
                    <div class="button-accept color-white pl-3 pr-3 pt-2 pb-2 flex-column vertical-middle parse-button-top pointer">
                        <i class="fa fa-sliders-h settings-icon-transform270"></i>
                        <div class="mt-1 fs-0_8">
                            Показатели
                        </div>
                    </div>
                </a>
                <a href="/KONKURETI">
                    <div class="button-accept color-white pl-3 pr-3 pt-2 pb-2 flex-column vertical-middle parse-button-top pointer">
                        <i class="fa fa-user-friends"></i>
                        <div class="mt-1 fs-0_8">
                            Конкуренты
                        </div>
                    </div>
                </a>
            </div>
            <div>
                <div class="flex-row">
                    <div class="mr-10">
                        <div>
                            <select class="border-0-bottom pb-1 pointer blue-select" id="dateType" onchange="checkDateType()">
                                <option class="but_opacity" value="month" @if(($_GET['dateType'] ?? 'rise' === 'month')) selected @endif>месяц</option>
                                <option class="but_opacity" value="quarter" @if(($_GET['dateType'] ?? 'rise' === 'quarter')) selected @endif>квартал</option>
                                <option class="but_opacity" value="year" @if(($_GET['dateType'] ?? 'rise' === 'year')) selected @endif>год</option>
                                <option class="but_opacity" value="rise" @if(($_GET['dateType'] ?? 'rise' === 'rise')) selected @endif>с нарастанием</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex-row jc-sb" id="monthBlock" @if(($_GET['dateType'] ?? 'rise') == 'month' || ($_GET['dateType'] ?? 'rise') == 'rise') style="display: flex;" @else  style="display: none;"  @endif>
                        <div class="mr-4 ml-4">
                            <select id="fYear" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1">
                                @for($year = 2014; $year <= date('Y'); $year++)
                                    <option value="{{$year}}" @if($year == $_GET['firstYear']) selected @endif>{{$year}}</option>
                                @endfor
                            </select>
                            <select id="firstMonth" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1">
                                @foreach($month as $val => $key)
                                    <option value="{{$val}}" @if(($_GET['firstPeriod'] ?? '1') == $val) selected @endif>{{$key}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mr-4 ml-4">
                            <select id="sYear" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1">
                                @for($year = 2014; $year <= date('Y'); $year++)
                                    <option value="{{$year}}" @if($year == $_GET['secondYear']) selected @endif>{{$year}}</option>
                                @endfor
                            </select>
                            <select id="secondMonth" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1">
                                @foreach($month as $val => $key)
                                    <option value="{{$val}}" @if(($_GET['secondPeriod'] ?? '1') == $val) selected @endif>{{$key}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div id="yearBlock" class="jc-sb" @if(($_GET['dateType'] ?? 'rise') == 'year') style="display: flex;" @else  style="display: none;"  @endif>
                        <select id="first" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1 mr-10">
                            @for($year = 2014; $year < date('Y'); $year++)
                                <option value="{{$year}}" @if($year == $_GET['firstYear']) selected @endif>{{$year}}</option>
                            @endfor
                        </select>

                        <select id="second" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1 ml-10">
                            @for($year = 2014; $year < date('Y'); $year++)
                                <option value="{{$year}}" @if($year == $_GET['secondYear']) selected @endif>{{$year}}</option>
                            @endfor
                        </select>
                    </div>
                    <div id="quarterBlock" class="jc-sb" @if(($_GET['dateType'] ?? 'rise') == 'quarter') style="display: flex;" @else  style="display: none;"  @endif>
                        <div class="mr-10">
                            <select id="firstYear" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1">
                                @for($year = 2014; $year <= date('Y'); $year++)
                                    <option value="{{$year}}" @if($year == $_GET['firstYear']) selected @endif>{{$year}}</option>
                                @endfor
                            </select>
                            <select id="firstQuarter" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1">
                                @for($quarter = 1; $quarter <= 4; $quarter++)
                                    <option value="{{$quarter}}" @if($quarter == $_GET['firstPeriod']) selected @endif>{{$quarter}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="ml-10">
                            <select id="secondYear" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1">
                                @for($year = 2014; $year <= date('Y'); $year++)
                                    <option value="{{$year}}" @if($quarter == $_GET['secondYear']) selected @endif>{{$year}}</option>
                                @endfor
                            </select>
                            <select id="secondQuarter" class="border0 date-color bg-darkgray pl-4 pr-2 pt-1 pb-1">
                                @for($quarter = 1; $quarter <= 4; $quarter++)
                                    <option value="{{$quarter}}" @if($quarter == $_GET['secondYear']) selected @endif>{{$quarter}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex-row vertical-middle jc-sb">
                    <div class="mr-4 ml-4">
                        <label class="vertical-middle pointer mb-0">
                            <div class="termination-checkbox">
                                <input type="checkbox" id="termination">
                            </div>
                            <div>
                                <span class="ml-1">Расторжение</span>
                            </div>
                        </label>
                    </div>
                    <div class="mr-4 ml-4">
                        <div class="vertical-middle">
                            <div class="vertical-middle color-red pl-4 pr-4">
                        <span class="valuePadding pl-2 pr-2">
                                    <input type="number" max="100" min="0" value="{{$_GET['disc'] ?? 0}}" id="inputRRPDiscount">
                                    %
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mr-4 ml-4">
                        <div class="flex-row date-color">
                            <div onclick="load({{$_GET['productId'] ?? 0}})" class="flex-row border-gray pl-4 width-min-content pr-4 pt-1 pb-1 color-white button-accept pointer">
                                <div>
                                    <i class="fa fa-filter"></i>
                                </div>
                                <div class="ml-2">
                                    Показать
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white pl-3 pr-3 mt-3 box-shadow border-16">
        <div class="flex-row jc-sb pr-3 pl-3 vertical-middle flex-row">
            <div class="width100 table-responsive border-0">
                <table class="table table-hover parse-table-topClasses parse-table text-align-center fs-0_8 mb-0">
                    <thead>
                    <tr class="border-table-0">
                        <td colspan="2" class="text-left fs-1_3 pl-0">{{$label}}</td>
                        <td class="pt-3"><span class="pointer parse-active">Топ по компаниям</span></td>
                        <td class="pt-3"><a href="/parse/product"><span class="pointer">Топ по классам</span></a></td>
                        <td colspan="5" class="text-right border-r-top-16 pt-3">Премии <i class="fa fa-info-circle ml-3"></i></td>
                        <td></td>
                        <td colspan="5" class="text-right pt-3">Выплаты <i class="fa fa-info-circle ml-3"></i></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-left">Компания</td>
                        <td>{{$label_first}}</td>
                        <td>{{$label_second}}</td>
                        <td>Доля {{$label_first}}</td>
                        <td>Доля {{$label_second}}</td>
                        <td>Изм %</td>
                        <td>Изм сумма</td>
                        <td></td>
                        <td>{{$label_first}}</td>
                        <td>{{$label_second}}</td>
                        <td>Изм %</td>
                        <td>{{$label_first}}</td>
                        <td>{{$label_second}}</td>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $other['premium_first'] = 0;
                        $other['premium_second'] = 0;
                        $other['payout_first'] = 0;
                        $other['payout_second'] = 0;
                        $i = 0;
                    @endphp
                    @foreach($premium_first as $id => $key)
                        <tr>
                            <td><span>{{$i+1}}</span></td>
                            <td>{{$ranking[$id]}}</td>
                            <td class="text-left"><span class="bold"><a onclick="getProducts({{$id}})">{{$companyList[$id]}}</a></span></td>
                            <td>{{number_format($key, 0, '.', ' ')}}</td>
                            <td>{{number_format($premium_second[$id],0,  '.', ' ')}}</td>
                            <td>{{$controller->getPercentOfMarker($key, array_sum($premium_first))}}</td>
                            <td>{{$controller->getPercentOfMarker($premium_second[$id], array_sum($premium_second))}}</td>
                            <td>{{$controller->getChangedVal($key, $premium_second[$id])}}</td>
                            <td>{{number_format($key - $premium_second[$id], 0, '.', ' ') }}</td>
                            <td></td>
                            <td>{{number_format($payout_first[$id], 0, '.', ' ')}}</td>
                            <td>{{number_format($payout_second[$id], 0, '.', ' ')}}</td>
                            <td>{{$controller->getChangedVal($payout_first[$id], $payout_second[$id])}}</td>
                            <td>{{$controller->getPayoutChange($payout_first[$id], $premium_first[$id])}}</td>
                            <td>{{$controller->getPayoutChange($payout_second[$id], $premium_second[$id])}}</td>
                        </tr>
                        @if($i>=10)
                            @php
                                $other['premium_first'] += $premium_first[$id];
                                $other['premium_second'] += $premium_second[$id];
                                $other['payout_first'] += $payout_first[$id];
                                $other['payout_second'] += $payout_second[$id];
                            @endphp
                        @endif
                        @php $i++; @endphp
                    @endforeach
                    <tr>
                        <td><span></span></td>
                        <td><span></span></td>
                        <td><span class="bold">Итого</span></td>
                        <td>{{number_format(array_sum($premium_first), 0, '.', ' ')}}</td>
                        <td>{{number_format(array_sum($premium_second), 0, '.', ' ')}}</td>
                        <td></td>
                        <td></td>
                        <td>{{$controller->getChangedVal(array_sum($premium_first), array_sum($premium_second))}}</td>
                        <td>{{number_format(array_sum($premium_first)-array_sum($premium_second), 0, '.', ' ')}}</td>
                        <td></td>
                        <td>{{number_format(array_sum($payout_first), 0, '.', ' ')}}</td>
                        <td>{{number_format(array_sum($payout_second), 0, '.', ' ')}}</td>
                        <td>{{$controller->getChangedVal(array_sum($payout_first), array_sum($payout_second))}}</td>
                        <td>{{$controller->getPayoutChange(array_sum($payout_first), array_sum($premium_first))}}</td>
                        <td>{{$controller->getPayoutChange(array_sum($payout_second), array_sum($premium_second))}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-5">	<!--Гугл графики-->
        <div class="col-12 row">
            <div class="col-md-6 col-lg-6">
                <div id="pieFirst" style="width: 100%; height: 500px;"></div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div id="pieSecond" style="width: 100%; height: 500px;"></div>
            </div>
        </div>
        <div class="col-12 row">
            <div class="col-12">
                <div id="chart_div" style="height: 500px; width: 100%;"></div>
            </div>
        </div>
    </div>
</main>
</body>
<script>
    function load(id) {
        var firstYear, firstPeriod, secondYear, secondPeriod;
        var dateType = document.getElementById('dateType').value;
        if(dateType === 'year'){
            firstYear = document.getElementById('first').value;
            secondYear = document.getElementById('second').value;
            firstPeriod = 0;
            secondPeriod = 0;
        } else  if(dateType === 'quarter'){
            firstYear = document.getElementById('firstYear').value;
            secondYear = document.getElementById('secondYear').value;
            firstPeriod = document.getElementById('firstQuarter').value;
            secondPeriod = document.getElementById('secondQuarter').value;
        } else {
            firstYear = document.getElementById('fYear').value;
            secondYear = document.getElementById('sYear').value;
            firstPeriod = document.getElementById('firstMonth').value;
            secondPeriod = document.getElementById('secondMonth').value;
        }

        var disc = 0;
        if (document.getElementById('termination')){
            disc = document.getElementById('inputRRPDiscount').value;
        }
        firstPeriod = parseInt(firstPeriod);
        secondPeriod = parseInt(secondPeriod);
        location.href = '?dateType=' + dateType +
            '&firstPeriod=' + firstPeriod + '&secondPeriod=' + secondPeriod +
            '&firstYear=' + firstYear + '&secondYear=' + secondYear +
            '&productId=' + id + '&disc=' + disc;
    }
    function getProducts(id) {
        var firstYear, firstPeriod, secondYear, secondPeriod;
        var dateType = document.getElementById('dateType').value;
        if(dateType === 'year'){
            firstYear = document.getElementById('first').value;
            secondYear = document.getElementById('second').value;
            firstPeriod = 0;
            secondPeriod = 0;
        } else  if(dateType === 'quarter'){
            firstYear = document.getElementById('firstYear').value;
            secondYear = document.getElementById('secondYear').value;
            firstPeriod = document.getElementById('firstQuarter').value;
            secondPeriod = document.getElementById('secondQuarter').value;
        } else {
            firstYear = document.getElementById('fYear').value;
            secondYear = document.getElementById('sYear').value;
            firstPeriod = document.getElementById('firstMonth').value;
            secondPeriod = document.getElementById('secondMonth').value;
        }

        var disc = 0;
        if (document.getElementById('termination')){
            disc = document.getElementById('inputRRPDiscount').value;
        }
        firstPeriod = parseInt(firstPeriod);
        secondPeriod = parseInt(secondPeriod);
        location.href = '/parse/product?dateType=' + dateType +
            '&firstPeriod=' + firstPeriod + '&secondPeriod=' + secondPeriod +
            '&firstYear=' + firstYear + '&secondYear=' + secondYear +
            '&companyId=' + id + '&disc=' + disc;
    }
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawMultSeries);
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawPieSecond);
    function drawMultSeries() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Наименование');
        data.addColumn('number', 'Сборы {{$label_first}}');
        data.addColumn('number', 'Выплаты {{$label_first}}');
        data.addColumn('number', 'Сборы {{$label_second}}');
        data.addColumn('number', 'Выплаты {{$label_second}}');
        <?php $i = 0;?>
        @foreach($premium_first as $id=>$val)
        @if($i<10)
            data.addRow(['{{$companyList[$id]}}', parseInt('{{$val}}'), parseInt('{{$payout_first[$id]}}'), parseInt('{{$premium_second[$id]}}'), parseInt('{{$payout_second[$id]}}')]);
        @endif
        <?php $i++;?>
        @endforeach
            data.addRow(['Другие СК', parseInt('{{$other['premium_first']}}'), parseInt('{{$other['payout_first']}}'),
            parseInt('{{$other['premium_second']}}'), parseInt('{{$other['payout_second']}}')]);
        var options = {
            title : "Динамика рынка",
            colors: [
                '#4889f9',
                '#ff2323',
                '#2e9cea',
                '#ff4c4c'
            ],
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('chart_div'));

        chart.draw(data, options);
    }
    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Рынок');
        data.addColumn('number', 'Доля');
        <?php $i = 0;?>
        @foreach($premium_first as $id=>$val)
        @if($i<10)
        data.addRow(['{{$companyList[$id]}}', parseInt('{{$val}}')]);
        @endif
        <?php $i++;?>
        @endforeach
        data.addRow(['Другие СК', parseInt('{{$other['premium_first']}}')]);
        var options = {
            title: 'Доля рынка за {{$label_first}}',
            pieHole: 0.5,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pieFirst'));
        chart.draw(data, options);
    }
    function drawPieSecond() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Рынок');
        data.addColumn('number', 'Доля');
        <?php $i = 0;?>
        @foreach($premium_second as $id=>$val)
        @if($i<10)
        data.addRow(['{{$companyList[$id]}}', parseInt('{{$val}}')]);
        @endif
        <?php $i++;?>
        @endforeach
        data.addRow(['Другие СК', parseInt('{{$other['premium_second']}}')]);
        var options = {
            title: 'Доля рынка за {{$label_second}}',
            pieHole: 0.5,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pieSecond'));
        chart.draw(data, options);
    }
</script>
<style>
    .parse-table thead tr:nth-of-type(1) td:nth-of-type(5){
        background: #eaeff3;
        width: 1px !important;
    }
    .parse-table thead tr:nth-of-type(2) td:nth-of-type(10){
        background: #eaeff3;
        width: 1px !important;
    }
    .parse-table tbody tr td:nth-of-type(10){
        background: #eaeff3;
        width: 1px;
    }
    .parse-table tbody tr td:nth-of-type(1){
        width: 1px;
        padding: 3px !important;
    }
    .parse-table tbody tr td:nth-of-type(2){
        width: 1px;
        padding: 3px !important;
    }
    .parse-table tbody tr td:nth-of-type(3){
        width: 1px;
        padding: 5px !important;
    }
</style>
</html>