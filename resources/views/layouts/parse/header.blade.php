<header class="sticky" style="">
    <div class="header_bg"> <!--Начало шапки-->
        <div class="majorMargin showColumnfix">
            <div class="h_flex width100">
                {{--<div class="header_contain">--}}
                {{--</div>--}}
                <div class="header_contain">
                    <ul>
                        <li class="screen_invise">
                            <div class="menu">
                                <div class="menu__icon">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="menu__links">
                                    <a class="menu__links-item" href="{{route('parse/company')}}">Сборы</a>
                                    <a class="menu__links-item" href="{{route('parse/finance')}}">Показатели</a>
                                    <a class="menu__links-item" href="javascript:void(0)">Конкуренты</a>
                                    <div>
                                        <div class="input-group-btn media_input">
                                            <div>
                                                <input type="text" class="form-control inputborderright" placeholder="" name="q">
                                            </div>
                                            <div>
                                                <button class="btn btn-default inputborderleft" type="submit"><i class="far fa-circle faCircle"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menuinvise"><a href="{{route('parse/company')}}">Сборы</a></li>
                        <li class="menuinvise"><a href="{{route('parse/finance')}}">Показатели</a></li>
                        <li class="menuinvise"><a href="javascript:void(0)">Конкуренты</a></li>
                    </ul>
                </div>
            </div>
            <div class="header_contain menuinvise header_contain3">
                <form class="navbar-form screen_input" role="search">
                    <div class="input-group">
                    </div>
                </form>
            </div>
        </div>
    </div>	<!--Конец шапки-->
</header>
