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
                @if(Auth::user()->ISN !== Auth::user()->level)
                    <a class="header-navigation" href="{{route('parse')}}">
                        <li>
                            Parse
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
                <a class="header-navigation" href="javascript:void(0)">
                    <li>
                        Продукты
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
<script type="text/javascript" src="http://centras.ailabs.kz/aicc/chat-widget2/uniq-chat.js"></script>
<script>
var chat_client = 'centras', chat_mode=2, ailabs_user_id = null, ailabs_user_info  = {'user_intent_category_label':"DEFAULT"}; //3-client side, 2-ailabs server, 1-localhost; ailabs_user_id - users(id)
AILabsChatStart();
</script>