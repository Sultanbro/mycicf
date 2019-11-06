<template>
    <div class="bg-white">
        <div class="pb-3 container-fluid flex-column vertical-middle">
            <div class="mt-3 flex-column vertical-middle">
                <div class="flex-column vertical-middle">
                    <div class="width100">
                        <img src="images/avatar.png" class="small-avatar-circle width100"  v-if="fakeImage">
                        <img :src="imageUrl" @error="fakeImage = true" v-else>
                    </div>
                </div>
                <div class="mt-2 mb-2 color-blue-name">
                    <strong>{{fullname}}</strong>
                </div>
            </div>
            <div class="width100">
                <div class="flex-column vertical-middle color-white bg-color-blue width100">
                    <span>Основная информация</span>
                    <span><i class="fa fa-chevron-down"></i></span>
                </div>
            </div>
<!--            {{                    <div class="width100 mt-3 mb-4">&#45;&#45;}}-->
<!--            {{                        <div class="flex-row jc-center bg-notification-center border-rad-10 pt-2 pb-2 vertical-middle color-white width100">&#45;&#45;}}-->
<!--                {{                            <span><i class="far fa-bell fs-1_2"></i></span>&#45;&#45;}}-->
<!--                {{                            <span class="pl-2">Центр уведомлений</span>&#45;&#45;}}-->
<!--                {{                            <div class="notification-counter">1</div>&#45;&#45;}}-->
<!--                {{                      </div>&#45;&#45;}}-->
<!--                                </div>-->
        </div>
    </div>
</template>

<script>
    export default {
        name: "simple-info",
        data() {
            return {
                datebeg: '2018-01-01',
                dateend: '2019-09-10',
                carier: null,
                vacation: null,
                sick: null,
                mission: null,
                thanks: null,
                admins: null,
                options: null,
                fakeImage : false,
            }
        },
        props : {
            isn: Number,
            fullname: String,
        },
        created: function(){
            this.imageUrl = "/storage/images/employee/" + this.isn + ".png";
        },
        mounted: function(){
            this.getOptions();
            this.getTables();
        },
        props: {
            isn: Number,
        },
        methods: {
            getTables: function(){
                this.axios.post("/emplInfo", {isn: this.isn, datebeg: this.datebeg, dateend: this.dateend}).then((response) => {
                    this.fetchResponse(response.data)
                })
            },
            getOptions: function () {
                this.axios.post('/getBranchData', {}).then((response) => {
                    this.options = response.data.result;
                })
            },
            fetchResponse: function(response){
                if(response.success){
                    this.carier = response.result.CARIER;
                    this.vacation = response.result.VACATION;
                    this.sick = response.result.SICK;
                    this.mission = response.result.MISSION;
                    this.thanks = response.result.THANKS;
                    this.admins = response.result.ADMINS;
                }else{
                    alert(response.error);
                }
            },
            // modalBlur: function () {
            //     var qwe = document.getElementById(qwe);
            //   // var app = document.getElementById(app);
            //   if (qwe.className == active){
            //       alert('qwe');
            //   }
            //   else{
            //       alert('empty')
            //   }
            // },
        },

    }
</script>
