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
    <title>Список заявок на разработку</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container" id="app">
    @include('layouts.header')
    <main role="main">
        <!--div class="d-flex justify-content-end">
            <a href="{{route('create.express')}}"><button class="btn btn-success">Добавить</button></a>
        </div>
        <development-claims-list>
        </development-claims-list-->
            <div>
                @if(count($claims) > 0)
                    <table class="table table-responsive-sm table-stripper table-data table-bordered">
                        <thead class="thead-inverse">
                            <tr>
                                <th>ID</th>
                                <th>Роль</th>
                                <th>Что хочет</th>
                                <th>Зачем</th>
                                <th>Заявщик</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($claims as $claim)
                            <tr>
                                <td>{{ $claim->id }}</td>
                                <td>{{ $claim->role}}</td>
                                <td>{{ $claim->want }}</td>
                                <td>{{ $claim->what_for }}</td>
                                <td>@if(isset($claim->user->full_name)){{ $claim->user->full_name }}@endif</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $claims->render() }}
                @else
                    <div class="text-center">
                        В базе данных пока нет заявок
                    </div>
                @endif
            </div>
    </main>
</div>
</body>
<script src="{{asset('js/admin.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
</html>