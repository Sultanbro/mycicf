<header class="flex-row header">
    <div class="main_margin width100 flex-row">
        <div class="col-md-2 vertical-middle">
            <div>
                <img src="{{asset('images/white-logo.png')}}" class="image">
            </div>
        </div>
        <div class="col-md-6">
            <ul class="header-ul flex-row jc-sb">
                <a href="javascript:void(0)">
                    <li>
                        Parse
                    </li>
                </a>
                <a href="javascript:void(0)">
                    <li>
                        Рейтинг
                    </li>
                </a>
                <a href="javascript:void(0)">
                    <li>
                        О компании
                    </li>
                </a>
                <a href="javascript:void(0)">
                    <li>
                        Библиотека
                    </li>
                </a>
                <a href="javascript:void(0)">
                    <li>
                        Продукты
                    </li>
                </a>
            </ul>
        </div>
        <div class="col-md-4">
            <div class="col-md-5 mt-1 pl-0">
                <a href="javascript:void(0)" class="flex-row header-avatar-contain text-decoration pt-1 pb-1">
                    <div href="javascript:void(0)" class="small-avatar-circle-width ml-2">
                        <template
                            :image="image">
                            <img src="images/avatar.png" class="image height100 small-avatar-circle" v-if="image.encoded === 0">
                            <img :src="'data:image/jpeg;base64,' + image.encoded" class="image height100 small-avatar-circle" v-else="image.encoded === 0">
                        </template>
                    </div>

                    <div class="vertical-middle header-avatar-nickname">
                        <span class="ml-1">{{Auth::user()->short_name}}</span>
                        <span class="ml-2"><i class="fas fa-caret-down"></i></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</header>
