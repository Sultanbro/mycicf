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
        <div class="flex-row jc-sb pt-3 pr-3 pb-4 pl-3 vertical-middle flex-row">
            <div class="flex-row jc-sb">
                <a href="/parse">
                    <div class="button-accept color-white pl-3 pr-3 pt-2 pb-2 flex-column vertical-middle parse-button-top pointer">
                        <i class="fa fa-chart-pie"></i>
                        <div class="mt-1 fs-0_8">
                            Сборы
                        </div>
                    </div>
                </a>
                <!--div class="button-accept color-white pl-3 pr-3 pt-2 pb-2 flex-column vertical-middle parse-button-top pointer">
                    <i class="fa fa-sliders-h settings-icon-transform270"></i>
                    <div class="mt-1 fs-0_8">
                        Показатели
                    </div>
                </div-->
                {{--<div class="button-accept color-white pl-3 pr-3 pt-2 pb-2 flex-column vertical-middle parse-button-top pointer">--}}
                {{--<i class="fa fa-user-friends"></i>--}}
                {{--<div class="mt-1 fs-0_8">--}}
                {{--Конкуренты--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>
            <div>
                <div class="flex-row">
                    <div class="flex-row jc-sb">
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
                    <div class="mr-4 ml-4">
                        <div class="flex-row date-color">
                            <div onclick="load()" class="flex-row border-gray pl-4 width-min-content pr-4 pt-1 pb-1 color-white button-accept pointer">
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
            <div>
                <div class="flex-row vertical-middle jc-sb">
                    <div class="mr-4 ml-4">
                        <div>
                            <select class="border-0-bottom pb-1 pointer" id="dateType" onchange="checkDateType()">
                                <option class="but_opacity" value="month" @if(($_GET['dateType'] ?? 'rise' === 'month')) selected @endif>месяц</option>
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
                <table class="table table-hover parse-table-topClasses parse-table text-align-center fs-0_8 mb-0">
                    <thead>
                    <tr class="border-table-0">
                        <td></td>
                        <td colspan="3" class="text-right border-r-top-16 pt-3">Активы</td>
                        <td colspan="3" class="text-right border-r-top-16 pt-3">Резервы</td>
                        <td colspan="3" class="text-right border-r-top-16 pt-3">Капитал</td>
                        <td colspan="3" class="text-right border-r-top-16 pt-3">Нетто сборы</td>
                        <td colspan="3" class="text-right border-r-top-16 pt-3">Нетто выплаты</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>{{$label_first}}</td>
                        <td>{{$label_second}}</td>
                        <td>%изм</td>
                        <td>{{$label_first}}</td>
                        <td>{{$label_second}}</td>
                        <td>%изм</td>
                        <td>{{$label_first}}</td>
                        <td>{{$label_second}}</td>
                        <td>%изм</td>
                        <td>{{$label_first}}</td>
                        <td>{{$label_second}}</td>
                        <td>%изм</td>
                        <td>{{$label_first}}</td>
                        <td>{{$label_second}}</td>
                        <td>%изм</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($result as $id => $val)
                        <tr>
                            <td>{{$companyList[$id]}}</td>
                            <td>{{number_format($result[$id]['assets_first'], 0, '.', ' ')}}</td>
                            <td>{{number_format($result[$id]['assets_second'], 0, '.', ' ')}}</td>
                            <td>{{$controller->getChangedValFinance($result[$id]['assets_first'], $result[$id]['assets_second'])}}</td>
                            <td>{{number_format($result[$id]['reserves_first'], 0, '.', ' ')}}</td>
                            <td>{{number_format($result[$id]['reserves_second'], 0, '.', ' ')}}</td>
                            <td>{{$controller->getChangedValFinance($result[$id]['reserves_first'], $result[$id]['reserves_second'])}}</td>
                            <td>{{number_format($result[$id]['capital_first'], 0, '.', ' ')}}</td>
                            <td>{{number_format($result[$id]['capital_second'], 0, '.', ' ')}}</td>
                            <td>{{$controller->getChangedValFinance($result[$id]['capital_first'], $result[$id]['capital_second'])}}</td>
                            <td>{{number_format($result[$id]['premium_first'], 0, '.', ' ')}}</td>
                            <td>{{number_format($result[$id]['premium_second'], 0, '.', ' ')}}</td>
                            <td>{{$controller->getChangedValFinance($result[$id]['premium_first'], $result[$id]['premium_second'])}}</td>
                            <td>{{number_format($result[$id]['payout_first'], 0, '.', ' ')}}</td>
                            <td>{{number_format($result[$id]['payout_second'], 0, '.', ' ')}}</td>
                            <td>{{$controller->getChangedValFinance($result[$id]['payout_first'], $result[$id]['payout_second'])}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
</script>
</html>