<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow p-3 mb-5 rounded">
    <a class="nnavbar-brand" href="/">ADMIN</a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09"
            aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarsExample09" style="margin-left: 60px;">
        <ul class="navbar-nav mr-auto">
            @if(App\User::isParseAdmin())
                <li class="nav-item dropdown">
                <a class="nav-nav dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">PARSE</a>
                <div class="dropdown-menu" aria-labelledby="dropdown09">
                    <a class="dropdown-item" href="{{route('parse.upload')}}">Загрузка</a>
                    <a class="dropdown-item" href="{{route('parse.add.company')}}">СК - Новое</a>
                    <a class="dropdown-item" href="{{route('parse.edit.company')}}">СК - Правка</a>
                    <a class="dropdown-item" href="{{route('parse.add.product')}}">Классы - Новое</a>
                    <a class="dropdown-item" href="{{route('parse.edit.product')}}">Классы - Правка</a>
                    <a class="dropdown-item" href="{{route('parse.load.data')}}">Мониторинг</a>
                    <a class="dropdown-item" href="{{route('parse.add.info')}}">Инфо</a>
                </div>
            </li>
            @endif
            @if(App\User::isOtdeKadrovAdmin())
                <li class="nav-item dropdown">
                <a class="nav-nav dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">Отдел кадров</a>
                <div class="dropdown-menu" aria-labelledby="dropdown09">
                    <a class="dropdown-item" href="{{route('centcoins.list')}}">Сенткойн - Список</a>
                    <a class="dropdown-item" href="{{route('centcoins.history')}}">Сенткойн - История</a>
                    <a class="dropdown-item" href="{{route('centcoins.replenish')}}">Сенткойн - Начисление</a>
                    <a class="dropdown-item" href="{{route('centcoins.spend')}}">Сенткойн - Списывание</a>
                    <a class="dropdown-item" href="{{route('centcoins.items')}}">Сенткойн - Продукты</a>
                    <a class="dropdown-item"  href="{{route('centcoins.report')}}">Сенткойн - Отчет</a>
                    <a class="dropdown-item"  href="{{route('centcoins.apply')}}">Сенткойн - Заявка</a>
                    <a class="dropdown-item" href="#">Обучение - Справочник</a>
                    <a class="dropdown-item" href="#">Обучение - Оценка</a>
                </div>
            </li>
            @endif
            @if(App\User::isWNDAdmin())
                <li class="nav-item dropdown">
            <a class="nav-nav dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">ВНД</a>
            <div class="dropdown-menu" aria-labelledby="dropdown09">
                <a class="dropdown-item" href="{{route('wnd.org')}}">Орг. структура</a>
                <a class="dropdown-item" href="{{route('wnd.svg')}}">Загрузка SVG</a>
                <a class="dropdown-item" href="{{route('wnd.word')}}">Загрузка WORD</a>
                <a class="dropdown-item" href="{{route('wnd.pdf')}}">Загрузка PDF</a>
                <a class="dropdown-item" href="{{route('wnd.image')}}">Загрузка Фотографии</a>
                <a class="dropdown-item" href="{{route('wnd.menu')}}">Структура меню</a>
                <a class="dropdown-item" href="{{route('wnd.svg.list')}}">Список SVG</a>
                <a class="dropdown-item" href="{{route('wnd.word.list')}}">Список WORD</a>
                <a class="dropdown-item" href="{{route('wnd.menu.list')}}">Список меню</a>
            </div>
        </li>
            @endif
            @if(App\User::isSenateAdmin())
                <li class="nav-item dropdown">
    <a class="nav-nav dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false">Сенат</a>
    <div class="dropdown-menu" aria-labelledby="dropdown09">
        <a class="dropdown-item" href="{{route('senate.post.new')}}">Новый пост</a>
    </div>
</li>
            @endif
            @if(App\User::isReadingClubAdmin())
                <li class="nav-item dropdown">
                <a class="nav-nav dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">Читательский клуб</a>
                <div class="dropdown-menu" aria-labelledby="dropdown09">
                    <a class="dropdown-item" href="{{route('reading.post.new')}}">Новый пост</a>
                </div>
            </li>
            @endif
            @if(App\User::isSuperAdmin())
                <li class="nav-item dropdown">
                    <a class="nav-nav dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Доступ</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown09">
                        <a class="dropdown-item" href="{{route('role.dicti.list')}}">Справочник ролей</a>
                        <a class="dropdown-item" href="{{route('role.permission.list')}}">Управление доступом</a>
                    </div>
                </li>
            @endif
            @if(App\User::isKurators() || App\User::isSuperAdmin())
                <li class="nav-item dropdown">
                    <a class="nav-nav dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Куратор</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown09">
                        <a class="dropdown-item" href="{{route('statistics.kurator.list')}}">Статистика Да</a>
                        <a class="dropdown-item" href="{{route('rating.kurator.list')}}">Рейтинг</a>
{{--                        <a class="dropdown-item" href="{{route('role.permission.list')}}">Отчет</a>--}}
{{--                        <a class="dropdown-item" href="{{route('role.permission.list')}}">Мотивация</a>--}}
                    </div>
                </li>
            @endif
            @if(App\User::isProductsAdmin())
                    <li class="nav-item dropdown">
                        <a class="nav-nav dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Продукты</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown09">
                            <a class="dropdown-item" href="{{route('list.express')}}">Экспресс котировка</a>
                            <a class="dropdown-item" href="{{route('list.full')}}">Полная котировка</a>
                        </div>
                    </li>
            @endif

        </ul>
        <form class="form-inline my-2 my-md-0">
            <a href="/logout" class="logout">Выйти</a>
        </form>
    </div>
</nav>
