<!DOCTYPE html>
<?php
use App\Http\Controllers\ParseController;
?>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parse | My.cic.kz</title>
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
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles_parse.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- include vue-treeselect & its styles. you can change the version tag to better suit your needs. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
@include('layouts.header')
@include('layouts.parse.header')

<main class="flex-row"  id="app">
    <div class="width100">
        <div class="col-12">
            <style>
                input[type=number]::-webkit-inner-spin-button,
                input[type=number]::-webkit-outer-spin-button {
                    -webkit-appearance: none;
                    margin: 0;
                }
                table td:nth-child(10){
                    border: 0 !important;
                }
                table th:nth-child(10){
                    border: 0 !important;
                }
            </style>
            <div class="majorMargin flex showColumnfix_icon contentmargin">	<!--Начало кнопок-->
                <div class="butcontain1">
                    <div class="but_contain">
                        <div class="dropdown open gem width50adaptive minwidth105">
                            <select class="btn btnfix" name="period" id="period" >
                                <option class="but_opacity" value="month" @if(($_GET['dateType'] ?? 'rise') == 'month') selected @endif>месяц</option>
                                <option class="but_opacity" value="quarter" @if(($_GET['dateType'] ?? 'rise') == 'quarter') selected @endif>квартал</option>
                                <option class="but_opacity" value="year" @if(($_GET['dateType'] ?? 'rise') == 'year') selected @endif>год</option>
                                <option class="but_opacity" value="rise" @if(($_GET['dateType'] ?? 'rise') == 'rise') selected @endif>с нарастанием</option>
                            </select>
                        </div>
                    </div>
                    <div class="but_contain">
                        <div class="flexrowClear">
                            <div class="dropdown open gem minwidth105">
                                <select class="btn" id="firstYear">             <!--Первое поле-->
                                    @for($i = 2014; $i<=(integer)date("Y");$i++)
                                        <option value="{{$i}}" @if($i == ($_GET['firstYear'] ?? '2019')) selected @endif>{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="dropdown open gem margleft10 minwidth105" id="item1" @if(($_GET['dateType'] ?? 'month') == 'year') style="display: none;" @endif>
                                <select class="btn" id="firstPeriod">			<!--Второе поле-->
                                    @if(($_GET['dateType'] ?? 'month') == 'month')
                                        @foreach($month as $val => $key)
                                            <option value="{{$val}}" @if(($_GET['firstPeriod'] ?? '1') == $val) selected @endif>{{$key}}</option>
                                        @endforeach
                                    @elseif(($_GET['dateType'] ?? 'rise')== 'quarter')
                                        @foreach ($quarters as $val => $key)
                                            <option value="{{$val}}" @if($_GET['firstPeriod'] == $val) selected @endif>{{$key}}</option>
                                        @endforeach
                                    @elseif(($_GET['dateType'] ?? 'rise') == 'rise')
                                        @foreach($month as $val => $key)
                                            <option value="{{$val}}" @if(($_GET['firstPeriod'] ?? '1') == $val) selected @endif>{{$key}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="but_contain">
                        <form class="showColumnfix">
                            <div class="flexrowClear">
                                <div class="dropdown open gem minwidth105">
                                    <select class="btn" id="secondYear">
                                        @for($i = 2014; $i<=(integer)date("Y");$i++)
                                            <option value="{{$i}}" @if($i == ($_GET['secondYear'] ?? '2019')) selected @endif>{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="dropdown open gem margleft10 minwidth105"  id="item2" @if(($_GET['dateType'] ?? 'month') == 'year') style="display: none;" @endif>
                                    <select class="btn" id="secondPeriod">
                                        @if(($_GET['dateType'] ?? 'month') == 'month')
                                            @foreach($month as $val => $key)
                                                <option value="{{$val}}" @if(($_GET['secondPeriod'] ?? '1') == $val) selected @endif>{{$key}}</option>
                                            @endforeach
                                        @elseif($_GET['dateType'] == 'quarter')
                                            @foreach ($quarters as $val => $key)
                                                <option value="{{$val}}" @if($_GET['secondPeriod'] == $val) selected @endif>{{$key}}</option>
                                            @endforeach
                                        @elseif(($_GET['dateType'] ?? 'month') == 'rise')
                                            @foreach($month as $val => $key)
                                                <option value="{{$val}}" @if(($_GET['secondPeriod'] ?? '1') == $val) selected @endif>{{$key}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div>
                                <a onclick="load()"><div class="showbut margleft20 flexvertcenter pointer">
                                        показать
                                    </div></a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="butcontain1 butcontain2">
                    <div class="but_contain download pointer">
                        <i class="fas fa-download"></i>
                    </div>
                </div>
            </div> <!--Конец кнопок-->
            <hr class="hr">
            <div class="majorMargin flex_colclear contentmargin">
                <div>	<!--Таблицы-->
                    <div>
                        <div>
                            <div>
                                <div class="table-responsive">
                                    <table class="table table-responsive  table-bordered table-hover t_table finTable" style="text-align: right">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th colspan="3">Активы</th>
                                            <th colspan="3">Резервы</th>
                                            <th colspan="3">Капитал</th>
                                            <th colspan="3">Нетто сборы</th>
                                            <th colspan="3">Нетто выплаты</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><span></span></td>
                                            <td><span>{{$label_first}}</span></td>
                                            <td><span>{{$label_second}}</span></td>
                                            <td><span>% изм</span></td>
                                            <td><span>{{$label_first}}</span></td>
                                            <td><span>{{$label_second}}</span></td>
                                            <td><span>% изм</span></td>
                                            <td><span>{{$label_first}}</span></td>
                                            <td><span>{{$label_second}}</span></td>
                                            <td><span>% изм</span></td>
                                            <td><span>{{$label_first}}</span></td>
                                            <td><span>{{$label_second}}</span></td>
                                            <td><span>% изм</span></td>
                                            <td><span>{{$label_first}}</span></td>
                                            <td><span>{{$label_second}}</span></td>
                                            <td><span>% изм</span></td>
                                        </tr>
                                        @foreach($result as $id => $val)
                                            <tr>
                                                <td style="text-align: left"><span>{{$companyList[$id]}}</span></td>
                                                <td><span>{{number_format($result[$id]['assets_first'], 0, '.', ' ')}}</span></td>
                                                <td><span>{{number_format($result[$id]['assets_second'], 0, '.', ' ')}}</span></td>
                                                <td><span>{{$controller->getChangedValFinance($result[$id]['assets_first'], $result[$id]['assets_second'])}}</span></td>
                                                <td><span>{{number_format($result[$id]['reserves_first'], 0, '.', ' ')}}</span></td>
                                                <td><span>{{number_format($result[$id]['reserves_second'], 0, '.', ' ')}}</span></td>
                                                <td><span>{{$controller->getChangedValFinance($result[$id]['reserves_first'], $result[$id]['reserves_second'])}}</span></td>
                                                <td><span>{{number_format($result[$id]['capital_first'], 0, '.', ' ')}}</span></td>
                                                <td><span>{{number_format($result[$id]['capital_second'], 0, '.', ' ')}}</span></td>
                                                <td><span>{{$controller->getChangedValFinance($result[$id]['capital_first'], $result[$id]['capital_second'])}}</span></td>
                                                <td><span>{{number_format($result[$id]['premium_first'], 0, '.', ' ')}}</span></td>
                                                <td><span>{{number_format($result[$id]['premium_second'], 0, '.', ' ')}}</span></td>
                                                <td><span>{{$controller->getChangedValFinance($result[$id]['premium_first'], $result[$id]['premium_second'])}}</span></td>
                                                <td><span>{{number_format($result[$id]['payout_first'], 0, '.', ' ')}}</span></td>
                                                <td><span>{{number_format($result[$id]['payout_second'], 0, '.', ' ')}}</span></td>
                                                <td><span>{{$controller->getChangedValFinance($result[$id]['payout_first'], $result[$id]['payout_second'])}}</span></td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                                 <td><span></span></td>
                                            <td><span></span></td>
                                            <td><span></span></td>
                                            <td><span></span></td>
                                            <td><span></span></td>
                                            <td><span></span></td>
                                            <td><span></span></td>
                                            <td><span></span></td>
                                            <td><span></span></td>
                                            <td><span></span></td>
                                            <td><span></span></td>
                                            <td><span></span></td>
                                            <td><span></span></td>
                                            <td><span></span></td>
                                            <td><span></span></td>
                                            <td><span></span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
{{--FOOTER GOES HERE--}}
</body>

<script>
    function load() {
        var dateType = $('#period').val();
        var firstYear = $('#firstYear').val();
        var secondYear = $('#secondYear').val();
        var firstPeriod = $('#firstPeriod').val() || 0;
        var secondPeriod = $('#secondPeriod').val() || 0;
        var disc = 0;
        firstPeriod = parseInt(firstPeriod);
        secondPeriod = parseInt(secondPeriod);
        location.href = '?dateType=' + dateType +
            '&firstPeriod=' + firstPeriod + '&secondPeriod=' + secondPeriod +
            '&firstYear=' + firstYear + '&secondYear=' + secondYear +
            '&disc=' + disc;
    }
</script>

</html>
