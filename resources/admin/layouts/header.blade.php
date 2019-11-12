<nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
    <a class="navbar-brand" href="/">ADMIN</a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09"
            aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarsExample09" style="">
        <ul class="navbar-nav mr-auto">
            @if(App\User::isSuperAdmin())
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">PARSE</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown09">
                        <a class="dropdown-item" href="{{route('parse.upload')}}">Загрузка</a>
                        <a class="dropdown-item" href="{{route('parse.add.company')}}">СК - Новое</a>
                        <a class="dropdown-item" href="{{route('parse.edit.company')}}">СК - Правка</a>
                        <a class="dropdown-item" href="{{route('parse.add.product')}}">Классы - Новое</a>
                        <a class="dropdown-item" href="{{route('parse.edit.product')}}">Классы - Правка</a>
                        <a class="dropdown-item" href="{{route('parse.load.data')}}">Мониторинг</a>

                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Отдел кадров</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown09">
                        <a class="dropdown-item" href="{{route('centcoins.list')}}">Сенткойн - Список</a>
                        <a class="dropdown-item" href="{{route('centcoins.history')}}">Сенткойн - История</a>
                        <a class="dropdown-item" href="{{route('centcoins.replenish')}}">Сенткойн - Начисление</a>
                        <a class="dropdown-item" href="{{route('centcoins.spend')}}">Сенткойн - Списывание</a>
                        <a class="dropdown-item" href="{{route('centcoins.items')}}">Сенткойн - Продукты</a>
                        <a class="dropdown-item" href="#">Обучение - Справочник</a>
                        <a class="dropdown-item" href="#">Обучение - Оценка</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">ВНД</a>
                <div class="dropdown-menu" aria-labelledby="dropdown09">
                    <a class="dropdown-item" href="{{route('wnd.org')}}">Орг. структура</a>
                    <a class="dropdown-item" href="{{route('wnd.svg')}}">Загрузка SVG</a>
                    <a class="dropdown-item" href="{{route('wnd.word')}}">Загрузка WORD</a>
                    <a class="dropdown-item" href="{{route('wnd.image')}}">Загрузка Фотографии</a>
                    <a class="dropdown-item" href="{{route('wnd.menu')}}">Структура меню</a>
                    <a class="dropdown-item" href="{{route('wnd.svg.list')}}">Список SVG</a>
                    <a class="dropdown-item" href="{{route('wnd.word.list')}}">Список WORD</a>
                    <a class="dropdown-item" href="{{route('wnd.menu.list')}}">Список меню</a>
                </div>
            </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">Доступ</a>
                <div class="dropdown-menu" aria-labelledby="dropdown09">
                    <a class="dropdown-item" href="{{route('role.dicti.list')}}">Справочник ролей</a>
                    <a class="dropdown-item" href="{{route('role.permission.list')}}">Управление доступом</a>
                </div>
            </li>
            @else
                {{--TODO if(has permission to)--}}
                @if(App\User::isParseAdmin())
                    <a class="nav-link" href="{{route('parse.upload')}}">Загрузка</a>
                    <a class="nav-link" href="{{route('parse.add.company')}}">СК - Новое</a>
                    <a class="nav-link" href="{{route('parse.edit.company')}}">СК - Правка</a>
                    <a class="nav-link" href="{{route('parse.add.product')}}">Классы - Новое</a>
                    <a class="nav-link" href="{{route('parse.edit.product')}}">Классы - Правка</a>
                    <a class="nav-link" href="{{route('parse.load.data')}}">Мониторинг</a>

                @endif
                @if(App\User::isOtdeKadrovAdmin())
                    <a class="nav-link" href="{{route('centcoins.list')}}">Сенткойн - Список</a>
                    <a class="nav-link" href="{{route('centcoins.history')}}">Сенткойн - История</a>
                    <a class="nav-link" href="{{route('centcoins.replenish')}}">Сенткойн - Начисление</a>
                    <a class="nav-link" href="{{route('centcoins.spend')}}">Сенткойн - Списывание</a>
                    <a class="nav-link" href="#">Обучение - Справочник</a>
                    <a class="nav-link" href="#">Обучение - Оценка</a>
                @endif
                @if(App\User::isWNDAdmin())
                    <a class="nav-link" href="#">Библиотека - Документы</a>
                    <a class="nav-link" href="#">Библиотека - Орг.структура</a>
                    <a class="nav-link" href="#">Библиотека - Бизнес-процессы</a>
                    <a class="nav-link" href="#">Библиотека - Типы документов</a>
                @endif
            @endif
        </ul>
        <form class="form-inline my-2 my-md-0">
            <a href="/logout" class="logout">Выйти</a>
        </form>
    </div>
</nav>
