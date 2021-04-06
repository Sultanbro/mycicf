<div class="col-md-2 blocks-small-borderRad-top blocks-small-borderRad-bot box-shadow padding0 mt-3 mb-3">
    <div id="simple-info">
        <simple-info
            :isn="{{ auth()->user()->ISN }}"></simple-info>
    </div>
    @php(
        $count = (int)\App\User::getCoordinationCount()
    )
    <div class="mb-5">
        <ul class="flex-column mr-3 ml-3">
            <a class="pt-2 pb-2 color-blue font-size-1_2" href="{{route('dossier')}}">
                <li class="leftsidebar-icons">
                    <i class="far fa-clipboard"></i>
                    <span>Обо мне</span>
                </li>
            </a>
            <a class="pt-2 pb-2 color-blue font-size-1_2" href="{{route('colleagues')}}">
                <li class="leftsidebar-icons">
                    <i class="fas fa-users"></i>
                    <span>Мои коллеги</span>
                </li>
            </a>
            <a class="pt-2 pb-2 color-blue font-size-1_2" href="{{route('coordination')}}">
                <li class="leftsidebar-icons">
                    <i class="far fa-thumbs-up"></i>
                    <span>Согласование</span>
                    @if($count > 0)
                        <div class="pending-count">
                            {{$count}}
                        </div>
                    @endif
                </li>
            </a>
            @if(in_array(auth()->user()->ISN, ((new \App\RatingPermission())->getActiveUsers())) || in_array(auth()->user()->dept_isn, ((new \App\RatingPermission())->getActiveUsers())))
                <a class="pt-2 pb-2 color-blue font-size-1_2" href="{{route('my-results')}}">
                    <li class="leftsidebar-icons">
                        <i class="far fa-star" aria-hidden="true"></i>
                        <span>Мои результаты</span>
                    </li>
                </a>
            @endif
            @if(in_array(auth()->user()->dept_isn, \App\User::getMotivationDepartments()) || in_array(auth()->user()->ISN, ((new \App\Kurators())->getActiveUsers())) || auth()->user()->ISN == 3560197 || auth()->user()->ISN == 1445721 || auth()->user()->ISN == 235472 || auth()->user()->ISN == 5011 || auth()->user()->ISN == 4275866 || auth()->user()->ISN == 766502 || auth()->user()->ISN == 3534147 || auth()->user()->ISN == 801271)
                <a class="pt-2 pb-2 color-blue font-size-1_2" href="{{route('statistics')}}">
                    <li class="leftsidebar-icons">
                        <i class="far fa-chart-bar"></i>
                        <span>Статистика ДА</span>
                    </li>
                </a>
            @endif

{{--            @if(in_array(auth()->user()->dept_isn, \App\User::getMotivationDepartments()) || auth()->user()->ISN == 3560197 || auth()->user()->ISN == 1445721 || auth()->user()->ISN == 235472)--}}
{{--                <a class="pt-2 pb-2 color-blue font-size-1_2" href="{{route('rating')}}">--}}
{{--                    <li class="leftsidebar-icons">--}}
{{--                        <i class="far fa-star"></i>--}}
{{--                        <span>Рейтинг</span>--}}
{{--                    </li>--}}
{{--                </a>--}}
{{--                <a class="pt-2 pb-2 color-blue font-size-1_2" href="/motivation">--}}
{{--                    <li class="leftsidebar-icons">--}}
{{--                        <i class="far fa-grin-stars"></i>--}}
{{--                        <span>Мотивация</span>--}}
{{--                    </li>--}}
{{--                </a>--}}
{{--                <a class="pt-2 pb-2 color-blue font-size-1_2" href="{{route('report')}}">--}}
{{--                    <li class="leftsidebar-icons">--}}
{{--                        <i class="fas fa-chart-pie"></i>--}}
{{--                        <span>Отчет</span>--}}
{{--                    </li>--}}
{{--                </a>--}}
{{--            @endif--}}

            <!--a class="pt-2 pb-2 color-blue font-size-1_2" href="/express">
                <li class="leftsidebar-icons">
                    <i class="fas fa-book-reader"></i>
                    <span>Экспресс котировка</span>
                </li>
            </a-->
            @if(!in_array(Auth::user()->branch->duty, App\User::getCentcoinExcepts()))
                <a class="pt-2 pb-2 color-blue font-size-1_2" href="{{route('centcoins')}}">
                    <li class="leftsidebar-icons">
                        <img src="/images/centcoin-fa.png" style="width: 20px;">
                        <span>Сенткоины</span>
                    </li>
                </a>
            @endif
            <a class="pt-2 pb-2 color-blue font-size-1_2" href="{{route('insurance/inspection')}}">
                <li class="leftsidebar-icons">
                    <i class="fa fa-car" aria-hidden="true"></i>
                    <span>Предстраховой осмотр</span>
                </li>
            </a>
            <a class="pt-2 pb-2 color-blue font-size-1_2" href="{{route('development', 'study')}}">
                <li class="leftsidebar-icons">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Центр знаний</span>
                </li>
            </a>
            <a class="pt-2 pb-2 color-blue font-size-1_2" href="{{route('booking')}}">
                <li class="leftsidebar-icons">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <span>На переговоры!</span>
                </li>
            </a>
            <a class="pt-2 pb-2 color-blue font-size-1_2" href="{{route('contact-center.manager')}}">
                <li class="leftsidebar-icons">
                    <i class="fa fa-address-book" aria-hidden="true"></i>
                    <span>Контакт-центр</span>
                </li>
            </a>
        </ul>
    </div>
</div>
