<template>
    <div class="m-navbar " id="m-navbar" style="display: none">
        <div>
            <div class="absolute pb-3 pt-3">
                <a href="javascript: void(0)" class="color-white mr-4 vertical-middle pt-2 ml-5 mobile-link-padding">
                    <i class="fa fa-bars fs-1_3 color-blue"></i>
                </a>
            </div>
            <div class="flex-row ml-5 relative jc-center mr-5 jc-sb pt-3 pb-3" onclick="changeDisplay('m-navbar')">
                <div>
                    <div class="mobile-centras-logo">
                        <a href="/">
                            <img src="/images/new-white-logo.png" class="image">
                        </a>
                    </div>
                </div>
            </div>
            <div class="ml-5 mr-5">
                <div class="flex-row vertical-middle">
                    <div>
                        <div class="mobile-medium-avatar-circle-width vertical-middle width40pxHOTFIX">
                            <img class="pt-0 image-circle-add-post image header-avatar-size small-avatar-circle width100" src="/images/avatar.png">
                        </div>
                    </div>
                    <div class="ml-3">
                        <span class="color-blue">
                            <strong class="flex-column">
                                <span>{{fullname}}</span>
                            </strong>
                        </span>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex-column">
                    <div class="mb-3">
                        <ul class="flex-column mt-3 mr-5 ml-5">
                            <a href="/dossier" class="pt-2 pb-2 color-darkgray font-size-1_2">
                                <li>
                                    <i class="far fa-clipboard"></i>
                                    <span>Досье</span>
                                </li>
                            </a>
                            <a href="/coordination" class="pt-2 pb-2 color-darkgray font-size-1_2">
                                <li>
                                    <i class="far fa-thumbs-up"></i>
                                    <span>Согласование</span>
                                </li>
                            </a>

                            <a href="javascript:void(0)" class="pt-2 pb-2 color-darkgray font-size-1_2" v-if="motivationShow">
                                <li>
                                    <i class="far fa-grin-stars"></i>
                                    <span>Мотивация</span>
                                </li>
                            </a>
                            <a href="javascript:void(0)" class="pt-2 pb-2 color-darkgray font-size-1_2">
                                <li>
                                    <i class="fas fa-book-reader"></i>
                                    <span>Обучение</span>
                                </li>
                            </a>
                            <a href="javascript:void(0)" class="pt-2 pb-2 color-darkgray font-size-1_2">
                                <li>
                                    <img src="/images/centcoin-fa.png" style="width: 20px;">
                                    <span>Сенткоины</span></li></a>
                            <a href="javascript:void(0)" class="pt-2 pb-2 color-darkgray font-size-1_2">
                                <li>
                                    <i class="fas fa-chart-pie"></i>
                                    <span>Отчет</span>
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="bg-blue-standart height100vh">
                <div class="pt-4 ml-5 mr-5 pb-5 flex-row jc-sb">
                    <div class="flex-column">
                        <a href="javascript: void(0)" class="color-white mobile-navbar-border-bot fs-0_8">
                            PARSE
                        </a>
                        <a href="javascript: void(0)" class="color-white mobile-navbar-border-bot fs-0_8">
                            РЕЙТИНГ
                        </a>
                        <a href="javascript: void(0)" class="color-white mobile-navbar-border-bot fs-0_8">
                            О КОМПАНИИ
                        </a>
                        <a href="javascript: void(0)" class="color-white mobile-navbar-border-bot fs-0_8">
                            БИБЛИОТЕКА
                        </a>
                    </div>
                    <div class="flex-column">
                        <a href="javascript: void(0)" class="color-white mobile-navbar-border-bot fs-0_8">
                            ПРОДУКТЫ
                        </a>
                        <a href="javascript: void(0)" class="color-white mobile-navbar-border-bot fs-0_8">
                            ЭЛЕМЕНТ 1
                        </a>
                        <a href="javascript: void(0)" class="color-white mobile-navbar-border-bot fs-0_8">
                            ЭЛЕМЕНТ 2
                        </a>
                        <a href="javascript: void(0)" class="color-white mobile-navbar-border-bot fs-0_8">
                            ЭЛЕМЕНТ 3
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'menu-mobile',
        data() {
            return {
                show : false,
                menu_mobile_link: '',
            }
        },
        props: {
            fullname : String,
            motivationShow: Boolean
        },
        methods: {
            changeHead: function(){
                    console.log(window.location.pathname);
                    console.log(this.show);
                    this.show = this.show ? false : true;
                }
            },
    }
</script>