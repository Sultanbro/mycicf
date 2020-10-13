<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .thead-bluelight {
            background: #4267b2;
        }
        .sale-order thead th{
            vertical-align: middle !important;
        }
    </style>
</head>
<body>
<div class="row">
    <div class="col"></div>
    <div class="col-md-10">
        <table border="1" class="table table-striped sale-order" >
            <thead class="thead-bluelight text-center" >
            <tr>
                <th style="color:#fff" colspan="20">Агентский портал</th>
                <th style="color:#fff" colspan="5">КИАС</th>
                <th style="color:#fff" colspan="18">КУПИПОЛИС</th>
            </tr>
            <tr class="text-center">
                <th rowspan="2" style="color:#fff">Дата</th>
                <th rowspan="2" style="color:#fff">ОС ГПО ПП</th>
                <th rowspan="2" style="color:#fff">МСТ</th>
                <th rowspan="2" style="color:#fff">ЭкономEXP</th>
                <th rowspan="2" style="color:#fff">ДГПО Авто</th>
                <th rowspan="2" style="color:#fff">НС Выбор</th>
                <th rowspan="2" style="color:#fff">ДГПО ПП</th>
                <th rowspan="2" style="color:#fff">ДС Грузы</th>
                <th rowspan="2" style="color:#fff">ДСИ в Залоге</th>
                <th rowspan="2" style="color:#fff">ДС Титульное</th>
                <th rowspan="2" style="color:#fff">ДС Авто в Залоге</th>
                <th rowspan="2" style="color:#fff">ДС Автолимит с франшизой</th>
                <th rowspan="2" style="color:#fff">Свой бизнес</th>
                <th rowspan="2" style="color:#fff">ДГПО Миллион+</th>
                <th colspan="5"  style="color:#fff">ОС ГПО ВТС</th>
                <th rowspan="2" style="color:#fff">Всего</th>
                <th rowspan="2" style="color:#fff">Дата</th>
                <th rowspan="2" style="color:#fff">Все продукты</th>
                <th colspan="2" style="color:#fff">ОС ГПО ВТС</th>
                <th rowspan="2" style="color:#fff">Всего</th>
                <th rowspan="2" style="color:#fff">Дата</th>
                <th rowspan="2" style="color:#fff">Партнеры</th>
                <th rowspan="2" style="color:#fff">ОСГПОВТС</th>
                <th rowspan="2" style="color:#fff">ОСГПОПП</th>
                <th rowspan="2" style="color:#fff">Миллион Плюс</th>
                <th rowspan="2" style="color:#fff">Мини Каско</th>
                <th rowspan="2" style="color:#fff">МСТ</th>
                <th rowspan="2" style="color:#fff">МСТ банк</th>
                <th rowspan="2" style="color:#fff">Алматы - Марафон</th>
                <th rowspan="2" style="color:#fff">ПреИМУЩЕСТВО</th>
                <th rowspan="2" style="color:#fff">НС Выбор</th>
                <th rowspan="2" style="color:#fff">Свой Бизнес</th>
                <th rowspan="2" style="color:#fff">ДКСП</th>
                <th rowspan="2" style="color:#fff">Арендатор</th>
                <th rowspan="2" style="color:#fff">Конструктор Долголетия</th>
                <th rowspan="2" style="color:#fff">Онлайн Доктор</th>
                <th rowspan="2" style="color:#fff">НС Пассажиров</th>
                <th rowspan="2" style="color:#fff">Всего без партнеров</th>
            </tr>
            <tr>
                <th  style="color:#fff">Юр. Лица (Временный въезд)</th>
                <th  style="color:#fff">Физ. Лица (Временный въезд)</th>
                <th  style="color:#fff">Юр. Лица</th>
                <th  style="color:#fff">Физ. Лица</th>
                <th  style="color:#fff">Проверка с ГБД</th>
                <th  style="color:#fff">общее</th>
                <th  style="color:#fff">без проверки с ГБД</th>

            </tr>
            </thead>
            <tbody>
            @foreach($result as $data)
                <tr>
                    @foreach($data as $rowData)
                    <td>{{$rowData}}</td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col"></div>
</div>
</body>
</html>
