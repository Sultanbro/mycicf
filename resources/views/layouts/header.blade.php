<header class="flex-row header">
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
                <a href="{{route('parse')}}">
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
                <a href="{{route('admin/documentation')}}">
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
            <div class="flex-column col-md-5 mt-1 mb-1 pl-0 pr-0">
                <a href="javascript:void(0)" class="flex-row header-avatar-contain header-menu-hover text-decoration pt-1 pb-1">
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
</header>
