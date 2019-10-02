<div class="col-md-2 blocks-small-borderRad-top blocks-small-borderRad-bot box-shadow padding0 mt-3 mb-3">
    {{--<div>--}}
        {{--<div class="avatar-menu-size mt-3 mb-3 ml-2 mr-2">--}}
            {{--<img src="images/avatar.jpg" class="image">--}}
        {{--</div>--}}
    {{--</div>--}}
    <div id="simple-info">
        <simple-info
            :image="image"></simple-info>
    </div>
    <div class="mb-5">
        <ul class="flex-column mr-3 ml-3">
            <a class="pt-2 pb-2 color-blue font-size-1_2" href="{{route('dossier')}}">
                <li>
                    <i class="far fa-clipboard"></i>
                    <span>Досье</span>
                </li>
            </a>
            <a class="pt-2 pb-2 color-blue font-size-1_2" href="{{route('coordination')}}">
                <li>
                    <i class="far fa-thumbs-up"></i>
                    <span>Согласование</span>
                </li>
            </a>
            <a class="pt-2 pb-2 color-blue font-size-1_2" href="javascript:void(0)">
                <li>
                    <i class="far fa-grin-stars"></i>
                    <span>Мотивация</span>
                </li>
            </a>
            <a class="pt-2 pb-2 color-blue font-size-1_2" href="javascript:void(0)">
                <li>
                    <i class="fas fa-book-reader"></i>
                    <span>Обучение</span>
                </li>
            </a>
            <a class="pt-2 pb-2 color-blue font-size-1_2" href="javascript:void(0)">
                <li>
                    <i class="fab fa-bitcoin"></i>
                    <span>Сенткоины</span>
                </li>
            </a>
            <a class="pt-2 pb-2 color-blue font-size-1_2" href="javascript:void(0)">
                <li>
                    <i class="fas fa-chart-pie"></i>
                    <span>Отчет</span>
                </li>
            </a>
        </ul>
    </div>
</div>
