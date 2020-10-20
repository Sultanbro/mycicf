<header class="flex-row header" id="header">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <div class="main_margin width100 flex-row vertical-middle">
        <div class="col-md-2 vertical-middle">
            <div class="header-img-width">
                <a href="{{route('index')}}">
                    <img src="{{asset('images/new-white-logo.png')}}" class="image">
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <ul class="header-ul flex-row jc-sb">
                 @if(Auth::user()->ISN !== Auth::user()->level || in_array(Auth::user()->ISN, \App\Http\Controllers\ParseController::getAcceptedUsers()))
                    <a class="header-navigation" href="{{route('parse')}}">
                        <li>
                            parse
                        </li>
                    </a>
                @endif 
                {{--<a class="header-navigation" href="javascript:void(0)">--}}
                {{--<li>--}}
                {{--Рейтинг--}}
                {{--</li>--}}
                {{--</a>--}}
                <a class="header-navigation" href="javascript:void(0)">
                    <li>
                        О компании
                    </li>
                </a>
                <a class="header-navigation" href="{{route('documentation')}}">
                    <li>
                        Библиотека
                    </li>
                </a>
                <li class="products-link" style="display:inline-flex">
                    <ul id="products-nav">
                        <li>
                            <a class="products-item" href="javascript:void(0);" tabindex="1" >
                                Котировки <span class="ml-2"><i class="fas fa-caret-down"></i></span>
                            </a>
                            <ul class="sub-menu">
                                <li id="express"><a href="/express" class="item">Экспресс котировка</a></li>
                                <li id="full"><a href="/full" class="item">Полная котировка</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <a class="header-navigation" href="javascript:void(0)">
                    <li>
                        Обучение
                    </li>
                </a>
            </ul>
        </div>
        <div class="col-md-4">
            <div class="flex-column col-md-5 mt-1 mb-1 pl-0 pr-0">
                <a href="javascript:void(0)"
                   class="flex-row header-avatar-contain header-menu-hover text-decoration pt-1 pb-1">
                    <div href="javascript:void(0)" class="small-avatar-circle-width ml-2">
                        <user-image
                            :isn="{{ auth()->user()->ISN }}"></user-image>
                    </div>

                    <div class="vertical-middle header-avatar-nickname">
                        <span class="ml-1">{{Auth::user()->short_name}}</span>
                        <span class="ml-2"><i class="fas fa-caret-down"></i></span>
                    </div>
                </a>
                <div class="header-section zi-2">
                    <section class="pointer">
                        <a onclick="subscribe()">
                            <option style="color:white">
                                Уведомления
                            </option>
                        </a>
                        <a href="/logout">
                            <option style="color:white">
                                Выйти
                            </option>
                        </a>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div class="preloader" id="preloader">
        <div class="item-1"></div>
        <div class="item-2"></div>
        <div class="item-3"></div>
        <div class="item-4"></div>
        <div class="item-5"></div>
    </div>
</header>
<script type="text/javascript" src="https://www.gstatic.com/firebasejs/3.6.8/firebase.js"></script>
<script type="text/javascript" src="{{asset('firebase_subscribe.js')}}"></script>
