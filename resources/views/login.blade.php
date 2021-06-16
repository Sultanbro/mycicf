<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My.cic.kz</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-29153373-9"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-29153373-9');

        window.bitrixData = { isBitrix: <?php echo json_encode($isBitrix); ?>, bitrixAuthData: <?php echo json_encode($bitrixData); ?> };
    </script>
    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <!-- Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font awesome-->
    <link rel="stylesheet" href="{{asset('fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <script src="{{asset('js/login.js')}}"></script>
</head>
<body>
<!-- Main -->
<div class="main">
    <div class="preloader" id="preloader">
        <div class="item-1"></div>
        <div class="item-2"></div>
        <div class="item-3"></div>
        <div class="item-4"></div>
        <div class="item-5"></div>
    </div>

    <!-- Container -->
    <div class="container-fluid">
        <!-- First row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="header">
                    <img src="{{asset('images/new-white-logo.png')}}" alt="Centras Logo" class="header__logo">
                </div>
            </div>
        </div> <!-- First row -->

        <!--Second row-->
        <div class="row" id="login">
            <!-- First column-->
            <div class="col-lg-6 column-1">
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
        <div class="row row-3">
            <div class="col-lg-12">
                <p class="footer-title">
                    <small class="footer-title__inner">©1997-{{date('Y')}} АО "Страховая Компания "Сентрас Иншуранс"</small>
                    <small class="footer-title__inner">Все права защищены</small>
                </p>
            </div>
        </div> <!--Third row-->
    </div> <!-- Container -->
</div> <!-- Main -->
</body>
</html>
