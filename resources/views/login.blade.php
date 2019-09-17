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
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <script src="{{asset('js/login.js')}}"></script>
</head>
<body>
<!-- Main -->
<div class="main">
    <!-- Container -->
    <div class="container-fluid">

        <!-- First row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="header">
                    <img src="{{asset('images/white-logo.png')}}" alt="Centras Logo" class="header__logo">
                </div>
            </div>
        </div> <!-- First row -->

        <!--Second row-->
        <div class="row" id="login">
            <!-- First column-->
            <div class="col-lg-6">
                <h1 class="title">
                    <span class="title__welcome">Добро пожаловать в</span>
                    <strong class="title__main">my.cic.kz</strong>
                </h1>
                <div class="social-network">
                    <p class="social-network__title">Подписывайтесь на наши обновления</p>
                    <div class="social-network__icons">
                        <a href="http://www.instagram.com/centras.insurance/" class="social-network__link"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="http://www.facebook.com/kupipolis.kz/" class="social-network__link"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                        <a href="http://www.youtube.com/channel/UCf2GyNgEwFys5JdN4g6x4LQ" class="social-network__link"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="line"></div>
            </div> <!-- First column-->

            <!-- Second column-->
            <login></login>
        </div> <!--Second row-->

        <!--Third row-->
        <div class="row">
            <div class="col-lg-12">
                <p class="footer-title">
                    <small class="footer-title__inner">©1997-2019 АО "Страховая Компания "Сентрас Иншуранс"</small>
                    <small class="footer-title__inner">Все права защищены</small>
                </p>
            </div>
        </div> <!--Third row-->

    </div> <!-- Container -->
</div> <!-- Main -->
</body>
</html>
