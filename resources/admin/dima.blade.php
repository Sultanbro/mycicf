<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">

    @include('layouts.treeselect')
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/navbars/">
    <link rel="stylesheet" href="{{asset('css/admin_head.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
    <title>Navbar Template · Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div class="container">
    @include('layouts.header')
    <main role="main">
        <div>
            <div class="container">
                <div class="d-flex flex-column">
                    <div class="d-flex align-items-center">
                        <h1>Наименование продукта:</h1>
                        <div class="ml-2">
                            <input type="text">
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <h2>ISN продукта:</h2>
                        <div class="ml-2">
                            <input type="number">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="d-flex flex-column">
                    <div class="d-flex flex-column">
                        <h3>Участники договора:</h3>
                        <ol class="mt-2 list-style-none">
                            <li>
                                <label for="input1" class="pointer">Выгодоприобретатель</label>
                                <input type="checkbox" class="pointer" name="admin-parties_contract" id="input1">
                            </li>
                            <li class="mt-2">
                                <label for="input2" class="pointer">Застрахованные</label>
                                <input type="checkbox" class="pointer" name="admin-parties_contract" id="input2">
                            </li>
                            <li class="mt-2">
                                <label for="input3" class="pointer">Страхователь</label>
                                <input type="checkbox" class="pointer" name="admin-parties_contract" id="input3">
                            </li>
                        </ol>
                    </div>
                </div>
                <hr>
                <div class="d-flex flex-column">
                    <h3>Объекты страхования</h3>
                    <ol class="mt-2 list-style-none">
                        <li>
                            <label for="input4" class="pointer">Транспортное средство</label>
                            <input type="checkbox" class="pointer" name="admin-objects_insurance" id="input4">
                        </li>
                        <li class="mt-2">
                        </li>
                    </ol>
                </div>
                <hr>
                <div class="d-flex flex-column">
                    <h3>Доп. атрибуты</h3>
                    <div class="d-flex mt-2">
                        <div>
                            <input type="text" placeholder="ISN" id="input5" name="admin-attributes">
                        </div>
                        <div class="ml-3">
                            <input type="text" placeholder="Номер" id="input6" name="admin-attributes">
                        </div>
                        <select id="input7" class="ml-3 input7-size" name="admin-attributes">
                            <option selected >Число</option>
                            <option>Текст</option>
                            <option>Справочник</option>
                            <option>Истина/Ложь</option>
                        </select>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </main>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
</html>