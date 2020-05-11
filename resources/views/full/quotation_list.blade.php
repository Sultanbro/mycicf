<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Список полная котировка | My.cic.kz</title>
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
</head>
<body>
@include('layouts.header')
<main class="flex-row"  id="app">
    <div class="main_margin flex-row width100">
        @include('layouts.sidebar')
        <div class="col-md-8 news-tape-bg radius-4px mt-3 pb-2" id="employee_info">

            <quotation-list inline-template
                            parametres="{{ json_encode($request) }}"
                            page-url="{{ route('full_quotations_list',['productISN' => $product->product_isn]) }}">
                <div>
                    <h4 class="text-center mt-2 col-12">Полная котировка - {{ $product->name }}</h4>
                    <div class="col-md-12 mt-4 bg-white pt-3 pb-3 rounded box-shadow text-center">
                        <div class="row">
                            <div  class="col-md-4">
                                <label>Отправлен в ДА</label>
                                <select v-model="sendDA"
                                        class="date-color pl-2 pr-2 pt-1 pb-1 ml-2"
                                        style="border: 1px solid rgba(0,123,255,.25);border-radius: 5px; outline: none;">
                                    <option  value="1">Да</option>
                                    <option  value="0">Нет</option>
                                </select>
                            </div>
                            <!--div class="col-md-4" v-if="!contractSelected">
                                <label>Статус</label>
                                <select  v-model="quotationStatus"
                                         class="date-color pl-2 pr-2 pt-1 pb-1 ml-2"
                                         style="border: 1px solid rgba(0,123,255,.25);border-radius: 5px; outline: none;">
                                    @foreach($statuses as $status)
                                        <option  value="{{ $status['Value'] }}">{{ $status['Label'] }}</option>
                                    @endforeach
                                </select>
                            </div-->
                            <div class="col-md-4">
                                <label>Тип</label>
                                <select  v-model="type"
                                         class="date-color pl-2 pr-2 pt-1 pb-1 ml-2"
                                         style="border: 1px solid rgba(0,123,255,.25);border-radius: 5px; outline: none;">
                                    <option  value="0">Котировка</option>
                                    <option  value="1">Договор</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex custom-primary-button-inverse border-0 pl-4 pr-4 pt-1 pb-1 color-white button-accept pointer m-auto" style="width:145px;">
                                    <div @click="filter">
                                        <i class="fa fa-filter"></i>
                                        <span class="pl-2">Показать</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-inline-flex">
                            <a href="{{ route('full_front',['ID' => $product->id,'quotationId' => 0]) }}" target="_blank">
                                <div class="d-flex custom-primary-button-inverse border-0 pl-4 pr-4 ml-2 pt-1 pb-1 mt-3 color-white button-accept pointer">
                                    <div>
                                        <span class="pl-2">Создать</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @if(count($quotations) > 0)
                        <div class="bg-white mt-3 mb-3 box-shadow border-16">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="w-100 table-responsive">
                                    <table class="table table-hover text-align-center fs-0_8">
                                        <thead >
                                        <tr class="bg-grayblue color-light-gray">
                                            <td class="text-left">#</td>
                                            <td class="">Котировка</td>
                                            <td class="">Договор</td>
                                            <td class="">Отправлен в ДА</td>
                                            <!--td class="">Статус</td-->
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($quotations as $quotation)
                                            <tr>
                                                <td class="text-left">{{ $quotation->id }}</td>
                                                <td>
                                                    <a href="{{ route('full_front', ['ID' => $quotation->product->id,'quotationId' => $quotation->id]) }}" target="_blank">
                                                        {{ $quotation->calc_isn }}
                                                    </a>
                                                </td>
                                                <td>{{ $quotation->contract_number == '' ? '-' : $quotation->contract_number }}</td>
                                                <td><span >{{ $quotation->calc_da == 1 ? 'да' : 'нет' }}</span></td>
                                                <!--td>
                                                    @if($quotation->status == 0)
                                                        не указан
                                                    @else
                                                        @foreach($statuses as $status)
                                                            @if($quotation->status == $status['Value'])
                                                                {{ $status['Label'] }}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </td-->
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-align-center quotation-list">
                            {{ $quotations->appends($request)->links() }}
                        </div>
                    @endif
                </div>
            </quotation-list>

        </div>
    </div>
</main>
{{--FOOTER GOES HERE--}}
</body>
</html>
