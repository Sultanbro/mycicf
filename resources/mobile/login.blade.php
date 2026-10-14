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

    <script src="{{asset('js/mobile.js')}}"></script>
    {{--    <script src="{{asset('js/simple_info.js')}}"></script>--}}
</head>
<body>
<div id="app" class="main mobile-bg-position mobile-main-height">
    <div class="container-fluid">
        <div class="flex-column vertical-middle mobile-main-contain pb-5">
            <div class="color-white flex-column vertical-middle">
                <span>Добро пожаловать в</span>
                <span class="fs-4">i-ci.kz</span>
            </div>
            <login></login>
{{--            <div class="login-form width100">--}}
{{--                <div class="input-container d-flex">--}}
{{--                    <div class="input-container__background width100">--}}
{{--                        <i class="fa fa-user-o fa-input mobile-input-icons" aria-hidden="true"></i>--}}
{{--                        <input type="text" name="username" v-model="username" class="input-field width100 mobile-input-login color-white mobile-input pl-4 pr-0" placeholder="Логин">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="input-container d-flex">--}}
{{--                    <div class="input-container__background width100 flex-row">--}}
{{--                        <i class="fa fa-lock fa-input mobile-input-icons" aria-hidden="true"></i>--}}
{{--                        <input :type="passwordType" v-model="password" @keydown.enter="login" class="width100 mobile-input-password input-field mobile-input pl-4 pr-0" placeholder="Пароль">--}}
{{--                        <button type="button" class="show-btn color-white mobile-input-password-icon pl-3 pr-3" @click="checkType">--}}
{{--                            <i class="fa fa-eye" aria-hidden="true" id="icon"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="d-flex justify-content-center mt-5">--}}
{{--                    <button @click="login" class="btn-block mt-0 mobile-input mobile-button-login">Войти</button>--}}
{{--                </div>--}}
{{--                <div class="input-container">--}}
{{--                    <div class="color-white vertical-middle flex-column mobile-social-contain">--}}
{{--                        <div>--}}
{{--                            <span class="fs-0_8">Подписывайтесь на наши социальные сети</span>--}}
{{--                        </div>--}}
{{--                        <div class="social-network__icons mt-3">--}}
{{--                            <a href="http://www.instagram.com/centras.insurance/" class="social-network__link color-white ml-4 mr-4 mobile-social-icons"><i class="fab fa-instagram" aria-hidden="true"></i></a>--}}
{{--                            <a href="http://www.facebook.com/kupipolis.kz/" class="social-network__link color-white ml-4 mr-4 mobile-social-icons"><i class="fab fa-facebook-square" aria-hidden="true"></i></a>--}}
{{--                            <a href="http://www.youtube.com/channel/UCf2GyNgEwFys5JdN4g6x4LQ" class="social-network__link color-white ml-4 mr-4 mobile-social-icons"><i class="fab fa-youtube" aria-hidden="true"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>

    </div>
</div>
</body>
</html>