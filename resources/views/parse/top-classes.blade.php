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
    <script src="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.3.0/dist/vue-treeselect.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.3.0/dist/vue-treeselect.min.css">

    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>

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
                {{--<div class="button-accept color-white pl-3 pr-3 pt-2 pb-2 flex-column vertical-middle parse-button-top pointer">--}}
                    {{--<i class="fa fa-user-friends"></i>--}}
                    {{--<div class="mt-1 fs-0_8">--}}
                        {{--Конкуренты--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
            <div>
                <div class="flex-row">
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
                        <div>
                            <select class="border-0-bottom pb-1 pointer" id="dateType" onchange="checkDateType()">
                                <option class="but_opacity" value="month" @if(($_GET['dateType'] ?? 'rise' === 'month')) selected @endif>месяц</option>
                                <option class="but_opacity" value="quarter" @if(($_GET['dateType'] ?? 'rise' === 'quarter')) selected @endif>квартал</option>
                                <option class="but_opacity" value="year" @if(($_GET['dateType'] ?? 'rise' === 'year')) selected @endif>год</option>
                                <option class="but_opacity" value="rise" @if(($_GET['dateType'] ?? 'rise' === 'rise')) selected @endif>с нарастанием</option>
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
                        <td class="text-left fs-1_3 pl-0">{{$label}}</td>
                        <td class="pt-3"><span href="/parse/company" class="pointer">Топ по компаниям</span></td>
                        <td class="pt-3"><span class="pointer parse-active">Топ по классам</span></td>
                        <td colspan="4" class="text-right border-r-top-16 pt-3">Премии <i class="fa fa-info-circle ml-3"></i></td>
                        <td></td>
                        <td colspan="5" class="text-right pt-3">Выплаты <i class="fa fa-info-circle ml-3"></i></td>
                    </tr>
                    <tr>
                        <td>Класс страхования</td>
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
                    @foreach($insuranceClassList as $id => $key)
                        <tr>
                            <td><strong><a onclick="getCompaniesByClass({{$id}})">{{$controller->getNameByClassId($id)}}</a></strong></td>
                            <td>{{number_format($class_sum[$id]['premium_first'], 0, '.', ' ')}}</td>
                            <td>{{number_format($class_sum[$id]['premium_second'], 0, '.', ' ')}}</td>
                            <td>{{$controller->getPercentOfMarker($class_sum[$id]['premium_first'], array_sum($premium_first))}}</td>
                            <td>{{$controller->getPercentOfMarker($class_sum[$id]['premium_second'], array_sum($premium_second))}}</td>
                            <td>{{$controller->getChangedVal($class_sum[$id]['premium_first'], $class_sum[$id]['premium_second'])}}%</td>
                            <td>{{number_format($class_sum[$id]['premium_second'] - $class_sum[$id]['premium_first'], 0, '.', ' ') }}</td>
                            <td></td>
                            <td>{{number_format($class_sum[$id]['payout_first'], 0, '.', ' ')}}</td>
                            <td>{{number_format($class_sum[$id]['payout_second'], 0, '.', ' ')}}</td>
                            <td>{{$controller->getChangedVal($class_sum[$id]['payout_first'],$class_sum[$id]['payout_second'])}}%</td>
                            <td>{{$controller->getPayoutChange($class_sum[$id]['payout_first'], $class_sum[$id]['premium_second'])}}</td>
                            <td>{{$controller->getPayoutChange($class_sum[$id]['payout_second'], $class_sum[$id]['premium_second'])}}</td>
                        </tr>
                        @foreach($premium_first as $product_id => $value)
                            @if(in_array($product_id, $insuranceClassList[$id]))
                                <tr>
                                    <td><a  onclick="getCompaniesByProduct({{$product_id}})">{{$productList[$product_id]}}</a></td>
                                    <td>{{number_format($premium_first[$product_id], 0, '.', ' ')}}</td>
                                    <td>{{number_format($premium_second[$product_id], 0, '.', ' ')}}</td>
                                    <td>{{$controller->getPercentOfMarker($premium_first[$product_id], array_sum($premium_first))}}</td>
                                    <td>{{$controller->getPercentOfMarker($premium_second[$product_id], array_sum($premium_second))}}</td>
                                    <td>{{$controller->getChangedVal($premium_first[$product_id], $premium_second[$product_id])}}</td>
                                    <td>{{number_format($premium_first[$product_id] - $premium_second[$product_id], 0, '.', ' ') }}</td>
                                    <td></td>
                                    <td>{{number_format($payout_first[$product_id], 0, '.', ' ')}}</td>
                                    <td>{{number_format($payout_second[$product_id], 0, '.', ' ')}}</td>
                                    <td>{{$controller->getChangedVal($payout_first[$product_id], $payout_second[$product_id])}}</td>
                                    <td>{{$controller->getPayoutChange($payout_first[$product_id], $premium_first[$product_id])}}</td>
                                    <td>{{$controller->getPayoutChange($payout_second[$product_id], $premium_second[$product_id])}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    <tr>
                        <td class="bold fs-0_9">Итого</td>
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
        location.href = '/parse/product?dateType='+dateType+
            '&firstPeriod='+firstPeriod+'&secondPeriod='+secondPeriod+
            '&firstYear='+firstYear+'&secondYear='+secondYear+
            '&companyId='+id+'&disc='+disc;
        console.log(a);
    }
    function getCompaniesByClass(id) {
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
        if (document.getElementById('termination').checked){
            disc = document.getElementById('inputRRPDiscount').value;
        }
        firstPeriod = parseInt(firstPeriod);
        secondPeriod = parseInt(secondPeriod);
        location.href = '/parse/company?dateType=' + dateType +
            '&firstPeriod=' + firstPeriod + '&secondPeriod=' + secondPeriod +
            '&firstYear=' + firstYear + '&secondYear=' + secondYear +
            '&classId=' + id + '&disc=' + disc;
    }
    function getCompaniesByProduct(id) {
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
        if (document.getElementById('termination').checked){
            disc = document.getElementById('inputRRPDiscount').value;
        }
        firstPeriod = parseInt(firstPeriod);
        secondPeriod = parseInt(secondPeriod);
        location.href = '/parse/company?dateType=' + dateType +
            '&firstPeriod=' + firstPeriod + '&secondPeriod=' + secondPeriod +
            '&firstYear=' + firstYear + '&secondYear=' + secondYear +
            '&productId=' + id + '&disc=' + disc;
    }
    function checkDateType() {
        console.log('a');
        if (document.getElementById('dateType').value === 'year') {
            document.getElementById('monthBlock').style.display = 'none';
            document.getElementById('quarterBlock').style.display = 'none';
            document.getElementById('yearBlock').style.display = 'flex';
        } else if (document.getElementById('dateType').value === 'quarter') {
            document.getElementById('monthBlock').style.display = 'none';
            document.getElementById('quarterBlock').style.display = 'flex';
            document.getElementById('yearBlock').style.display = 'none';
        } else {
            document.getElementById('monthBlock').style.display = 'flex';
            document.getElementById('quarterBlock').style.display = 'none';
            document.getElementById('yearBlock').style.display = 'none';
        }
    }
</script>
<style>
    .parse-table thead tr:nth-of-type(1) td:nth-of-type(5){
        background: #eaeff3;
        width: 1px !important;
    }
    .parse-table thead tr:nth-of-type(2) td:nth-of-type(8){
        background: #eaeff3;
        width: 1px !important;
    }
    .parse-table tbody tr td:nth-of-type(8){
        background: #eaeff3;
        width: 1px;
    }
</style>
</html>