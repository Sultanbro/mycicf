<template>
    <div>
        <div>
            <div class="color-blue pt-2 pl-3 pr-3 pb-2 d-flex jc-center">
                <div class="d-flex vertical-middle">
                    <span class="bold">Ближайшие дни рождения</span>
                </div>
            </div>
            <hr class="mt-0">
            <div class="pt-2 pl-4 pr-4 pb-2 relative">
                <div class="text-center relative">
                    <div>
                        <div class="absolute height100 zi-3">
                            <div class="pr-2 pl-2 pt-2 pb-2 height100 pointer d-flex vertical-middle events-arrow-bg"  v-on:click="events_prev()" v-bind:class="{ visibility_hidden: events_counter === 0 }">
                                <i class="fa fa-long-arrow-alt-left color-blue" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="absolute height100 absolute-right-0 zi-3">
                            <div class="pt-2 pr-2 pb-2 pl-2 height100 pointer d-flex vertical-middle events-arrow-bg" v-on:click="events_next()" v-bind:class="{ visibility_hidden: events_counter === 2 }">
                                <i class="fa fa-long-arrow-alt-right color-blue" aria-hidden="true"></i>
                            </div>
                        </div>
                        <a href="#" v-if="events_counter === 0" class="d-flex flex-column vertical-middle Birthday-margin-inner">
                            <div class="jc-center d-flex width50 events-window-size relative">
                                <img src="http://animations.shoppinng.ru/wp-content/uploads/2014/02/13.gif" class="absolute width100 height100" />
                                <img src="/images/balloons-icon.png" class="width100 absolute birthday-balls zi-1">
                                <img src="/images/wowan.jpg" class="width100">
                            </div>
<!--                            <div class="width50">-->
<!--                                <img src="/images/birthday-flags.png" class="width-100-imp birthday-balls">-->
<!--                            </div>-->
                            <div class="colleagues-info-section__main d-flex flex-column vertical-middle">
                                <div class="color-blue mt-1 fs-1_1 Birthday-line_height-header text-center">
                                    <span>{{birthday_name}}</span>
                                </div>
                                <div class="Birthday-line_height mt-1 mb-1">
                                    <span class="fs-0_9">{{birthday_date}}</span>
                                </div>
                            </div>
                        </a>
                        <a href="#" v-if="events_counter === 1" class="d-flex flex-column vertical-middle Birthday-margin-inner">
                            <div class="jc-center d-flex width50 events-window-size relative">
                                <img src="http://animations.shoppinng.ru/wp-content/uploads/2014/02/13.gif" class="absolute width100 height100" />
                                <img src="/images/balloons-icon.png" class="width100 absolute birthday-balls zi-1">
                                <img src="/images/wowan.jpg" class="width100">
                            </div>
                            <!--                            <div class="width50">-->
                            <!--                                <img src="/images/birthday-flags.png" class="width-100-imp birthday-balls">-->
                            <!--                            </div>-->
                            <div class="colleagues-info-section__main d-flex flex-column vertical-middle">
                                <div class="color-blue mt-1 fs-1_1 Birthday-line_height-header text-center">
                                    <span>Ажимов Жанибек Кайратулы</span>
                                </div>
                                <div class="Birthday-line_height mt-1 mb-1">
                                    <span class="fs-0_9">01.01.1997</span>
                                </div>
                            </div>
                        </a>
                        <a href="#" v-if="events_counter === 2" class="d-flex flex-column vertical-middle Birthday-margin-inner">
                            <div class="jc-center d-flex width50 events-window-size relative">
                                <img src="http://animations.shoppinng.ru/wp-content/uploads/2014/02/13.gif" class="absolute width100 height100" />
<!--                                <img src="/images/wowan.jpg" class="width100">-->
                                <img src="/images/balloons-icon.png" class="width100 absolute birthday-balls">
                                <img :src="birthday_avatar" class="width100">
                            </div>
                            <!--                            <div class="width50">-->
                            <!--                                <img src="/images/birthday-flags.png" class="width-100-imp birthday-balls">-->
                            <!--                            </div>-->
                            <div class="colleagues-info-section__main d-flex flex-column vertical-middle">
                                <div class="color-blue mt-1 fs-1_1 Birthday-line_height-header text-center">
                                    <span>Запопадько Роман Юрьевич</span>
                                </div>
                                <div class="Birthday-line_height mt-1 mb-1">
                                    <span class="fs-0_9">19.12.1975</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <hr>
                </div>
<!--                <div class="text-center">-->
<!--                    <div class="color-darkgray pointer hover-gray hover-gray pt-3 pb-3">-->
<!--                        Показать еще-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "news-birthday",

        data() {
            return {
                birthday_name: 'Джумагулов Дмитрий Романович',
                birthday_date: '28.02.2001',
                birthday_avatar: 'images/avatar.png',
                events_counter: 0,
            }
        },
        mounted () {

        },
        props: {

        },
        updated () {

        },
        methods: {
            fetchResponse: function(response){
                if(response.success){
                    var information = response.response;
                    this.fullname = information.Name;
                    this.birthday = information.Birthday;
                }else{
                    alert(response.error);
                }
            },
            events_prev: function(){
                console.log(this.events_counter);
                this.events_counter -= 1;
                console.log(this.events_counter);
            },
            events_next: function(){
                console.log(this.events_counter);
                this.events_counter += 1;
                console.log(this.events_counter);
            },
        }
    }
</script>