<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Коллеги | My.cic.kz</title>
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
    {{--    <script src="{{asset('js/simple_info.js')}}"></script>--}}
</head>
<body >
@include('layouts.header')
<div id="app">
    <div class="justify-content-center navbar navbar-dark flex-md-nowrap shadow m-2 ct-myHeaderBg">
        <a class="navbar-brand" href="#">Centras Insurance</a>
        <a class="navbar-brand" href="#">Антисловарь test ets </a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-3 col-xl-2 d-md-block bg-light sidebar collapse" style="border: 1px double gray;">
                <div class="position-sticky pt-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="btn d-inline-flex align-items-center collapsed" data-toggle="collapse" href="#consultation" aria-expanded="false" aria-controls="collapseExample">Консультация</button>
                            <ul class="list-unstyled ps-3 collapse" id="consultation">
                                <li>
                                    <button class="btn d-inline-flex align-items-center collapsed pointer" data-toggle="collapse" href="#mustHaveType" aria-expanded="false" aria-controls="collapseExample">
                                        <strong>Обязательные виды</strong>
                                    </button>
                                    <ul class="list-unstyled ps-3 collapse" id="mustHaveType">
                                        <div>
                                            <li> <a href="../../newContact/ogpoVts.html" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">ОГПО ВТС</a></li>
                                            <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">ОГПО ПП</li>
                                        </div>
                                    </ul>
                                </li>
                                <li>
                                    <button class="btn d-inline-flex align-items-center collapsed pointer" data-toggle="collapse" href="#notMustHaveType" aria-expanded="false" aria-controls="collapseExample"><strong>Добровольные виды</strong></button>
                                    <ul class="list-unstyled ps-3 collapse" id="notMustHaveType">
                                        <div>
                                            <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">Каско</li>
                                            <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">МСТ</li>
                                        </div>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <button class="btn d-inline-flex align-items-center collapsed" data-toggle="collapse" href="#creatContract" aria-expanded="false" aria-controls="collapseExample">Оформить договор</button>
                            <ul class="list-unstyled ps-3 collapse" id="creatContract">
                                <li>
                                    <button class="btn d-inline-flex align-items-center collapsed pointer" data-toggle="collapse" href="#creatMustHaveType" aria-expanded="false" aria-controls="collapseExample"><strong>Обязательные виды</strong></button>
                                    <ul class="list-unstyled ps-3 collapse" id="creatMustHaveType">
                                        <div>
                                            <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">ОГПО ВТС</li>
                                            <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">ОГПО ПП</li>
                                        </div>
                                    </ul>

                                </li>
                                <li>
                                    <button class="btn d-inline-flex align-items-center collapsed pointer" data-toggle="collapse" href="#creatNotMustHaveType" aria-expanded="false" aria-controls="collapseExample"><strong>Добровольные виды</strong></button>
                                    <ul class="list-unstyled ps-3 collapse" id="creatNotMustHaveType">
                                        <div>
                                            <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">Каско</li>
                                            <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">МСТ</li>
                                            <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">Несчастные случаи</li>
                                        </div>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <button class="btn d-inline-flex align-items-center collapsed" data-toggle="collapse" href="#insuredEvent" aria-expanded="false" aria-controls="collapseExample">Страховой случай</button>
                            <ul class="list-unstyled ps-3 collapse" id="insuredEvent">
                                <li>
                                    <button class="btn d-inline-flex align-items-center collapsed pointer" data-toggle="collapse" href="#insuredEventType" aria-expanded="false" aria-controls="collapseExample"><strong>Зарегистрировать</strong></button>
                                    <ul class="list-unstyled ps-3 collapse" id="insuredEventType">
                                        <div>
                                            <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">ОГПО ВТС</li>
                                            <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">Каско</li>
                                        </div>
                                    </ul>

                                </li>
                                <li>
                                    <button class="btn d-inline-flex align-items-center collapsed pointer" data-toggle="collapse" href="#insuredEventDSV" aria-expanded="false" aria-controls="collapseExample"><strong>Выплата/Оценка</strong></button>
                                    <ul class="list-unstyled ps-3 collapse" id="insuredEventDSV">
                                        <div>
                                            <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">Каско</li>
                                            <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">МСТ</li>
                                            <li data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pointer">Несчастные случаи</li>
                                        </div>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 col-lg-8 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Страховой случай/Регистрация/ОГПО ВТС</h1>
                </div>

                <div class="container pb-2 ct-myMainCont">
                    <button type="button" class="ct-myBtn btn my-btn ct-myBottomSize" data-toggle="collapse" data-target="#hiInsIvOgpoVts">Приветствие</button>
                    <div id="hiInsIvOgpoVts" class="collapse">
                        <p class="mt-2">Добрый день, Страховая компания Сентрас Иншуранс (имя менеджера).</p>
                        <p>Уважаемый клиент, я Вас слушаю/Чем я могу Вам помочь? / в случае, если клиент после приветствия молчит.</p>
                        <p>Уважаемый клиент, скажите пож-та, как я могу к Вам обращатся? / Скажите пож-та, как Вас зовут?</p>
                        <p>Имя клиента - очень приятно.</p>
                        <p>
                            <a href="#hiInsIvOgpoVtsYes" data-toggle="collapse" data-target="#hiInsIvOgpoVtsYes" class="m-3">Да</a>
                            <a href="#hiInsIvOgpoVtsNo" data-toggle="collapse" data-target="#hiInsIvOgpoVtsNo" class="m-3">Нет</a>
                            <a href="#hiInsIvOgpoVtsMb" data-toggle="collapse" data-target="#hiInsIvOgpoVtsMb" class="m-3">Не знаю</a>
                        </p>
                    </div>
                </div>

                <div class="container pb-2 ct-myMainCont">
                    <button type="button" class="ct-myBtn btn my-btn ct-myBottomSize" data-toggle="collapse" data-target="#hiInsIvOgpoVtsYes">Да</button>
                    <div id="hiInsIvOgpoVtsYes" class="collapse">
                        <p class="mt-2">Имя клиента скажите пож-та, у Вас все в порядке? Как Ваше самочувствие?</p>
                        <p>
                            <a href="#hiInsIvOgpoVtsYes" data-toggle="collapse" data-target="#reqInsIvOgpoVts" class="m-3">Да</a>
                            <a href="#hiInsIvOgpoVtsNo" data-toggle="collapse" data-target="#hiInsIvOgpoVtsNo" class="m-3">Нет</a>
                            <a href="#hiInsIvOgpoVtsMb" data-toggle="collapse" data-target="#hiInsIvOgpoVtsMb" class="m-3">Не знаю</a>
                        </p>
                    </div>
                </div>

                <div class="container pb-2 ct-myMainCont">
                    <button type="button" class="ct-myBtn btn my-btn ct-myBottomSize" data-toggle="collapse" data-target="#hiInsIvOgpoVtsNo">Нет</button>
                    <div id="hiInsIvOgpoVtsNo" class="collapse">
                        <p class="mt-2"><em><strong>1.Имя клиента продиктуйте пож-та гос.номер авто, чтобы я могла зафиксировать обращение и выслать заявку Аварийному комиссару? Начинается на 01 в правом верхнем углу.</strong></em></p>
                        <p><em><strong>2.Имя клиента продиктуйте пож-та ИИН, чтобы я могла зафиксировать обращение и выслать заявку Аварийному комиссару?</strong></em></p>
                        <p>ФИО(название компании), марка модель, гос. номер машины ... Все верно?</p>
                        <p>Скажите пож-та, какие повреждения у автомобиля?</p>
                        <p>Имя клиента с какого города Вы к нам обращаетесь?</p>
                        <p>Скажите пож-та, точный адрес, где у Вас прозошло ДТП?</p>
                        <p>Прощание</p>
                        <p>Имя клиента Ваша заявка принята, ожидайте пож-та, Аварийнный комиссар с Вами свяжется в течении 10-15 минут и проконсультирует Вас.</p>
                        <p>Берегите себя! Удачи Вам на дорогах!</p>
                        <p>Всего доброго. (Всего хорошего).</p>
                        <p><strong>Важно! Указывайте в заявке для Аварийного комиссара, есть ли у клиента какие либо виды Добровольного страхования!</strong></p>
                        <p>
                            <a href="#reqInsIvOgpoVts" data-toggle="collapse" data-target="#reqInsIvOgpoVts" class="m-3">Да</a>
                            <a href="#srchInsIvOgpoVts" data-toggle="collapse" data-target="#srchInsIvOgpoVts" class="m-3">Нет</a>
                            <a href="#srchInsIvOgpoVts" data-toggle="collapse" data-target="#srchInsIvOgpoVts" class="m-3">Не знаю</a>
                        </p>
                    </div>
                </div>
                <div class="container pb-2 ct-myMainCont">
                    <button type="button" class="btn my-btn ct-myBottomSize ct-myBtn" data-toggle="collapse" data-target="#hiInsIvOgpoVtsMb">Не знаю</button>
                    <div id="hiInsIvOgpoVtsMb" class="collapse">
                        <p class="mt-2"><em><strong>1.Имя клиента продиктуйте пож-та гос.номер авто, чтобы я могла зафиксировать обращение и выслать заявку Аварийному комиссару? Начинается на 01 в правом верхнем углу.</strong></em></p>
                        <p><em><strong>2.Имя клиента продиктуйте пож-та ИИН, чтобы я могла зафиксировать обращение и выслать заявку Аварийному комиссару?</strong></em></p>
                        <p>ФИО(название компании), марка модель, гос. номер машины ... Все верно?</p>
                        <p>Скажите пож-та, какие повреждения у автомобиля?</p>
                        <p>Имя клиента с какого города Вы к нам обращаетесь?</p>
                        <p>Скажите пож-та, точный адрес, где у Вас прозошло ДТП?</p>
                        <p>Прощание</p>
                        <p>Имя клиента Ваша заявка принята, ожидайте пож-та, Аварийнный комиссар с Вами свяжется в течении 10-15 минут и проконсультирует Вас.</p>
                        <p>Берегите себя! Удачи Вам на дорогах!</p>
                        <p>Всего доброго. (Всего хорошего).</p>
                        <p><strong>Важно! Указывайте в заявке для Аварийного комиссара, есть ли у клиента какие либо виды Добровольного страхования!</strong></p>
                        <p>
                            <a href="#reqInsIvOgpoVts" data-toggle="collapse" data-target="#reqInsIvOgpoVts" class="m-3">Да</a>
                            <a href="#srchInsIvOgpoVts" data-toggle="collapse" data-target="#srchInsIvOgpoVts" class="m-3">Нет</a>
                            <a href="#srchInsIvOgpoVts" data-toggle="collapse" data-target="#srchInsIvOgpoVts" class="m-3">Не знаю</a>
                        </p>
                    </div>
                </div>
                <div>
                    <contact-center></contact-center>
                </div>
            </main>
        </div>
    </div>
</div>
</body>
</html>
