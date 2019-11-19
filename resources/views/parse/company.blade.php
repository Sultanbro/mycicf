<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parse | My.cic.kz</title>

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
                        <div class="flex">
                            <form class="h_flex margtop20 padtop7"><label class="h_flex flex-row vertical-middle labelcheck">
                                    <input type="checkbox" name="check" id="checkJs" @if(($_GET['disc'] ?? 0) != 0) checked @endif>
                                    <div class="margleft10">расторжения</div></label>
                            </form>
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
                                    @elseif($_GET['dateType'] == 'quarter')
                                        @foreach ($quarters as $val => $key)
                                            <option value="{{$val}}" @if($_GET['firstPeriod'] == $val) selected @endif>{{$key}}</option>
                                        @endforeach
                                    @elseif(($_GET['dateType'] ?? 'month') == 'rise')
                                        @foreach($month as $val => $key)
                                            <option value="{{$val}}" @if(($_GET['firstPeriod'] ?? '1') == $val) selected @endif>{{$key}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <form class="flexrowClear margtop20 flexvertcenter">
                            <div class="absolute">%</div>
                            <input type="text" class="payment" id="disc" value="{{$_GET['disc'] ?? 0}}">
                        </form>
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
                                <a onclick="load({{$_GET['productId'] ?? 0}})"><div class="showbut margleft20 flexvertcenter pointer">
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
                <div class="flex_colclear">	<!--Кнопка переключения таблиц-->
                    <div class="flexrowClear">
                        <a href="javascript:void(0)"><div class="topButton pointer">
                                топ по компаниям
                            </div></a>
                        <a onclick="getProducts(0)"><div class="topButton pointer">
                                топ по классам
                            </div></a>
                    </div>
                    <div class="margtop20">
                        <h1 class="h1">{{$label}}</h1>
                    </div>
                </div>
                <div>	<!--Таблицы-->
                    <div>
                        <div>
                            <div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover t_table" style="text-align: right;">
                                        <thead>
                                        <tr><th colspan="9" class="textRight tableTopMarkup">премии</th><th colspan="6" class="textRight tableTopMarkup">выплаты</th></tr>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th style="text-align: left;">Компания</th>
                                            <th>{{$label_first}}</th>
                                            <th>{{$label_second}}</th>
                                            <th>доля {{strtolower($label_first)}}</th>
                                            <th>доля {{strtolower($label_second)}}</th>
                                            <th>изм %</th>
                                            <th>изм сумма</th>
                                            <th>&nbsp</th>
                                            <th>{{$label_first}}</th>
                                            <th>{{$label_second}}</th>
                                            <th>% изм</th>
                                            <th>{{$label_first}}</th>
                                            <th>{{$label_second}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $other['premium_first'] = 0;
                                        $other['premium_second'] = 0;
                                        $other['payout_first'] = 0;
                                        $other['payout_second'] = 0;
                                        $i = 0;
                                        ?>
                                        @foreach($premium_first as $id=>$val)
                                            <tr>
                                                <td style="text-align: left;"><span>{{$i+1}}</span></td>
                                                <td style="text-align: left;"><span>{{$ranking[$id]}}</span></td>
                                                <td style="text-align: left;"><span><a onclick="getProducts({{$id}})">{{$companyList[$id]}}</a></span></td>
                                                <td><span>{{number_format($val, 0, '.', ' ')}}</span></td>
                                                <td><span>{{number_format($premium_second[$id],0,  '.', ' ')}}</span></td>
                                                <td><span>{{$controller->getPercentOfMarker($val, array_sum($premium_first))}}</span></td>
                                                <td><span>{{$controller->getPercentOfMarker($premium_second[$id], array_sum($premium_second))}}</span></td>
                                                <td><span>{{$controller->getChangedVal($val, $premium_second[$id])}}</span></td>
                                                <td><span>{{number_format($val - $premium_second[$id], 0, '.', ' ') }}</span></td>
                                                <td><span></span></td>
                                                <td><span>{{number_format($payout_first[$id], 0, '.', ' ')}}</span></td>
                                                <td><span>{{number_format($payout_second[$id], 0, '.', ' ')}}</span></td>
                                                <td><span>{{$controller->getChangedVal($payout_first[$id], $payout_second[$id])}}</span></td>
                                                <td><span>{{$controller->getPayoutChange($payout_first[$id], $premium_first[$id])}}</span></td>
                                                <td><span>{{$controller->getPayoutChange($payout_second[$id], $premium_second[$id])}}</span></td>
                                            </tr>
                                            @if($i>=10)
                                                <?php
                                                $other['premium_first'] += $premium_first[$id];
                                                $other['premium_second'] += $premium_second[$id];
                                                $other['payout_first'] += $payout_first[$id];
                                                $other['payout_second'] += $payout_second[$id];
                                                ?>
                                            @endif
                                            <?php $i++; ?>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align: left;"><span>ВСЕГО</span></td>
                                            <td><span>{{number_format(array_sum($premium_first), 0, '.', ' ')}}</span></td>
                                            <td><span>{{number_format(array_sum($premium_second), 0, '.', ' ')}}</span></td>
                                            <td><span></span></td>
                                            <td><span></span></td>
                                            <td><span>{{$controller->getChangedVal(array_sum($premium_first), array_sum($premium_second))}}</span></td>
                                            <td><span>{{number_format(array_sum($premium_first)-array_sum($premium_second), 0, '.', ' ')}}</span></td>
                                            <td><span></span></td>
                                            <td><span>{{number_format(array_sum($payout_first), 0, '.', ' ')}}</span></td>
                                            <td><span>{{number_format(array_sum($payout_second), 0, '.', ' ')}}</span></td>
                                            <td><span>{{$controller->getChangedVal(array_sum($payout_first), array_sum($payout_second))}}</span></td>
                                            <td><span>{{$controller->getPayoutChange(array_sum($payout_first), array_sum($premium_first))}}</span></td>
                                            <td><span>{{$controller->getPayoutChange(array_sum($payout_second), array_sum($premium_second))}}</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>	<!--Гугл графики-->
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
            </div>

        </div>
    </div>
</main>
{{--FOOTER GOES HERE--}}
</body>

<script>
    function load(id) {
        var dateType = $('#period').val();
        var firstYear = $('#firstYear').val();
        var secondYear = $('#secondYear').val();
        var firstPeriod = $('#firstPeriod').val() || 0;
        var secondPeriod = $('#secondPeriod').val() || 0;
        var disc = 0;
        if ($('#checkJs')[0].checked){
            disc = $('#disc').val();
        }
        firstPeriod = parseInt(firstPeriod);
        secondPeriod = parseInt(secondPeriod);
        location.href = '?dateType=' + dateType +
            '&firstPeriod=' + firstPeriod + '&secondPeriod=' + secondPeriod +
            '&firstYear=' + firstYear + '&secondYear=' + secondYear +
            '&productId=' + id + '&disc=' + disc;
    }
    function getProducts(id) {
        var dateType = $('#period').val();
        var firstYear = $('#firstYear').val();
        var secondYear = $('#secondYear').val();
        var firstPeriod = $('#firstPeriod').val() || 0;
        var secondPeriod = $('#secondPeriod').val() || 0;
        var disc = 0;
        if ($('#checkJs')[0].checked){
            disc = $('#disc').val();
        }
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
</html>
